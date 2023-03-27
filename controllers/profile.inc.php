<?php 
require(__DIR__ .'/../functions/functions.inc.php');
if(isset($_SESSION['userId']) && !empty($_SESSION['userId'])){
    $id = $_SESSION['userId'];
    $idQuery = "SELECT * FROM user WHERE id = '$id'";
    $result = $db->query($idQuery);
    $row = $result->fetch();

    if(isset($_GET['verification']) && $_GET['verification'] == 'sent'){
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
    } 
}else{
    $url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    setcookie("redirect", $url,0,'/');
    header("Location: /ITCS333-Project/auth/signin.php");
    
}

?>