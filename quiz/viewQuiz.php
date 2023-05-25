<?php $title = "Sign Up"; require('../partials/boilerplate.inc.php')?>
<?php require('../controllers/quiz/viewQuiz.inc.php')?>

<div class="container mb-3" style="margin-top:30px;">
<div class="row justify-content-center">
    <div class="col-xl-9">
        <div class="bg-color border card border-color-form shadow">
            <div class="card-body">
            <h5 class="card-title text-center" style="font-size:45px;font-weight:bold;color:black;"><?php echo $quizRow['title'] ?> Details</h5>
            <ul class="list-group list-group-flush">
              <li class="list-group-item"> <h5>Quiz created by: </h5><?php echo $quizRow['username'] ?></li>
                <li class="list-group-item"> <h5>Quiz Time:</h5><?php echo $quizRow['totalTime']/60 ?> Minutes</li>
                <li class="list-group-item"><h5>Number of Questions:</h5><?php echo $quizRow['nQuestions'] ?> Questions</li>
                <li class="list-group-item"><h5>Quiz Description:</h5><?php echo $quizRow['description'] ?></li>
             </ul>
             <div class="d-flex justify-content-end">
               <a href="/ITCS333-Project/quiz/conductQuiz.php?quizId=<?php echo $quizRow['quizid']?>" class="btn btn-lg btn-success">Start Quiz</a>
             </div>

            </div>
        </div>
    </div>
</div>
</div>


<?php require('../partials/footer.inc.php')?>