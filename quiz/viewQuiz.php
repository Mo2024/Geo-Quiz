<?php $title = "Sign Up"; require('../partials/boilerplate.inc.php')?>
<?php require('../controllers/quiz/viewQuiz.inc.php')?>

<style> 
.no-resize {
  resize: none;
}
</style>

<div class="container w- d-flex justify-content-center align-items-center my-5">
    <div class="row">
        <div class="col-xl-12 ">
            <div class="bg-color border card border-color-form shadow">
                <div class="card-body">
                    <h5 class="card-title text-secondary">Create Quiz</h5>
                    <form class="validated-form" method="POST" novalidate>
                        <div class="row">
                            <div class="mb-3 col-sm-6">
                                <label class="form-label" for="title">Title</label>
                                <input disabled class="form-control" placeholder="Title" type="text" name="title" id="title" value="<?php echo $quizRow['title'] ?>" required autofocus>
                            </div>
                            <div class="mb-3 col-sm-6">
                                <label class="form-label" for="timer">Timer</label>
                                <input disabled class="form-control" placeholder="timer" type="text" name="timer" id="timer" value="<?php echo $quizRow['totalTime']/60 ?> Minutes" required autofocus>

                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-sm-6">
                                <label class="form-label" for="noOfQuestions">Number of Questions</label>
                                <input disabled class="form-control" placeholder="Number of Questions" type="number" name="noOfQuestions" id="noOfQuestions" value="<?php  echo $quizRow['nQuestions'] ?>" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-sm-12">
                                <label class="form-label" for="description">Description</label>
                                <textarea disabled class="form-control no-resize" placeholder="Description" rows="5" name="description" id="description" required><?php  echo $quizRow['description'] ?></textarea>
                            </div>
                        </div>
                        <a href="/ITCS333-Project/quiz/conductQuiz.php?quizId=<?php echo $quizRow['quizid']?>" class="btn btn-primary">Start Quiz</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require('../partials/footer.inc.php')?>