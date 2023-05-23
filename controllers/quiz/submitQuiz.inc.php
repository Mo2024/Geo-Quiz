<?php 
session_start();
require_once('../../vendor/autoload.php');
use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__.'/../../');
$dotenv->load();
require('../../functions/connection.inc.php');
require('../../functions/functions.inc.php');
require("../../partials/regex.inc.php");

if(isset($_SESSION['userId']) && !empty($_SESSION['userId'])){
    if(isset($_POST['submit']) && isset($_GET['quizId'])){
        // $answers = $_POST['answers'][0];
        $timeLeft = $_POST['timeLeft'];
        $quizId = $_GET['quizId'];


        $query = "SELECT quiz.*, users.username FROM quiz INNER JOIN users ON quiz.uid = users.uid WHERE quiz.quizid = ?";
        $stmt = $db->prepare($query);
        $stmt->bindValue(1, $_GET['quizId'], PDO::PARAM_INT);
        $stmt->execute();
        $quizRow = $stmt->fetch();

        $correctAnswers = 0;
        $score = 0;
        $wrongAnswers = 0;
        for($i = 0; $i < $quizRow['nQuestions']; $i++){
            $answerObject = json_decode($_POST['answers'][$i], true);
            $selectQuery = "SELECT * FROM questions WHERE questionId = ?";
            $stmt = $db->prepare($selectQuery);
            $stmt->bindValue(1, $answerObject['questionId'], PDO::PARAM_INT);
            $stmt->execute();
            $answerRow = $stmt->fetch();

            if(strval($answerObject['answer']) == strval($answerRow['answer'])){
                $correctAnswers++;
                $score += $answerRow['score'];
            }else{
                $wrongAnswers++;
            }
        }

        $dateConducted = date("F d\, Y");
        $timeElapsed = $quizRow['totalTime'] - $timeLeft;
        $uid = $_SESSION['userId'];
        $quizId = $_GET['quizId'];

        $db->beginTransaction();
        $sql = $db->prepare("INSERT INTO results (score, timeElapsed, userId, quizId, dateConducted) VALUES (?, ?, ?, ?, ?)");
        $sql->execute([$score, $timeElapsed, $uid, $quizId, $dateConducted] );
        $db->commit();
        $_SESSION['success'] = "Just for now dont know where to go";
        header("Location: /ITCS333-Project/quiz/quizzesDisplay.php");
    }


}else{
    setcookie("redirect", $url,0,'/');
    header("Location: /ITCS333-Project/auth/signin.php");
}

?>