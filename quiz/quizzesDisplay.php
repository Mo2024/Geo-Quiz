<?php $title = "Quizzes"; require('../partials/boilerplate.inc.php')?>
<?php require('../controllers/quiz/quizzesDisplay.inc.php')?>

<div class="container" >
    <?php for($i=0; $i < 5; $i++){?>
        <div class="card mb-3 mt-3">
            <div class="row">
                <div class="col-md-3">
                    <img width="100%" height="100%" src="https://cdn.shopify.com/s/files/1/0566/6586/6400/products/6_6e504cd6-25a9-46b2-b94b-5d87768d3306_300x@2x.jpg?v=1629388839" alt="" class="img-fluid">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h3 class="card-title"><?php echo $quizzes[$i]['title'];?></h3>
                        <h5 class="card-title">Created By: <?php echo $quizzes[$i]['username'];?></h5>
                        <p class="card-text">Description: <?php echo $quizzes[$i]['description'];?></p>
                        <p class="card-text">
                            <small class="text-muted">Number of Questions: <?php echo $quizzes[$i]['nQuestions'];?></small>
                        </p>
                        
                        <a href="" class="btn  btn-primary">Start Quiz</a>
                    </div>
                </div>
            </div>
        </div>
    <?php }?>
</div>


   <script>
    const div = document.getElementById('box1');
    const backgroundColor = window.getComputedStyle(div).backgroundColor;

    // Convert the background color to RGB values
    const rgb = backgroundColor.match(/\d+/g);
    const r = parseInt(rgb[0]);
    const g = parseInt(rgb[1]);
    const b = parseInt(rgb[2]);

    // Calculate the luminance to determine if the text should be black or white
    const luminance = (r * 0.299 + g * 0.587 + b * 0.114) / 255;

    // Set the text color based on the luminance value
    if (luminance > 0.5) {
    div.style.color = '#000000'; // Black
    } else {
    div.style.color = '#ffffff'; // White
    }
   </script>


<?php require('../partials/footer.inc.php')?>