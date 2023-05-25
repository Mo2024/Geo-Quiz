<?php $title = "Homepage"; require('partials/boilerplate.inc.php')?>
<link rel="stylesheet" href="/ITCS333-Project/public/css/mainpage.css">

<main>
  <h1 style="font-weight:bold;">Let's put your Geography <br>skills to the test.</h1>
  <br>

  <a href="/ITCS333-Project/auth/signup.php" class="btn btn-primary btn-lg pt-3 pb-3 border-0" tabindex="-1" role="button" style="margin-left:40px;  font-family: 'Roboto', sans-serif; background-color:#3C486B;  font-size: 25px;">Get Started Today</a>
</main>
<section class="container-fluid px-0">

  <div class="row align-items-center content">
    <div class="col-md-6 order-2 order-md-1">
      <img src="public/333 Icons-Fonts-Colors/Screenshot 2023-05-06 at 4.20.19 PM.png" alt="" class="img-fluid">
    </div>
    <div class="col-md-6 text-center order-1 order-md-2">
      <div class="row justify-content-center">
        <div class="col-10 col-lg-8 blurb mb-5 mb-md-0">
          <h1>Explore the World, One <br> Quiz at a Time!</h1>
          <br>
          <p>Get ready to explore the world like never before with Geo Hub! Our quizzes are the ultimate way to test
            your
            knowledge
            of the globe, from the highest peaks to the deepest oceans.
            With new quizzes created regularly, you'll never run out of exciting challenges to tackle. So join the
            adventure
            and discover the world one question at a time with Geo Hub!</p>
        </div>
      </div>
    </div>
  </div>

</section>

<br><br>


<div class="pt-3 justify-content-center" style="background-color:#F0F0F0;">
<div class="text-center">
<h1 class="fw-bold">How does Geo Hub Works?</h1>
</div>
  <aside class="card-group justify-content-center d-flex py-5 flex-md-row flex-column">
    <div class="card text-dark bg-light me-md-5 col-md-6 mx-auto" style="max-width: 28rem;">
      <div class="card-header text-center h3" style="background-color:#F9D949;"> <a href="/ITCS333-Project/quiz/createQuiz.php" style="text-decoration:underline;color:#0000EE;">Create</a></div>
      <div class="card-body">
        <div class="d-flex flex-row">
          <div class="col-6">
            <p class="card-text h4 mt-5">It only takes few minutes
            to create a quiz on geography and publish it free on Geo Hub.
            </p>
          </div>
          <div class="col-6">
          <img width="100%" src="public/333 Icons-Fonts-Colors/Screenshot_2023-05-06_at_3.21.55_PM-removebg-preview.png" alt="">
          </div>

        </div>

      </div>
    </div>
    <div class="card text-dark bg-light ms-md-5 col-md-6 mx-auto" style="max-width: 28rem;">
      <div class="card-header text-center h3" style="background-color:#F9D949;"><a href="/ITCS333-Project/quiz/quizzesDisplay.php" style="text-decoration:underline;color:#0000EE;">Conduct</a></div>
      <div class="card-body">
        <div class="d-flex flex-row">
          <div class="col-6">
            <p class="card-text h4 mt-5">Geo Hub users could take any quiz found on Geo Hub for their own practice.
            </p>
          </div>
          <div class="col-6">
          <img width="100%" src="public/333 Icons-Fonts-Colors/Screenshot_2023-05-06_at_3.22.18_PM-removebg-preview.png" alt="">
          </div>
        </div>
      </div>
    </div>
  </aside>
</div>

<?php require('partials/footer.inc.php')?>