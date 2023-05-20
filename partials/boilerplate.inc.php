<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- bootstrap 5.0.2 -->
  <link rel="stylesheet" href="/ITCS333-Project/public/css/bootstrap.min.css">
  <script src="/ITCS333-Project/public/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="/ITCS333-Project/public/css/main.css">
  
  <script src="/ITCS333-Project/public/js/main.js"></script>
  <title><?php echo $title;?></title>
</head>

<body class="min-vh-100 d-flex flex-column">
  <?php 
    session_start();
    require_once(realpath(__DIR__.'/../vendor/autoload.php'));
    use Dotenv\Dotenv;
    $dotenv = Dotenv::createImmutable(__DIR__.'/../');
    $dotenv->load();

    require(__DIR__ ."/../functions/connection.inc.php");
    $brandName = $_ENV['brandName'];
    //Extends cookie's duration if the user is constantly using it
    if(isset($_COOKIE['session'])){
      if(isset($_SESSION["username"])){
        setcookie("session", password_hash($_SESSION["username"], PASSWORD_DEFAULT),time() + 604800 ,'/');
      }else{
        setcookie("session", "", time() - 604800 ,'/');
      }
    }else{
      if(isset($_SESSION["username"])){
        session_destroy();
        session_start();
      }
    }
  ?>
  <?php require(__DIR__.'/../partials/navbar.inc.php')?>