<?php
$servername = "mysql:host=localhost;dbname=itcs333group3;charset=utf8";
$username = "root";
$password = "";
$db = new PDO($servername, $username, $password );
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 ?>