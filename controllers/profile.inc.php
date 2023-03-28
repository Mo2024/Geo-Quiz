<?php 
require(__DIR__ .'/../functions/functions.inc.php');
require(__DIR__ ."/../partials/regex.inc.php");

if(isset($_SESSION['userId']) && !empty($_SESSION['userId'])){
    $id = $_SESSION['userId'];
    $row = selectUser($id, $db);
    
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $birth = $_POST['birth'];
        $pnumber = $_POST['pnum'];

        if(preg_match($usernameReg, $username) && preg_match($emailReg, $email)
        && preg_match($nameReg, $firstname) && preg_match($nameReg, $lastname)
        && preg_match($pnumberReg, $pnumber) && preg_match($dateReg, $birth)){

            $usernameQuery = "SELECT * FROM user WHERE username = '$username'";
            $emailQuery = "SELECT * FROM user WHERE email = '$email'";
    
            $usernameResult = ($db->query($usernameQuery)->rowCount());
            $emailResult = ($db->query($emailQuery)->rowCount());
    
            //Cecks if username or email already exist, else it inserts the values into the database
            if($usernameResult>0 && $username != $row['username']){
                echoAlertDanger("Username already exists");
            }
            else if($emailResult>0 && $email != $row['email']){
                echoAlertDanger("Email already exists");
            }
            else{
                $verificationStatus = $row['verified'];                
                if ($row['email'] != $email){
                    $verificationStatus = false;
                }
                $updateQuery = "UPDATE user SET username = '$username', email = '$email', firstname = '$firstname',
                lastname = '$lastname', birthdate = '$birth', phonenumber = '$pnumber',  verified = '$verificationStatus' WHERE id = '$id'";
                $result = $db->query($updateQuery);

                $row = selectUser($_SESSION['userId'], $db);
                echoAlertSuccess('User profile updated');
            }
        }else{
            echoAlertDanger(
                "Please make sure that:
                <ul>
                    <li>Username is 4 to 20 characters long, only contains alphabet letters and 0 to 9 numerics </li>
                    <li>Email, name and birthdate are enetered properly</li>
                    <li>Password has one special character, one small letter, one capital letter and at least 8 characters long</li>
                </ul>"
            );
        }

    } 
    if(isset($_GET['verification']) && $_GET['verification'] == 'sent' && $_SERVER["REQUEST_METHOD"] == "GET"){
        if(is_null($row['verificationCode']) && $row['verified']){
            echoAlertSuccess("Email verified");
        }
        else{
            require(__DIR__ .'/../functions/phpmailer.inc.php');
            $mail->addAddress($row['email']);    
            $mail->Subject = 'Email verification';
            $href = $url.'functions/verifyEmail.inc.php?code='.$row['verificationCode'];
            $mail->Body    = '<p>Click this <a href="'.$href.'">link</a> to verify your email</p>';
            $mail->send();
        }
    }
}else{
    $url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    setcookie("redirect", $url,0,'/');
    header("Location: /ITCS333-Project/auth/signin.php");
    
}

?>