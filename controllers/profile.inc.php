<?php 

if(isset($_SESSION['userId']) && !empty($_SESSION['userId'])){
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){
    } 
}else{
    $url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    setcookie("redirect", $url,0,'/');
    header("Location: /ITCS333-Project/auth/signin.php");
    
}

?>