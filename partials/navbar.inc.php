<nav class="navbar navbar-expand-lg navbar-light color">
    <div class="container-fluid">
      <a class="navbar-brand" href="/ITCS333-Project/mainpage.php">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <?php
          if(isset($_SESSION['userId']) && $_SESSION['userType'] == 'admin'){
            echo '
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  Admin
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="/ITCS333-Project/admin/addCategory.php">Add Category</a></li>
                  <li><a class="dropdown-item" href="/ITCS333-Project/admin/addUsers.php">Add Users</a></li>
                  <li><a class="dropdown-item" href="/ITCS333-Project/admin/deleteCategory.php">Delete Category</a></li>
                  <li><a class="dropdown-item" href="/ITCS333-Project/admin/deleteUsers.php">Delete Users</a></li>
                </ul>
              </li>
            ';
          }
          if(isset($_SESSION['userId']) && ($_SESSION['userType'] == 'admin'|| $_SESSION['userType'] == 'manager')){
            echo '
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  Manager
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="/ITCS333-Project/manager/addQuestions.php">Add Questions</a></li>
                  <li><a class="dropdown-item" href="/ITCS333-Project/manager/addQuiz.php">Add Quiz</a></li>
                  <li><a class="dropdown-item" href="/ITCS333-Project/manager/deleteQuestions.php">Delete Questions</a></li>
                  <li><a class="dropdown-item" href="/ITCS333-Project/manager/deleteQuiz.php">Delete Quiz</a></li>
                  <li><a class="dropdown-item" href="/ITCS333-Project/manager/editQuestions.php">Edit Questions</a></li>
                </ul>
              </li>
            ';
          }
          
          ?>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              Dropdown
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
        </ul>

        <div class="navbar-nav ms-auto">
          <?php 
            if(!isset($_SESSION['userId']) && !isset($_SESSION['username'])){
              echo '
              <a href="/ITCS333-Project/auth/signup.php" class="nav-link">sign up</a>
              <a href="/ITCS333-Project/auth/signin.php" class="nav-link">sign in</a>
              ';
            }else{
              echo '
              <a href="/ITCS333-Project/controllers/auth/signout.inc.php" class="nav-link">Sign out</a>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  Profile
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="/ITCS333-Project/profile/profile.php">Edit profile</a></li>
                  <li><a class="dropdown-item" href="/ITCS333-Project/profile/updatepassword.php">Update password</a></li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li>
              ';          
            }
          ?>
        </div>

        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>