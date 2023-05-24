<?php $title = "Leaderboard"; require('../partials/boilerplate.inc.php')?>

<?php if(isset($_GET['quizId'])) { ?>
<div class="container my-4 border border-dark">
  <h1 class="text-center mb-4 mt-4">Top 3</h1>
  <div id="mainDiv" class="row">
    <div class="col-sm-4">
      <div class="card mt-4 mb-4" style="background-color: #f6fba2;background-image: linear-gradient(315deg, #f6fba2 0%, #20ded3 74%);">
        <div class="card-body">
          <h5 class="card-title username">Username2</h5>
          <p class="card-text points">Points: #</p>
          <h5>2nd Place</h5>
        </div>
      </div>
    </div>

    <div class="col-sm-4" >
      <div class="card mt-8 mb-4" style="background-color: #bbf0f3;
      background-image: linear-gradient(315deg, #bbf0f3 0%, #f6d285 74%)">
        <div class="card-body">
          <h5 class="card-title username" >Username1</h5>
          <p class="card-text points">Points: #</p>
          <h5>1st Place</h5>
        </div>
      </div>
    </div>


    <div class="col-sm-4">
      <div class="card mt-4 mb-4" style="background-color: #f9ea8f;
      background-image: linear-gradient(315deg, #f9ea8f 0%, #aff1da 74%);">
        <div class="card-body">
          <h5 class="card-title username">Username3</h5>
          <p class="card-text points">Points: #</p>
          <h5>3rd Place</h5>
        </div>
      </div>
    </div>

    <h3>Remaining Users</h3>
    <ul class="list-group list-group-flush">
      <li class="list-group-item mb-2 username">Username4<br>Points: #</li>
      <li class="list-group-item mb-2 username">Username5<br>Points: #</li>
      <li class="list-group-item mb-2 username">Username6<br>Points: #</li>
      <li class="list-group-item mb-2 username">Username7<br>Points: #</li>
      <li class="list-group-item mb-2 username">Username8<br>Points: #</li>
      <li class="list-group-item mb-2 username">Username9<br>Points: #</li>
      <li class="list-group-item mb-2 username">Username10<br>Points: #</li>
    </ul>
</div>
</div>
<script src="/ITCS333-Project/public/js/leaderboard.js"></script>
<?php } else {
  $_SESSION['error'] = "You must enter a valid quiz id";
  header("Location: /ITCS333-Project/quiz/quizzesDisplay.php");
} 
?>


<?php require('../partials/footer.inc.php')?>