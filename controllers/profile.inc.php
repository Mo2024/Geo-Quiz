<?php 
require(__DIR__ .'/../functions/functions.inc.php');
require(__DIR__ ."/../partials/regex.inc.php");

if(isset($_SESSION['userId']) && !empty($_SESSION['userId'])){
    $id = $_SESSION['userId'];
    $idQuery = "SELECT * FROM user WHERE id = '$id'";
    $result = $db->query($idQuery);
    $row = $result->fetch();

    if(isset($_GET['verification']) && $_GET['verification'] == 'sent' && $_SERVER["REQUEST_METHOD"] == "GET"){
        if(is_null($row[9]) && $row[10]){
            echoAlertSuccess("Email verified");
        }
        else{
            require(__DIR__ .'/../functions/phpmailer.inc.php');
            $mail->addAddress($row[2]);    
            $mail->Subject = 'Email verification';
            $href = $url.'functions/verifyEmail.inc.php?code='.$row[9];
            $mail->Body    = '<p>Click this <a href="'.$href.'">link</a> to verify your email</p>';
            $mail->send();
        }
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $birth = $_POST['birth'];
        $pnumber = $_POST['pnum'];

        if(preg_match($usernameReg, $username) && preg_match($emailReg, $email)
        && preg_match($passwordReg, $password) && preg_match($passwordReg, $password2)
        && preg_match($nameReg, $firstname) && preg_match($nameReg, $lastname)
        && preg_match($pnumberReg, $pnumber) && preg_match($dateReg, $birth)){

            $usernameQuery = "SELECT * FROM user WHERE username = '$username'";
            $emailQuery = "SELECT * FROM user WHERE email = '$email'";
    
            $usernameResult = ($db->query($usernameQuery)->rowCount());
            $emailResult = ($db->query($emailQuery)->rowCount());
    
            //Cecks if username or email already exist, else it inserts the values into the database
            if($usernameResult>0){
                echoAlertDanger("Username already exists");
            }
            else if($emailResult>0){
                echoAlertDanger("Email already exists");
            }
            else{
                $verificationStatus = $row[10];
                $verificationCode = $row[9];
                if ($row[2] != $email){
                    require(__DIR__ .'/../functions/phpmailer.inc.php');
                    $verificationCode = substr(number_format(time() * rand(), 0, '', ''), 0, 6);                
                    $mail->addAddress($email);    
                    $mail->Subject = 'Email verification';
                    $href = $url.'functions/verifyEmail.inc.php?code='.$verificationCode;
                    $mail->Body    = '<p>Click this <a href="'.$href.'">link</a> to verify your email</p>';
                    $mail->send();
                }

                $updateQuery = "UPDATE user SET username = '$username', email = '$email', firstname = '$firstname', lastname = '$lastname', birthdate = '$birth', phonenumber = '$pnumber', verificationCode = '$verificationCode', verified = '$verificationStatus' WHERE id = '$id'";
                $result = $db->query($updateQuery);

                $sql = "INSERT INTO user (username, email, hash, firstname, lastname, birthdate, phonenumber, type, verificationCode, Verified) 
                        VALUES('$username', '$email', '$hash', '$firstname', '$lastname', '$birth', '$pnumber', '$type', '$verificationCode', '$notVerified')";
                $result = $db->query($sql);
         
                $_SESSION["userId"] = $db->lastInsertId();
                $_SESSION["username"] = $username;
                if(!isset($_COOKIE["redirect"])){
                    header("Location: /ITCS333-Project/mainpage.php?Signup=success");
                }else{
                    header("Location: ".$_COOKIE["redirect"]);
                    setcookie ("redirect", "", time() - 3600);
                }
                die();        
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
}else{
    $url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    setcookie("redirect", $url,0,'/');
    header("Location: /ITCS333-Project/auth/signin.php");
    
}

?>