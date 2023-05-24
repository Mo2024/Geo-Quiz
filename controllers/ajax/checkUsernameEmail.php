<?php
session_start();
require_once('../../vendor/autoload.php');
use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__.'/../../');
$dotenv->load();
require('../../functions/connection.inc.php');
require('../../functions/functions.inc.php');
require("../../partials/regex.inc.php");

$username = $_POST['username'];
$email = $_POST['email'];

try {

    $isRegistered = false; 
    $registeredField = ""; 

    $usernameQuery = "SELECT * FROM users WHERE username = :username";
    $usernameStatement = $db->prepare($usernameQuery);
    $usernameStatement->bindParam(':username', $username);
    $usernameStatement->execute();

    if ($usernameStatement->rowCount() > 0) {
        $isRegistered = true;
        $registeredField = "username";
    }

    $emailQuery = "SELECT * FROM users WHERE email = :email";
    $emailStatement = $db->prepare($emailQuery);
    $emailStatement->bindParam(':email', $email);
    $emailStatement->execute();

    if ($emailStatement->rowCount() > 0) {
        $isRegistered = true;
        $registeredField = "email";
    }

    $response = array("isRegistered" => $isRegistered, "message" => "$registeredField is already registered!");
    echo json_encode($response);
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>
