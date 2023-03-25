<?php 

if(isset($_SESSION['userId']) && !empty($_SESSION['userId'])){
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){
    } 
if(isset($_GET['status']) && $_GET['status'] == 'forget'){
    // $id = $_SESSION['userId'];
    // $idQuery = "SELECT * FROM user WHERE id = '$id'";
    // $result = $db->query($idQuery);
    // $row = $result->fetch();
    // $verifiedEmail = true;
    // $nullVar = NULL;
    // if($verificationCode == $row[9]){
    //     $updateQuery = "UPDATE user SET verified = '$verifiedEmail', verificationCode = '$nullVar' WHERE id = '$id'";
    //     $result = $db->query($updateQuery);
    //     header("Location: /ITCS333-Project/mainpage.php?Verification=success");
    //     die(); 
    // }
}
}else{
    $url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    setcookie("redirect", $url,0,'/');
    header("Location: /ITCS333-Project/auth/signin.php");
    
}

?>