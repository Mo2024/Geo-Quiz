<?php 
if(isset($_SESSION['userId']) && !empty($_SESSION['userId'])){
    require('../functions/functions.inc.php');
    require("../partials/regex.inc.php");

    $id = $_SESSION['userId'];
    $idQuery = "SELECT * FROM user WHERE id = '$id'";
    $result = $db->query($idQuery);
    $row = $result->fetch();
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){
        
        if($_POST['newPwd'] == '' || $_POST['confirmNewPwd'] == ''){
            echoAlertDanger('Password fields are empty');
        } else{
            $newPwd = $_POST['newPwd'];
            $confirmPwd = $_POST['confirmNewPwd'];

            if(isset($_GET['status']) && ($_GET['status'] == 'forget' || $_GET['status'] == 'resend') ){
                //updating password using verification code
                if($_POST['VerificationCode'] == ''){
                    echoAlertDanger('Verification Code field is empty');
                }else{
                    $vCode = $_POST['VerificationCode'];
                    if($row['verificationCode']==$vCode){
                        updatePassword($passwordReg, $newPwd, $confirmPwd, $id, $db);
                    }else{
                        echoAlertDanger("Invalid verification code");
                    }
                }
            } 
            else{
                //Updating password using current
                if($_POST['currentPwd'] == ''){
                    echoAlertDanger('Current Password field is empty');
                }else{
                    $currentPwd = $_POST['currentPwd'];
                    if (password_verify($currentPwd, $row['hash'])) {
                        updatePassword($passwordReg, $newPwd, $confirmPwd, $id, $db);
                    }else{
                        echoAlertDanger("Invalid current password");
                    }
                }
    
            } 
        }
    }else if(isset($_GET['status']) && $_GET['status'] == 'forget'){
        if(is_null($row['pwdVerificationCode'])){
            sendVerCode($row, $id, $db);
            echoAlertSuccess('Verification code sent to email');
        }

    } else if(isset($_GET['status']) && $_GET['status'] == 'resend'){
        sendVerCode($row, $id, $db);
        echoAlertSuccess('Verification code resent to email');
    }
        
}
else{
    $url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    setcookie("redirect", $url,0,'/');
    header("Location: /ITCS333-Project/auth/signin.php");
    
}


?>