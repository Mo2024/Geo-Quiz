<?php 
require('../functions/functions.inc.php');
require("../partials/regex.inc.php");

if(isset($_SESSION['userId']) && !empty($_SESSION['userId'])){
    if(isset($_GET['quizId'])){

        $query = "SELECT quiz.*, users.username FROM quiz INNER JOIN users ON quiz.uid = users.uid WHERE quiz.quizid = ?";
        $stmt = $db->prepare($query);
        $stmt->bindValue(1, $_GET['quizId'], PDO::PARAM_INT);
        $stmt->execute();
        $quizRow = $stmt->fetch();

      
        
    }else{
        $_SESSION['error'] = "You must choose a valid quiz";
        header("Location: /ITCS333-Project/quiz/quizzesDisplay.php");
    }

}else{
    setcookie("redirect", $url,0,'/');
    header("Location: /ITCS333-Project/auth/signin.php");
}

?>