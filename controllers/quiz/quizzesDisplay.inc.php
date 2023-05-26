<?php 
    require('../functions/functions.inc.php');
    require("../partials/regex.inc.php");
    $idQuery = "SELECT *, users.username FROM quiz INNER JOIN users ON quiz.uid = users.uid";
    $result = $db->query($idQuery);
    $quizzes = $result->fetchAll(PDO::FETCH_ASSOC);
?>