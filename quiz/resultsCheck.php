<?php $title = "Results"; require('../partials/boilerplate.inc.php')?>
<?php require('../controllers/quiz/resultsCheck.inc.php')?>
<link rel="stylesheet" href="/ITCS333-Project/public/css/resultsCheck.css">

<?php if(isset($_SESSION['markScheme'])) { ?>

    <?php $markScheme = $_SESSION['markScheme']; ?>

    <h1 class="mt-5" style="text-align:center;">Well Done <?php echo $_SESSION['username'] ?>! Your Score is <?php echo $markScheme['score'].'/'.$markScheme['quizScore']; ?> </h1><br>
    <div class="text-end">
    <a href="leaderboard.php" style="position: relative; top: -35px; left: -55px;">
        <i class="fa-solid fa-award fa-2xl" style="color: #ffd700; font-size: 10em;"></i>
    </a>
    </div>

    <div class="container d-flex justify-content-center">
    <div class="card border-primary mb-3 mx-2" style="max-width: 18rem;">
        <div style="font-size:21px;font-weight:bold;" class="card-header text-center">Time Elasped</div>
        <div class="card-body text-primary">
        <?php $timeElapsed = formatSecondsToMinutes($markScheme['timeElapsed']); ?>
        <h5 class="card-title text-center"><?php echo $timeElapsed ?> Minutes</h5>
        </div>
    </div>
    <div class="card border-secondary mb-3 mx-2" style="max-width: 18rem;">
        <div style="font-size:21px;font-weight:bold;" class="card-header text-center">Rank</div>
        <div class="card-body text-secondary">
        <h5 class="card-title text-center">3rd Place</h5>
        </div>
    </div>
    <div class="card border-success mb-3 mx-2" style="max-width: 18rem;">
        <div style="font-size:21px;font-weight:bold;" class="card-header text-center">Correct Questions</div>
        <div class="card-body text-success">
        <?php if($markScheme['correctAnswers'] > 1 || $markScheme['correctAnswers'] == 0){ ?> 
            <h5 class="card-title text-center"><?php echo $markScheme['correctAnswers'] ?> Questions</h5>
        <?php } else {?>
            <h5 class="card-title text-center"><?php echo $markScheme['correctAnswers'] ?> Question</h5>
        <?php } ?>
        </div>
    </div>
    <div class="card border-danger mb-3 mx-2" style="max-width: 18rem;">
        <div style="font-size:21px;font-weight:bold;" class="card-header text-center">Wrong Questions</div>
        <div class="card-body text-danger">
        <?php if($markScheme['wrongAnswers'] > 1 || $markScheme['wrongAnswers'] == 0){ ?> 
            <h5 class="card-title text-center"><?php echo $markScheme['wrongAnswers'] ?> Questions</h5>
        <?php } else {?>
            <h5 class="card-title text-center"><?php echo $markScheme['wrongAnswers'] ?> Question</h5>
        <?php } ?>
        </div>
    </div>
    <div class="card border-info mb-3 mx-2" style="max-width: 18rem;">
        <div style="font-size:21px;font-weight:bold;" class="card-header text-center">View Leaderboard</div>
        <div class="card-body text-info text-center">
            <a href="http://localhost/ITCS333-Project/quiz/quizLeaderboard.php?quizId=<?php echo $markScheme['quizId'] ?>">View Leaderboard</a>
        </div>
    </div>

    </div>

<div class="resultsCheck">
    <div class="container align-items-center">
        <?php $mcqIndex = 0; $btnRadioIndex = 0; $questionIndex = 1;
        for($i=0;$i<$markScheme['nQuestions'];$i++){?>
            <?php  $getSvg = getSvg($markScheme[$i]['userAnswer'],$markScheme[$i]['answer']) ?>
            <h2><?php echo $getSvg ?>&nbsp;&nbsp;Q<?php echo $questionIndex.". ".$markScheme[$i]['question']?></h2>
            
            
            <?php if($markScheme[$i]['type']=="MCQ"){ ?>
                <div class="text-center btn-group-vertical  w-75" role="group" aria-label="Basic radio toggle button group">
                    <?php  $bgClass = getBg($markScheme[$i]['choices'][$mcqIndex],$markScheme[$i]['answer']) ?>
                    <input disabled   type="radio" class="btn-check">
                    <label class="btn <?php  echo $bgClass ?> btn-outline-secondary p-2 text-start" style="color:black;"><?php echo $markScheme[$i]['choices'][$mcqIndex]?></label>
                    
                    <?php  $bgClass = getBg($markScheme[$i]['choices'][$mcqIndex+1],$markScheme[$i]['answer']) ?>
                    <input disabled   type="radio" class="btn-check">
                    <label class="btn <?php  echo $bgClass ?> btn-outline-secondary p-2 text-start" style="color:black;"><?php echo $markScheme[$i]['choices'][$mcqIndex+1]?></label>
                    
                    <?php  $bgClass = getBg($markScheme[$i]['choices'][$mcqIndex+2],$markScheme[$i]['answer']) ?>
                    <input disabled   type="radio" class="btn-check">
                    <label class="btn <?php  echo $bgClass ?> btn-outline-secondary p-2 text-start" style="color:black;"><?php echo $markScheme[$i]['choices'][$mcqIndex+2]?></label>
                    
                    <?php  $bgClass = getBg($markScheme[$i]['choices'][$mcqIndex+3],$markScheme[$i]['answer']) ?>
                    <input disabled   type="radio" class="btn-check">
                    <label class="btn <?php  echo $bgClass ?> btn-outline-secondary p-2 text-start" style="color:black;"><?php echo $markScheme[$i]['choices'][$mcqIndex+3]?></label>
                    <br>
                </div>
            <?php $mcqIndex = $mcqIndex + 4; $btnRadioIndex = $btnRadioIndex + 4; ?>
            <?php } else if($markScheme[$i]['type']=="TF") {?>
                    <div class="text-center btn-group-vertical  w-75" role="group" aria-label="Basic radio toggle button group">

                        <?php  $bgClass = getBg('true',$markScheme[$i]['answer']) ?>
                        <input disabled   type="radio" class="btn-check">
                        <label class="btn <?php  echo $bgClass ?>  btn-outline-secondary p-2 text-start" style="color:black;">True</label>
                        
                        <?php  $bgClass = getBg('false',$markScheme[$i]['answer']) ?>
                        <input disabled   type="radio" class="btn-check">
                        <label class="btn <?php  echo $bgClass ?>  btn-outline-secondary p-2 text-start"  style="color:black;">False</label>
                        
                        <br>
                    </div>
                    <?php $btnRadioIndex = $btnRadioIndex + 2; ?>
                    <?php } else if($markScheme[$i]['type']=="FITB") {?>
                    <div class="text-center btn-group-vertical  w-75" role="group" aria-label="Basic radio toggle button group">

                        <?php  $bgClass = getBg($markScheme[$i]['userAnswer'],$markScheme[$i]['answer']) ?>
                        <input disabled   type="radio" class="btn-check">
                        <label class="btn <?php  echo $bgClass ?>  btn-outline-secondary p-2 text-start"  style="color:black;"><?php echo $markScheme[$i]['userAnswer'] ?></label>
                        <br>
                    </div>
            <?php } ?>
        <?php $questionIndex = $questionIndex + 1;} ?>
    </div>
</div>
<?php } else{

$_SESSION['error'] = "You must conduct a quiz first";
header("Location: /ITCS333-Project/quiz/quizzesDisplay.php");
}?>


<?php require('../partials/footer.inc.php')?>