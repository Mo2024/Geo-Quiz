<?php 
require('../functions/functions.inc.php');
require("../partials/regex.inc.php");

if(isset($_SESSION['userId']) && !empty($_SESSION['userId'])){
    if(isset($_GET['quizId'])){

        $query = "SELECT * FROM questions WHERE quizId = :quizId";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':quizId', $_GET['quizId']);
        $stmt->execute();        
        $questionsRow = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $query = "SELECT questions.*, choices.choice FROM questions INNER JOIN choices ON questions.questionId = choices.questionId WHERE questions.quizId = ?";
        $stmt = $db->prepare($query);
        $stmt->bindValue(1, $_GET['quizId'], PDO::PARAM_INT);
        $stmt->execute();
        $choicesRow = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $query = "SELECT quiz.*, users.username FROM quiz INNER JOIN users ON quiz.uid = users.uid WHERE quiz.quizid = ?";
        $stmt = $db->prepare($query);
        $stmt->bindValue(1, $_GET['quizId'], PDO::PARAM_INT);
        $stmt->execute();
        $quizRow = $stmt->fetch();
        echo "<script> let totalQuizTime = ".($quizRow['totalTime']/60)."</script>";
        if(isset($_POST['submit'])){
            $uid = $_SESSION['userId'];
            try{
                $score = $_POST['score'];
                $timeElapsed = $_POST['timeElapsed'];
                $uid = $_SESSION['userId'];
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
        
        }
    }else{
        $_SESSION['error'] = "You must choose a valid quiz";
        header("Location: /ITCS333-Project/quiz/quizzesDisplay.php");
    }

}else{
    setcookie("redirect", $url,0,'/');
    header("Location: /ITCS333-Project/auth/signin.php");
}

?>