<?php 
require('../functions/functions.inc.php');
require("../partials/regex.inc.php");
function formatSecondsToMinutes($durationInSeconds) {
    $minutes = floor($durationInSeconds / 60);
    $seconds = $durationInSeconds % 60;
    $timeFormatted = sprintf("%d:%02d", $minutes, $seconds);
    return $timeFormatted;
}
if(isset($_SESSION['userId'])){
    $uid = $_SESSION['userId'];
    $query = "SELECT results.*, quiz.title, quiz.totalTime FROM results INNER JOIN quiz ON results.quizId = quiz.quizid WHERE results.userId = :uid";
    $statement = $db->prepare($query);
    $statement->bindValue(':uid', $uid);
    $statement->execute();
    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);

}else{
    $url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    setcookie("redirect", $url,0,'/');
    header("Location: /ITCS333-Project/auth/signin.php");
}

?>