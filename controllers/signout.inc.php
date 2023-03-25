<?php 

session_start();
session_destroy();
header("Location: /ITCS333-Project/mainpage.php?Signout=success");
exit();
?>