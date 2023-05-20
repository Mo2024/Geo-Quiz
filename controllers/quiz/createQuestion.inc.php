<?php 
require('../functions/functions.inc.php');
require("../partials/regex.inc.php");

if(isset($_SESSION['userId']) && !empty($_SESSION['userId'])){
    $uid = $_SESSION['userId'];
    $quizId = $_SESSION['noOfQuestions'];
    try{
        if(isset($_SESSION['quizId'])){
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){
                $newQuiz = $_SESSION['newQuiz'];
                // $db->beginTransaction();
                // $sql = $db->prepare("insert into quiz (title,description,nQuestions,boxColor,totalTime,uid) values ('".$newQuiz['title']."', '".$newQuiz['description']."', '".$newQuiz['noOfQuestions']."', '".$newQuiz['color']."', '".$newQuiz['timer']."', '".$uid."')");
                // $sql->execute();
                // $quizId = $db->lastInsertId();

                $qTypes = $_POST['qTypes'];
                $marks = $_POST['marks'];
                $questions = $_POST['questions'];
                $answers = $_POST['answers'];
                var_dump($qTypes);
                var_dump($marks);
                var_dump($questions);
                var_dump($answers);
                // $images = $_POST['images'];
                if(isset($_POST['options'])){
                    
                    $options = $_POST['options'];
                }
                
                $mcqCounter = 0;

                for($i=0; $i < $newQuiz['noOfQuestions']; $i++){
                    $sql = $db->prepare("insert into questions (quizId,type,score,question,answer) values ('".$quizId."', '".$qTypes[$i]."', '".$marks[$i]."', '".$questions[$i]."', '".$answers[$i]."')");
                    $sql->execute();
                    $questionId = $db->lastInsertId();
                    if($qTypes[$i]=="MCQ"){
                        for($i=0; $i < 4; $i++){
                            $sql = $db->prepare("insert into choices (choice,questionId) values ('".$options[$mcqCounter]."', '".$questionId."')");
                            $sql->execute();
                            $mcqCounter++;
                        }
                    } 

                }
                $db->commit();
                unset($_SESSION['newQuiz']);
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
    }

}else{
    $url = 'http://localhost/ITCS333-Project/quiz/createQuiz.php';
    setcookie("redirect", $url,0,'/');
    header("Location: /ITCS333-Project/auth/signin.php");
    
}

?>