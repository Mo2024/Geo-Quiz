<?php $title = "My History"; require('../partials/boilerplate.inc.php')?>
<?php require('../controllers/profile/myHistory.inc.php')?>
<style>
thead
{
  background-color: #3C486B;
  color: white;
}
</style>
<div class="mt-5 container">
    <div class="table-responsive">
        <table class="table table-bordered border border-dark text-center">
            <thead>
                <tr>
                    <th  scope="col" colspan="6">Quizzes History</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Quiz Title</th>
                    <th>Date Conducted</th>
                    <th>Total Time</th>
                    <th>Time Elapsed</th>
                    <th>Rank</th>
                    <th>Score</th>
                    
                </tr>

                <?php foreach ($rows as $row) { 
                    $totalScoreQuery = "SELECT SUM(score) AS total_score FROM  questions WHERE quizId = :quizId";
                    $statement = $db->prepare($totalScoreQuery);
                    $statement->bindValue(':quizId', $row['quizId']);
                    $statement->execute();
                    $totalScoreRow = $statement->fetch(PDO::FETCH_ASSOC);
                    $totalScore = $totalScoreRow['total_score'];
                ?>

                    <tr>
                        <td><?php echo $row['title'] ?></td>
                        <td><?php echo $row['dateConducted'] ?></td>
                        <td><?php echo $row['totalTime'] ?></td>
                        <td><?php echo formatSecondsToMinutes($row['timeElapsed']) ?></td>
                        <td>3rd Place</td>
                        <td><?php echo $row['score'].'/'.$totalScore ?></td>
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