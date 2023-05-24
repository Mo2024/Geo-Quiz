<?php
// searchQuizzes.php

// Check if a search query is provided
if (isset($_GET['searchQuery'])) {
  $searchQuery = $_GET['searchQuery'];

  // Perform the necessary database query based on the search query
  // Modify the query as per your database structure and table names
  $query = "SELECT * FROM quizzes WHERE title LIKE '%$searchQuery%'";

  // Execute the query and fetch the results
  // Replace the database connection and query execution code as per your requirements
  $conn = new PDO("mysql:host=localhost;dbname=your_database_name", "your_username", "your_password");
  $stmt = $conn->prepare($query);
  $stmt->execute();
  $quizzes = $stmt->fetchAll(PDO::FETCH_ASSOC);

  // Return the results as a JSON response
  $response = [
    'quizzes' => $quizzes
  ];
  header('Content-Type: application/json');
  echo json_encode($response);
  exit();
}
