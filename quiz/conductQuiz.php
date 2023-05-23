<?php $title = "Conduct Quiz"; require('../partials/boilerplate.inc.php')?>
<?php require('../controllers/quiz/conductQuiz.inc.php')?>

<link rel="stylesheet" href="/ITCS333-Project/public/css/conductQuiz.css">
<button style="display: none;" id="startButton" onclick="startTimer()">Start</button>
    

<div class="container-fluid p-0" style="border: 1px solid black;">
    <div id="timerBox" style="height:45px;">
        <span class= "hello" style="font-size:30px;" id="remainingTime"></span>
    </div>
</div>

<div class="text-end btn-lg ml-3">
<button class="btn-primary" id="pauseButton" onclick="pauseTimer()" disabled>Pause Timer</button>
</div>
<form class="validated-form mt-3" method="POST" action="<?php echo '/ITCS333-Project/controllers/quiz/submitQuiz.inc.php?quizId='.$quizRow['quizid'] ?>" novalidate>

    <div class="container align-items-center">
        <?php $mcqIndex = 0; $btnRadioIndex = 0; $questionIndex = 0;
        for($i=0;$i<count($questionsRow);$i++){ 
            $questionIndex = $questionIndex + 1;
        ?>
            <h2>Q<?php echo $questionIndex.". ".$questionsRow[$i]['question']?></h2>

            <?php if($questionsRow[$i]['type']=="MCQ"){ ?>
                <div class="text-center btn-group-vertical  w-75" role="group" aria-label="Basic radio toggle button group">
                    <input onclick="handleRadioClick(this.value,<?php echo $i ?>, this.name)" id="<?php echo "btnradio".$btnRadioIndex ?>" value="<?php echo $choicesRow[$mcqIndex]['choice'] ?>"  type="radio" class="btn-check" name="<?php echo "q".$questionsRow[$i]['questionId'] ?>" autocomplete="off">
                    <label class="btn btn-outline-secondary p-2 text-start" for="btnradio<?php echo $btnRadioIndex ?>" style="color:black;"><?php echo $choicesRow[$mcqIndex]['choice'] ?></label>
        
                    <input onclick="handleRadioClick(this.value,<?php echo $i ?>, this.name)" id="<?php echo "btnradio".$btnRadioIndex+1 ?>" value="<?php echo $choicesRow[$mcqIndex+1]['choice'] ?>"  type="radio" class="btn-check  w-75" name="<?php echo "q".$questionsRow[$i]['questionId'] ?>" autocomplete="off">
                    <label class="btn btn-outline-secondary p-2 text-start" for="btnradio<?php echo $btnRadioIndex+1 ?>" style="color:black;"><?php echo $choicesRow[$mcqIndex+1]['choice'] ?></label>
        
                    <input onclick="handleRadioClick(this.value,<?php echo $i ?>, this.name)" id="<?php echo "btnradio".$btnRadioIndex+2 ?>" value="<?php echo $choicesRow[$mcqIndex+2]['choice'] ?>"  type="radio" class="btn-check w-75" name="<?php echo "q".$questionsRow[$i]['questionId'] ?>" autocomplete="off">
                    <label class="btn btn-outline-secondary p-2 text-start" for="btnradio<?php echo $btnRadioIndex+2 ?>" style="color:black;"><?php echo $choicesRow[$mcqIndex+2]['choice'] ?></label>

                    <input onclick="handleRadioClick(this.value,<?php echo $i ?>, this.name)" id="<?php echo "btnradio".$btnRadioIndex+3 ?>" value="<?php echo $choicesRow[$mcqIndex+3]['choice'] ?>"  type="radio" class="btn-check w-75" name="<?php echo "q".$questionsRow[$i]['questionId'] ?>" autocomplete="off">
                    <label class="btn btn-outline-secondary p-2 text-start" for="btnradio<?php echo $btnRadioIndex+3 ?>" style="color:black;"><?php echo $choicesRow[$mcqIndex+3]['choice'] ?></label>
        
                    <input style="display: none;" name="answers[]" id="<?php echo "answer#".$i ?>" placeholder="Answer" class="form-control" type="text" name="answer" id="answee" required autofocus>
                    <br>
                </div>
            <?php $mcqIndex = $mcqIndex + 3; $btnRadioIndex = $btnRadioIndex + 4; ?>
            <?php } else if($questionsRow[$i]['type']=="TF") {?>
                    <div class="text-center btn-group-vertical  w-75" role="group" aria-label="Basic radio toggle button group">

                    <input onclick="handleRadioClick(this.value,<?php echo $i ?>, this.name)" id="<?php echo "btnradio".$btnRadioIndex ?>" value="true"  type="radio" class="btn-check w-75" name="<?php echo "q".$questionsRow[$i]['questionId'] ?>" autocomplete="off">
                    <label class="btn btn-outline-secondary p-2 text-start" for="btnradio<?php echo $btnRadioIndex ?>" style="color:black;">True</label>

                    <input onclick="handleRadioClick(this.value,<?php echo $i ?>, this.name)" id="<?php echo "btnradio".$btnRadioIndex+1 ?>" value="false"  type="radio" class="btn-check w-75" name="<?php echo "q".$questionsRow[$i]['questionId'] ?>" autocomplete="off">
                    <label class="btn btn-outline-secondary p-2 text-start" for="btnradio<?php echo $btnRadioIndex+1 ?>" style="color:black;">False</label>
                    
                        <input style="display: none;" name="answers[]" id="<?php echo "answer#".$i ?>" placeholder="Answer" class="form-control" type="text" required autofocus>
                        <br>
                    </div>
                    <?php $btnRadioIndex = $btnRadioIndex + 2; ?>
                    <?php } else if($questionsRow[$i]['type']=="FITB") {?>
                        <div class="text-center btn-group-vertical  w-75" role="group" aria-label="Basic radio toggle button group">
                        <input onchange="handleRadioClick(this.value,<?php echo $i ?>, this.name)" name="<?php echo "q".$questionsRow[$i]['questionId'] ?>"  placeholder="Answer" class="form-control" type="text" required autofocus>
                        <input style="display: none;" name="answers[]" id="<?php echo "answer#".$i ?>" placeholder="Answer" class="form-control" type="text" required autofocus>
                    <br>
                </div>
            <?php } ?>
        <?php } ?>
        <input style="display: none;" name="timeLeft" id="timeLeft"  placeholder="Answer" class="form-control" type="text" name="answer" required autofocus>
        <button name="submit" id="submitBtn" class="answerbutton btn-lg mb-3" type="button" onclick="submitForm()" style="background-color:#05AA6D;">Submit</button>
    </div>

</form> 

<script src="/ITCS333-Project/public/js/conductQuiz.js"></script>

<?php require('../partials/footer.inc.php')?>