<?php 
require('../functions/functions.inc.php');
require("../partials/regex.inc.php");
if(isset($_SESSION['userId'])){
    $uid = $_SESSION['userId'];
    $query = "SELECT * FROM quiz WHERE uid = :uid";
    $statement = $db->prepare($query);
    $statement->bindValue(':uid', $uid);
    $statement->execute();
    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
    
}else{
    $url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    setcookie("redirect", $url,0,'/');
    header("Location: /ITCS333-Project/auth/signin.php");
    
}

?>