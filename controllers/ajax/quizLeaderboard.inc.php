<?php
session_start();
require_once('../../vendor/autoload.php');
use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__.'/../../');
$dotenv->load();
require('../../functions/connection.inc.php');
require('../../functions/functions.inc.php');
require("../../partials/regex.inc.php");

try {

    $query = "
        SELECT leaderboard.*
        FROM (
          SELECT results.*, users.username, ROW_NUMBER() OVER (PARTITION BY results.userId ORDER BY results.score DESC, results.timeElapsed ASC) AS row_num
          FROM results
          INNER JOIN users ON results.userId = users.uid
          WHERE results.quizId = 50
        ) leaderboard
        WHERE leaderboard.row_num = 1
        ORDER BY leaderboard.score DESC, leaderboard.timeElapsed ASC, leaderboard.username ASC;
    ";
    $stmt = $db->query($query);
    $leaderboardData = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $response = array('leaderboard' => $leaderboardData);
    $jsonResponse = json_encode($response);
    header('Content-Type: application/json');

    echo $jsonResponse;
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
