<?php 
require('../functions/functions.inc.php');
require("../partials/regex.inc.php");
if(isset($_SESSION['userId'])){
    $id = $_SESSION['userId'];
    
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){
      
        $title = $_POST['title'];
        $timer = $_POST['timer'];
        $noOfQuestions = $_POST['noOfQuestions'];
        $description = $_POST['description'];
        if(!preg_match($titleReg, $title)){
            $_SESSION['error'] = "Please make sure that is correct";
            header("Location: /ITCS333-Project/quiz/createQuiz.php");
        }
        else if(!preg_match($timerReg, $timer)){
            $_SESSION['error'] = "Please make sure that the entered timer is correct";
            header("Location: /ITCS333-Project/quiz/createQuiz.php");
            
        }
        else if(!preg_match($noOfQuestionsReg, $noOfQuestions) ){
            $_SESSION['error'] = "Please make sure that the entered number of questions is corrcet";
            header("Location: /ITCS333-Project/quiz/createQuiz.php");
        }
        else if(!preg_match($descriptionReg, $description) ){
            $_SESSION['error'] = "Please make sure that the entered description is corrcet";
            header("Location: /ITCS333-Project/quiz/createQuiz.php");
        }
        else{
            $newQuiz = array(
                'title' => $title,
                'timer' => $timer,
                'noOfQuestions' => $noOfQuestions,
                'description' => $description,
            );
            $_SESSION['newQuiz'] = $newQuiz;
            header("Location: /ITCS333-Project/quiz/createQuestion.php");
        }
    }
}else{
    $url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    setcookie("redirect", $url,0,'/');
    header("Location: /ITCS333-Project/auth/signin.php");
    
}

?>