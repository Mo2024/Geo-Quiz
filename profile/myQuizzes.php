<?php $title = "My Quizzes"; require('../partials/boilerplate.inc.php')?>
<?php require('../controllers/profile/myQuizzes.inc.php')?>
<style>
thead
{
    background-color: #3C486B;
    color: white;
}
</style>
<div class="mt-4 container">
  <div class="table-responsive">
    <table class="table table-bordered border border-dark text-center">

      <thead>
        <tr >
          <th  scope="col" colspan="3">Quizzes Created By: <?php echo $_SESSION['username']; ?> </th>
        </tr>
      </thead>

      <tbody>

        <tr>
          <th>Quiz Title</th>
          <th>Date Created</th>
          <th>Quiz Edit</th>
        </tr>
        
        <?php foreach ($rows as $row) { ?>
          <tr>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['dateCreated'];?></td>
            <td><a type="button" href="/ITCS333-Project/profile/editQuiz.php?quizId=<?php echo $row['quizid'] ?>" class="btn btn-sm btn-outline-secondary">Edit Quiz</a></td>
          </tr>
        <?php } ?>

      </tbody>

      </table>
    </div>
<div class="d-flex">
<button type="button" class="btn btn-sm btn-outline-primary ms-auto">
<a href="/ITCS333-Project/mainpage.php">Return To Home Page</a></button>
</div>
</div>

<?php require('../partials/footer.inc.php')?>
