<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    require(__DIR__ .'/../functions/functions.inc.php');
    require(__DIR__ ."/../partials/regex.inc.php");

    $uid = $_POST['uid'];
    $formPassword = $_POST['password'];

    if($uid == '' || $formPassword == ''){
        echoAlertDanger('Username/Email or Password field are empty');
    }
    else if(preg_match($emailReg, $uid) || preg_match($usernameReg, $uid)){
        $uidQuery = "SELECT * FROM user WHERE email = '$uid' OR username = '$uid'";
        $result = $db->query($uidQuery);
        if ($row = $result->fetch()) {
            if (password_verify($formPassword, $row[3])) {
                //password match and login in user
                session_start();
                $_SESSION["userId"] = $row[0];
                $_SESSION["username"] = $row[1];            
                if(!isset($_COOKIE["redirect"])){
                    header("Location: /ITCS333-Project/mainpage.php?Signin=success");
                }else{
                    header("Location: ".$_COOKIE["redirect"]);
                    setcookie ("redirect", "", time() - 3600);
                }
                die();  
            }
            else{
                //Incorrect password
                echoAlertDanger('Incorrect Password');
            }
        }
        else{
            //User does not exist
            echoAlertDanger('Username/Email does not exist');
        }
    }else{
        //invalid username/email or password
        echoAlertDanger('Invalid Username/Email');
    }

}
?>