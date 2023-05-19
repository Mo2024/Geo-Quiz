<?php 
require('../functions/functions.inc.php');
require("../partials/regex.inc.php");

if(isset($_SESSION['userId']) && !empty($_SESSION['userId'])){
    $uid = $_SESSION['userId'];
    $quizId = $_SESSION['noOfQuestions'];
    try{
        if($_SESSION['quizId']){
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){
                //code here
                $qTypes = $_POST['qTypes'];
                $marks = $_POST['marks'];
                $questions = $_POST['questions'];
                $answers = $_POST['answers'];
                $images = $_POST['images'];
                $options = $_POST['options'];
                
                $mcqCounter = 0;

                for($i=0; $i < $_SESSION['noOfQuestions']; $i++){
                    if($qTypes[i]=="MCQ"){
                        $sql = $db->prepare("insert into questions (quizId,type,score,question,answer) values ('".$quizId."', '".$qTypes[i]."', '".$marks[i]."', '".$questions[i]."', '".$answers[i]."')");
                        $sql->execute();
                        $questionId = $db->lastInsertId();
                        for($i=0; $i < 4; $i++){
                            $sql = $db->prepare("insert into choices (choice,questionId) values ('".$options[mcqCounter]."', '".$questionId."')");
                            $sql->execute();
                            $mcqCounter++;
                        }
                    }

                }

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