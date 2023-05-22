<?php 
session_abort();
require_once('../../vendor/autoload.php');
use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__.'/../../');
$dotenv->load();
require('../../functions/connection.inc.php');
require('../../functions/functions.inc.php');
require("../../partials/regex.inc.php");

if(isset($_POST['userId']) && !empty($_POST['userId'])){
    $uid = $_POST['userId'];
    try{
        $score = $_POST['score'];
        $timeElapsed = $_POST['timeElapsed'];
        $uid = $_POST['userId'];
        $quizId = $_POST['quizId'];
        $dateConducted = date("F d\, Y");

        if(!preg_match($scoreReg, $score)){
            $_SESSION['error'] = "Error";
            header("Location: /ITCS333-Project/quiz/quizzesDisplay.php");
        }else if (!preg_match($timeElapsedReg, $timeElapsed)){
            $_SESSION['error'] = "Error";
            header("Location: /ITCS333-Project/quiz/quizzesDisplay.php");
        }else if (!preg_match($idReg, $uid)){
            $_SESSION['error'] = "Error";
            header("Location: /ITCS333-Project/quiz/quizzesDisplay.php");
        }else if (!preg_match($idReg, $quizId)){
            $_SESSION['error'] = "Error";
            header("Location: /ITCS333-Project/quiz/quizzesDisplay.php");
        }

        $db->beginTransaction();
        $sql = $db->prepare("INSERT INTO results (score, timeElapsed, userId, quizId, dateConducted) VALUES (?, ?, ?, ?, ?)");
        $sql->execute([$score, $timeElapsed, $uid, $quizId, $dateConducted] );
        $db->commit();
        $_SESSION['success'] = "Just for now dont know where to go";
        header("Location: /ITCS333-Project/quiz/quizzesDisplay.php");

    }catch(e){
        // redirect
        $_SESSION['error'] = "Error";
        header("Location: /ITCS333-Project/quiz/quizzesDisplay.php");

    }

}else{
    setcookie("redirect", $url,0,'/');
    header("Location: /ITCS333-Project/auth/signin.php");
}

?>