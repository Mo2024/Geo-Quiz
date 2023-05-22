<?php require('controllers/main/contactUs.inc.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    html,
    body {
      height: 100%;
      margin: 0;
      padding: 0;
    }

    .container {
      min-height: 80%;
      display: flex;
      flex-direction: column;
    }

    .content {
      flex: 1;
    }

    footer {
      background-color: #3C486B;
      color: white;
      text-align: center;
      padding: 20px;
    }
  </style>
</head>
<body>
<header class="container-fluid" style="background-color: #3C486B; color:white">
	<h1>Contact Us Form</h1>
    <p>We’d love to help you get the most out of Geo Hub! Submit the form below,
and a member of our team will get in touch with you.</p>
</header>
<div class="container">
<br>
  <form class="form-horizontal" method='post'>
  	<h1 class="text-center">Contact Us Form</h1>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email" style="font-size:20px;margin-top:-10px;">Email</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" name="email" id="email" placeholder="Email">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="subject" style="font-size:20px;margin-top:-10px;">Subject</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="subject" id="subject" placeholder="subject">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd" style="font-size:20px;margin-top:-10px;">Message</label>
      <div class="col-sm-10">
        <textarea style="resize: none;" rows="10" class="form-control" id="msg" name="message" placeholder="Message"></textarea>
      </div>
    </div>

    <div class="form-group text-center">

    <button type="submit" class="btn btn-lg btn-primary" name="submit" style="padding-left:20px;padding-right:20px;">Submit</button>


    </div>
  </form>

    </div>


<footer class="container-fluid mt-0 " style="background-color: #3C486B;">
  <div class="text-center" style="color:white;font-size:20px;padding-top:20px;">
  <p>Please read our
    <a href="terms.php" style="color:lightblue;font-size:20px;">  Terms and Conditions</a></p><br>
  </div>
</footer>

</body>
</html>
