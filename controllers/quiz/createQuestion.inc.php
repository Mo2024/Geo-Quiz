<?php 
require('../functions/functions.inc.php');
require("../partials/regex.inc.php");

if(isset($_SESSION['userId']) && !empty($_SESSION['userId'])){
    $uid = $_SESSION['userId'];

    try{
        if($_SESSION['quizId']){
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){
                //code here
                $qTypes = $_POST['qTypes'];
                $marks = $_POST['marks'];
                $questions = $_POST['questions'];
                $answers = $_POST['answers'];
                $images = $_POST['images'];

            }
        }else{
            //redirect
            // echoAlertDanger("You don't have authorization to add questions to this quizz");
        }
    }catch(e){
        // redirect
        // echoAlertDanger('Error');
    }

}else{
    $url = 'http://localhost/ITCS333-Project/quiz/createQuiz.php';
    setcookie("redirect", $url,0,'/');
    header("Location: /ITCS333-Project/auth/signin.php");
    
}

?>