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
            if (password_verify($formPassword, $row['hash'])) {
                //password match and login in user
                
                if(isset($_POST['rememberMe']) && $_POST['rememberMe'] == 'rememberMe'){
                    setcookie("session", password_hash($row["username"], PASSWORD_DEFAULT),time() + 604800 ,'/');
                } else{
                    //cookie that deletes on browser close
                    setcookie("session", password_hash($row["username"], PASSWORD_DEFAULT),0 ,'/');
                }      

                session_start();
                $_SESSION["userId"] = $row['id'];
                $_SESSION["username"] = $row['username'];

                if(!isset($_COOKIE["redirect"])){
                    header("Location: /ITCS333-Project/mainpage.php?Signin=success");
                }else{
                    header("Location: ".$_COOKIE["redirect"]);
                    setcookie ("redirect", $redirectUrl, time() - 3600,'/');
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