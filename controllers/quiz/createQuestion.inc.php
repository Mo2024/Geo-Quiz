<?php 
require('../functions/functions.inc.php');
require("../partials/regex.inc.php");

if(isset($_SESSION['userId']) && !empty($_SESSION['userId'])){
    $uid = $_SESSION['userId'];

    try{
        $quizRow = selectQuiz($_GET['quizID'], $db);
        if(isset($_GET['quizId']) && intval($_GET['quizId']) != 0){
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){
                if($quizRow['uid'] == $uid){

                    //code here

                }else{
                    echoAlertDanger("You don't have authorization to add questions to this quizz");
                }
                    
            }
        }else{
            echoAlertDanger("You don't have authorization to add questions to this quizz");
        }
    }catch(e){
        echoAlertDanger('Error');
    }

}else{
    $url = 'http://localhost/ITCS333-Project/quiz/createQuiz.php';
    setcookie("redirect", $url,0,'/');
    header("Location: /ITCS333-Project/auth/signin.php");
    
}

?>