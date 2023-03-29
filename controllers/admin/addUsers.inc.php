<?php 
require('../functions/functions.inc.php');
require('../partials/regex.inc.php');
if(isset($_SESSION['userId']) && !empty($_SESSION['userId'])){

    if($_SESSION['userType'] == 'admin'){
        
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){
            $email = $_POST['email'];
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $birth = $_POST['birthdate'];
            $pnumber = $_POST['phonenumber'];
            $type = $_POST['types'];

            if($_FILES['excel']['name'] == "") {
                //manual upload
                if(preg_match($emailReg, $email)
                && preg_match($nameReg, $firstname) && preg_match($nameReg, $lastname)
                && preg_match($pnumberReg, $pnumber) && preg_match($dateReg, $birth) && preg_match($userTypeReg, $type)){


                    $emailQuery = "SELECT * FROM user WHERE email = '$email'";                
                    $emailResult = ($db->query($emailQuery)->rowCount());
            
                    // Cecks if username or email already exist, else it inserts the values into the database
                    if($emailResult>0){
                        echoAlertDanger("Email already exists");
                    }
                    else{
                        require('../functions/phpmailer.inc.php');
                        $mail->addAddress($email);    
                        $mail->Subject = 'Welcome to '.$brandName.'!';
                        $href = $url.'functions/activateAccount.inc.php';
                        $mail->Body = '<p>Click this <a href="'.$href.'">link</a> to activate your account</p>';
                        $mail->send();
        
                        $verified = true;
                        $notActive = false;
        
                        $sql = "INSERT INTO user (username, email, hash, firstname, lastname, birthdate, phonenumber, type, verificationCode, verified, active) 
                                VALUES('NULL', '$email', 'unset', '$firstname', '$lastname', '$birth', '$pnumber', '$type', 'NULL', '$verified', '$notActive')";
                        $result = $db->query($sql);
                        
                        $userID = $db->lastInsertId();
                        $username = 'user'.$userID;
                        $updateQuery = "UPDATE user SET username = '$username' WHERE id = '$userID'";
                        $result = $db->query($updateQuery);
                        echoAlertSuccess('User Added');  
                    }

                }
                else{
                    echoAlertDanger(
                        "Please make sure that:
                        <ul>
                            <li>Username is 4 to 20 characters long, only contains alphabet letters and 0 to 9 numerics </li>
                            <li>Email, name and birthdate are enetered properly</li>
                            <li>Valid user type</li>
                            <li>Password has one special character, one small letter, one capital letter and at least 8 characters long</li>
                        </ul>"
                    );
                }
            }else{
                //excel sheet upload
            }
        }


    }else{
        header("Location: /ITCS333-Project/mainpage.php?access=unauthorized");   
    }

}else{
    $url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    setcookie("redirect", $url,0,'/');
    header("Location: /ITCS333-Project/auth/signin.php");
    
}




?>