<?php 
require('../functions/functions.inc.php');
require("../partials/regex.inc.php");

if(isset($_SESSION['userId']) && !empty($_SESSION['userId'])){
    $uid = $_SESSION['userId'];
    $quizId = $_SESSION['noOfQuestions'];
    try{
        if(isset($_SESSION['newQuiz'])){
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){
                $newQuiz = $_SESSION['newQuiz'];
                unset($_SESSION['newQuiz']);
                $db->beginTransaction();
                $sql = $db->prepare("insert into quiz (title, description, nQuestions, boxColor, totalTime, uid) values (?, ?, ?, ?, ?, ?)");
                $sql->execute([$newQuiz['title'], $newQuiz['description'], $newQuiz['noOfQuestions'], $newQuiz['color'], $newQuiz['timer'], $uid]);
                $quizId = $db->lastInsertId();

                $qTypes = $_POST['qTypes'];
                $marks = $_POST['marks'];
                $questions = $_POST['questions'];
                $answers = $_POST['answers'];
                // $images = $_POST['images'];
                if(isset($_POST['options'])){
                    
                    $options = $_POST['options'];
                }
                
                $mcqCounter = 0;

                for($i=0; $i < $newQuiz['noOfQuestions']; $i++){
                    $sql = $db->prepare("insert into questions (quizId, type, score, question, answer) values (?, ?, ?, ?, ?)");
                    $sql->execute([$quizId, $qTypes[$i], $marks[$i], $questions[$i], $answers[$i]]);
                    $questionId = $db->lastInsertId();
                    if($qTypes[$i]=="MCQ"){
                        for($j=0; $j < 4; $j++){
                            $sql = $db->prepare("insert into choices (choice, questionId) values (?, ?)");
                            $sql->execute([$options[$mcqCounter], $questionId]);
                            $mcqCounter++;
                        }
                    } 

                }
                $db->commit();
                header("Location: /ITCS333-Project/mainpage.php");



            }
        }else{
            //redirect
            // echoAlertDanger("You don't have authorization to add questions to this quizz");
            header("Location: /ITCS333-Project/mainpage.php");
        }
    }catch(e){
        // redirect
        // echoAlertDanger('Error');
        header("Location: /ITCS333-Project/mainpage.php");

    }

}else{
    $url = 'http://localhost/ITCS333-Project/quiz/createQuiz.php';
    setcookie("redirect", $url,0,'/');
    header("Location: /ITCS333-Project/auth/signin.php");
    
}

?>