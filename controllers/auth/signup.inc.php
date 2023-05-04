<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    
    require('../functions/functions.inc.php');
    require("../partials/regex.inc.php");

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $birth = $_POST['birth'];
    $pnumber = $_POST['pnum'];
    $type = "user";

    if(!preg_match($usernameReg, $username)){
        echoAlertDanger("Please make sure that Username is 4 to 20 characters long, only contains alphabet letters and 0 to 9 numerics");
   
    }
    else if(!preg_match($emailReg, $email)){
        echoAlertDanger("Please make sure that the entered email is valid");
    }
    else if(!preg_match($passwordReg, $password) && preg_match($passwordReg, $password2)){
        echoAlertDanger("Please make sure that the entered password has one special character, one small letter, one capital letter and at least 8 characters long");
    }
    else if(!preg_match($nameReg, $firstname) ){
        echoAlertDanger("Please make sure that the entered first name is entered properly");
    }
    else if(!preg_match($nameReg, $lastname)){
        echoAlertDanger("Please make sure that the entered last name is entered properly");
    }
    else if(!preg_match($pnumberReg, $pnumber)){
        echoAlertDanger("Please make sure that the entered number is valid");
    }
    else if(!preg_match($dateReg, $birth)){
        echoAlertDanger("Please make sure that the entered birthdate is valid");
    }
    else{
        if($password != $password2){
            echoAlertDanger('Passwords do not match');
        }else{

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
                $verificationCode = substr(number_format(time() * rand(), 0, '', ''), 0, 6);                

                $notVerified = false;
                $active = true;
                $hash = password_hash($password, PASSWORD_DEFAULT);

                $sql = "INSERT INTO user (username, email, hash, firstname, lastname, birthdate, phonenumber, type, verificationCode, verified, active) 
                        VALUES('$username', '$email', '$hash', '$firstname', '$lastname', '$birth', '$pnumber', '$type', '$verificationCode', '$notVerified', '$active')";
                $result = $db->query($sql);
         
                $_SESSION["userId"] = $db->lastInsertId();
                $_SESSION["username"] = $username;
                $_SESSION["userType"] = $type;
                
                if(isset($_POST['rememberMe']) && $_POST['rememberMe'] == 'rememberMe'){
                    setcookie("session", password_hash($username, PASSWORD_DEFAULT),time() + 604800 ,'/');
                }else{
                    //cookie that deletes on browser close
                    setcookie("session", password_hash($username, PASSWORD_DEFAULT),0 ,'/');
                }     
                var_dump($_SESSION);
                
                if(!isset($_COOKIE["redirect"])){
                    header("Location: /ITCS333-Project/mainpage.php?Signup=success");
                }else{
                    header("Location: ".$_COOKIE["redirect"]);
                    setcookie ("redirect", $redirectUrl, time() - 3600,'/');
                }
                // die();        
            }
        }
    }

}
?>