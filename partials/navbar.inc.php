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
              <a href="/ITCS333-Project/signup.php" class="nav-link">sign up</a>
              <a href="/ITCS333-Project/signin.php" class="nav-link">sign in</a>
              ';
            }else{
              echo '
              <a href="/ITCS333-Project/controllers/signout.inc.php" class="nav-link">Sign out</a>
              <a href="/ITCS333-Project/profile.php" class="nav-link">Profile</a>
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