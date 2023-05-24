<?php $title = "Quizzes"; require('../partials/boilerplate.inc.php')?>
<?php require('../controllers/quiz/quizzesDisplay.inc.php')?>

<div class="container" >
    <?php if(!isset($_GET['searchQuery'])){ ?>
        <?php for($i=0; $i < count($quizzes); $i++){?>
            <div class="card mb-3 mt-3">
                <div class="row">
                    <div class="col-md-3">
                        <img src="https://cdn.shopify.com/s/files/1/0566/6586/6400/products/6_6e504cd6-25a9-46b2-b94b-5d87768d3306_300x@2x.jpg?v=1629388839" alt="" class="img-fluid h-100 w-100">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h3 class="card-title"><?php echo $quizzes[$i]['title'];?></h3>
                            <h4 class="card-title">Created By: <?php echo $quizzes[$i]['username'];?></h4>
                            <br/>
                            <h5 class="card-title">Number of Questions: <?php echo $quizzes[$i]['nQuestions'];?></h5>
                            <h5 class="card-title">Total Time: <?php echo $quizzes[$i]['totalTime']/60;?> Minutes</h5>
                            <h5 class="card-title">Description:</h5>
                            <p class="card-text"><?php echo $quizzes[$i]['description'];?></p>
                            
                            <a href="/ITCS333-Project/quiz/conductQuiz.php?quizId=<?php echo $quizzes[$i]['quizid']?>" class="btn btn-primary">Start Quiz</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php }?>
    <?php }?>
</div>

<?php require('../partials/footer.inc.php')?>