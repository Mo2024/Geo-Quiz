<?php 
require(__DIR__ ."/../partials/boilerplate.inc.php");
$verificationCode = $_GET['code'];
$id = $_SESSION['userId'];
$idQuery = "SELECT * FROM user WHERE id = '$id'";
$result = $db->query($idQuery);
$row = $result->fetch();
$verifiedEmail = true;
if($verificationCode == $row[9]){
    $updateQuery = "UPDATE user SET verified = '$verifiedEmail', verificationCode = NULL WHERE id = '$id'";
    $result = $db->query($updateQuery);
    header("Location: /ITCS333-Project/mainpage.php?Verification=success");
    die(); 
}


?>