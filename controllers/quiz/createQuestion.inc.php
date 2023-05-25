<?php 
require('../functions/functions.inc.php');
require("../partials/regex.inc.php");

if(isset($_SESSION['userId']) && !empty($_SESSION['userId'])){
    $uid = $_SESSION['userId'];
    try{
        if(isset($_SESSION['newQuiz'])){
            $newQuiz = $_SESSION['newQuiz'];
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){
                $db->beginTransaction();
                $sql = $db->prepare("insert into quiz (title, description, nQuestions, totalTime, uid, dateCreated) values (?, ?, ?, ?, ?, ?)");
                $sql->execute([$newQuiz['title'], $newQuiz['description'], $newQuiz['noOfQuestions'], $newQuiz['timer'], $uid, $newQuiz['dateCreated']] );
                $quizId = $db->lastInsertId();

                $qTypes = $_POST['qTypes'];
                $marks = $_POST['marks'];
                $questions = $_POST['questions'];
                $answers = $_POST['answers'];
                if(isset($_POST['options'])){
                    $options = $_POST['options'];
                }

                $sqlQuestions = $db->prepare("insert into questions (quizId, type, score, question, answer) values (?, ?, ?, ?, ?)");
                $sqlChoices = $db->prepare("insert into choices (choice, questionId) values (?, ?)");
                $mcqCounter = 0;
                $valid = true;
                $errorMsg = '';

                for($i=0; $i < $newQuiz['noOfQuestions']; $i++){
                    // if(preg_match($passwordReg, $qTypes[$i])){

                    //     $valid = false;
                    //     $errorMsg = 'Make sure to input a valid question type';
                    //     break;
                    // }else if(!preg_match($passwordReg, $questions[$i])){

                    //     $valid = false;
                    //     $errorMsg = 'Make sure to input a valid question';
                    //     break;
                    // }else if(!preg_match($passwordReg, $marks[$i])){

                    //     $valid = false;
                    //     $errorMsg = 'Make sure to input a valid mark';
                    //     break;
                    // }else if(!preg_match($passwordReg, $answers[$i])){

                    //     $valid = false;
                    //     $errorMsg = 'Make sure to input a valid answer';
                    //     break;
                    // }
                    // if(preg_match($qTypesReg, $qTypes[$i])){

                    //     $valid = false;
                    //     $errorMsg = 'Make sure to input a valid question type';
                    //     break;
                    // }else if(!preg_match($questionsReg, $questions[$i])){

                    //     $valid = false;
                    //     $errorMsg = 'Make sure to input a valid question';
                    //     break;
                    // }else if(!preg_match($marksReg, $marks[$i])){

                    //     $valid = false;
                    //     $errorMsg = 'Make sure to input a valid mark';
                    //     break;
                    // }else if(!preg_match($answersReg, $answers[$i])){

                    //     $valid = false;
                    //     $errorMsg = 'Make sure to input a valid answer';
                    //     break;
                    // }

                    $sqlQuestions->execute([$quizId, $qTypes[$i], $marks[$i], $questions[$i], $answers[$i]]);
                    $questionId = $db->lastInsertId();
                    
                    $answerCorrect = false;
                    if($qTypes[$i]=="MCQ"){
                        for($j=0; $j < 4; $j++){
                            if($options[$mcqCounter] == $answers[$i]) {$answerCorrect = true;}
                            $sqlChoices->execute([$options[$mcqCounter], $questionId]);
                            $mcqCounter++;
                            if($j == 3 && !$answerCorrect){$valid = false; $errorMsg = "Please check your MCQ questions and make sure the answers match at least one choice";}
                        }
                    } 
                    if(!$valid){break;}

                }
                if($valid){
                    $db->commit();
                    unset($_SESSION['newQuiz']);
                    $_SESSION['success'] = "Quiz Created Successfully!";
                    header("Location: /ITCS333-Project/quiz/quizzesDisplay.php");
                }else{
                    $db->rollback();
                    echoAlertDanger($errorMsg);
                }



            }
        }else{
            //redirect
            $_SESSION['error'] = "You Must Create a Quiz first!";
            header("Location: /ITCS333-Project/quiz/quizzesDisplay.php");
        }
    }catch(e){
        // redirect
        $_SESSION['error'] = "Error";
        header("Location: /ITCS333-Project/quiz/quizzesDisplay.php");

    }

}else{
    $url = 'http://localhost/ITCS333-Project/quiz/createQuiz.php';
    setcookie("redirect", $url,0,'/');
    header("Location: /ITCS333-Project/auth/signin.php");
}

?>