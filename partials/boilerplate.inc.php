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

  <title><?php echo $title;?></title>
</head>

<body class="min-vh-100 d-flex flex-column">
  <?php 
    require_once(realpath(__DIR__ . '/../vendor/autoload.php'));
    use Dotenv\Dotenv;
    $dotenv = Dotenv::createImmutable(__DIR__.'/../');
    $dotenv->load();

    session_start();
    require(__DIR__ ."/../functions/connection.inc.php");
  ?>
  <?php require(__DIR__ .'/../partials/navbar.inc.php')?>