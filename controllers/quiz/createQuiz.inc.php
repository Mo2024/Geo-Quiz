<?php 
require('../functions/functions.inc.php');
require("../partials/regex.inc.php");
if(isset($_SESSION['userId']) && !empty($_SESSION['userId'])){
    $id = $_SESSION['userId'];
    
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){
      
        $title = $_POST['title'];
        $timer = $_POST['timer'];
        $noOfQuestions = $_POST['noOfQuestions'];
        $color = $_POST['color'];
        $description = $_POST['description'];
        // if(!preg_match($titleReg, $title)){
        //     echoAlertDanger("Please make sure that is correct");

        // }
        // else if(!preg_match($timerReg, $timer)){
        //     echoAlertDanger("Please make sure that the entered timer is correct");
        // }
        // else if(!preg_match($noOfQuestionsReg, $noOfQuestions) ){
        //     echoAlertDanger("Please make sure that the entered number of questions is corrcet");
        // }
        // else if(!preg_match($colorReg, $color) ){
        //     echoAlertDanger("Please make sure that the entered hex is corrcet");
        // }
        // else if(!preg_match($descriptionReg, $description) ){
        //     echoAlertDanger("Please make sure that the entered description is corrcet");
        // }
        // else{
            $db->beginTransaction();
            $sql = $db->prepare("insert into quiz (title,description,nQuestions,boxColor,totalTime,uid) values ('".$title."', '".$description."', '".$noOfQuestions."', '".$color."', '".$description."', '".$id."')");
            $sql->execute();
            $quizId = $db->lastInsertId();
            $_SESSION['quizId'] = $quizId;
            $_SESSION['noOfQuestions'] = $noOfQuestions;
            header("Location: /ITCS333-Project/quiz/createQuestion.php");
        // }
    }
}else{
    $url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    setcookie("redirect", $url,0,'/');
    header("Location: /ITCS333-Project/auth/signin.php");
    
}

?>