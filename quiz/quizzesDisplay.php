<?php $title = "Quizzes"; require('../partials/boilerplate.inc.php')?>
<?php require('../controllers/quiz/quizzesDisplay.inc.php')?>

<div class="container w-50">
    <form class="d-flex mt-3">
        <input id="searchQuery" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button id="searchButton" class="btn btn-outline-success" type="button">Search</button>
    </form>
</div>
<div id="mainContainer" class="container" >
    <?php if(!isset($_COOKIE['search'])){ ?>
        <?php for($i=0; $i < count($quizzes); $i++){?>
            <div class="card mb-3 mt-3">
                <div class="row">
                    <div class="col-md-3">
                        <img src="https://cdn.shopify.com/s/files/1/0566/6586/6400/products/6_6e504cd6-25a9-46b2-b94b-5d87768d3306_300x@2x.jpg?v=1629388839" alt="" class="img-fluid h-100 w-100">
                    </div>
                    <div class="col-md-8 mt-5">
                        <div class="card-body">
                            <h3 class="card-title"><?php echo $quizzes[$i]['title'];?></h3>
                            <h4 class="card-title">Created By: <?php echo $quizzes[$i]['username'];?></h4>
                            <!-- <br/>
                            <br/>
                            <br/>
                            <br/> -->
                            
                            <a href="/ITCS333-Project/quiz/viewQuiz.php?quizId=<?php echo $quizzes[$i]['quizid']?>" class="btn mt-5 btn-primary">View Quiz</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php }?>
    <?php }?>
</div>

<script src="/ITCS333-Project/public/js/searchQuery.js"></script>


<?php require('../partials/footer.inc.php')?>