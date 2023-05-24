<header>

      <nav class="navbar navbar-expand-lg navbar-light" style="background-color:#F9D949;">
      <div class="container-fluid">
        <a class="navbar-brand" href="/ITCS333-Project/mainpage.php"><img style="margin-top:-11px;"width="170px" src="/ITCS333-Project/public/333 Icons-Fonts-Colors/Screenshot_2023-05-06_at_3.23.41_PM-removebg-preview.png" alt="Logo for website">
    </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active h3 px-lg-5" aria-current="page" href="/ITCS333-Project/mainpage.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link h3 px-lg-5" href="/ITCS333-Project/quiz/createQuiz.php">Create Quiz</a>
            </li>
            <li class="nav-item">
              <a class="nav-link h3 px-lg-5" href="/ITCS333-Project/quiz/quizzesDisplay.php">Quizzes</a>
            </li>


          </ul>
          <div class="navbar-nav ms-auto d-flex">
    <?php
      if(!isset($_SESSION['userId']) && !isset($_SESSION['username'])){
        echo'
        <a href="/ITCS333-Project/auth/signup.php" class="nav-link h3">Sign Up</a>
        <a href="/ITCS333-Project/auth/signin.php" class="nav-link h3">Log In</a>
        ';
      }else{
        echo '
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle h3" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            Profile
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown" >
            <li><a class="dropdown-item" href="/ITCS333-Project/profile/profile.php">Manage profile</a></li>
            <li><a class="dropdown-item" href="/ITCS333-Project/profile/myHistory.php">My History</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="/ITCS333-Project/profile/myQuizzes.php">My Quizzes</a></li>
          </ul>
        </li>
      <a href="/ITCS333-Project/controllers/auth/logout.inc.php" class="nav-link h3">Sign out</a>
        ';
      }
    ?>
    </div>
        </div>
      </div>
    </nav>
    </header>
    