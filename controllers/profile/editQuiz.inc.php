<?php 
require('../functions/functions.inc.php');
require("../partials/regex.inc.php");
if(isset($_SESSION['userId'])){
    if(isset($_GET['quizId'])){
        $id = $_SESSION['userId'];
        $insertQuery = "SELECT * FROM quiz WHERE quizid = ?";
        $stmt = $db->prepare($insertQuery);
        $stmt->bindValue(1, $_GET['quizId'], PDO::PARAM_INT);
        $stmt->execute();
        $quizRow = $stmt->fetch();
        if($id == $quizRow['uid']){
        
            $query = "SELECT * FROM questions WHERE quizId = :quizId";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':quizId', $_GET['quizId']);
            $stmt->execute();        
            $questionsRow = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            $query = "SELECT questions.*, choices.choice,choices.choiceId FROM questions INNER JOIN choices ON questions.questionId = choices.questionId WHERE questions.quizId = ?";
            $stmt = $db->prepare($query);
            $stmt->bindValue(1, $_GET['quizId'], PDO::PARAM_INT);
            $stmt->execute();
            $choicesRow = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){
            
                $qTypes = $_POST['qTypes'];
                $marks = $_POST['marks'];
                $questions = $_POST['questions'];
                $answers = $_POST['answers'];
                $qIds = $_POST['qId'];
                $cIds = $_POST['cId'];
                if(isset($_POST['options'])){
                    $options = $_POST['options'];
                }
                
                $mcqCounter = 0;
                $valid = true;
                $errorMsg = '';
                $db->beginTransaction();
                $updateQuestions = $db->prepare("UPDATE questions SET type = :type, score = :score, question = :question, answer = :answer  WHERE questionid = :uid");
                $updateChoices = $db->prepare("UPDATE choices SET choice = :choice WHERE questionId = :qid AND choiceID = :cid");


                for($i=0; $i < $quizRow['nQuestions']; $i++){
                    if(!preg_match($qTypesReg, $qTypes[$i])){

                        $valid = false;
                        $errorMsg = 'Make sure to input a valid question type';
                        break;
                    }else if(!preg_match($questionsReg, $questions[$i])){

                        $valid = false;
                        $errorMsg = 'Make sure to input a valid question';
                        break;
                    }else if(!preg_match($marksReg, $marks[$i])){

                        $valid = false;
                        $errorMsg = 'Make sure to input a valid mark';
                        break;
                    }else if(!preg_match($answersReg, $answers[$i])){

                        $valid = false;
                        $errorMsg = 'Make sure to input a valid answer';
                        break;
                    }
                    $updateQuestions->bindParam(':uid', $qIds[$i]);
                    $updateQuestions->bindParam(':type', $qTypes[$i]);
                    $updateQuestions->bindParam(':score', $marks[$i]);
                    $updateQuestions->bindParam(':question', $questions[$i]);
                    $updateQuestions->bindParam(':answer', strtolower($answers[$i]));
                    $updateQuestions->execute();

                    $answerCorrect = false;
                    if($qTypes[$i]=="MCQ"){
                        for($j=0; $j < 4; $j++){
                            if($options[$mcqCounter] == $answers[$i]) {$answerCorrect = true;}

                            $updateChoices->bindParam(':qid', $qIds[$i]);
                            $updateChoices->bindParam(':cid', $cIds[$mcqCounter]);
                            $updateChoices->bindParam(':choice', $options[$mcqCounter]);
                            $updateChoices->execute();
                            $mcqCounter++;
                            if($j == 3 && !$answerCorrect){$valid = false; $errorMsg = "Please check your MCQ questions and make sure the answers match at least one choice";}
                        }
                    } 
                    if(!$valid){break;}

                }
                if($valid){
                    $db->commit();
                    unset($_SESSION['newQuiz']);
                    $_SESSION['success'] = "Quiz Edited Successfully!";
                    header("Location: /ITCS333-Project/profile/myQuizzes.php");
                }else{
                    $db->rollback();
                    echoAlertDanger($errorMsg);
                }
            }

        }else{
            $_SESSION['error'] = "You are not authorized to edit this quiz";
            header("Location: /ITCS333-Project/quiz/quizzesDisplay.php");
        }
    }
}else{
    $url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    setcookie("redirect", $url,0,'/');
    header("Location: /ITCS333-Project/auth/signin.php");
    
}

?>