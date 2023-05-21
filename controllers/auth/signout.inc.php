<?php 
setcookie("session", password_hash($_SESSION["username"], PASSWORD_DEFAULT),time() - 3600 ,'/');
session_start();
session_destroy();
session_start();
$_SESSION['success'] = 'Sign out Successful';
header("Location: /ITCS333-Project/mainpage.php");
exit();
?>