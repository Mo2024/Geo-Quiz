<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    require('functions.inc.php');
    require("partials/regex.inc.php");

    $uid = $_POST['uid'];
    $password = $_POST['password'];

    if($uid == '' || $password == ''){
        echoAlertDanger('Username/Email or Password field are empty');
    }
    if(preg_match($emailReg, $uid) || preg_match($usernameReg, $uid)){
        $uidQuery = "SELECT * FROM user WHERE email = '$uid' OR username = '$uid'";
        $result = $db->query($uidQuery);
        if ($row = $result->fetch()) {
            if (password_verify($password, $row[3])) {
                //password match and login in user
                session_start();
                $_SESSION["userId"] = $row[0];
                $_SESSION["username"] = $row[1];            
                header("Location: mainpage.php?Signin=success");
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