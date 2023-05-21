<?php $title = "Profile"; require('../partials/boilerplate.inc.php')?>
<?php require('../controllers/profile/profile.inc.php')?>
<div class="container w-50 my-3">
      <ul class="nav nav-underline">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">My Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="updatePassword.php">Change Password</a>
        </li>
      </ul>

      <div class="container bg-color border card border-color-form shadow p-3 justify-content-center">
        <form class="validated-form" method="POST" novalidate>
            <div class="row">
                <div class="mb-3 col-sm-6">
                    <label class="form-label" for="fullname">Full Name</label>
                    <input class="form-control" placeholder="Full Name" type="text" name="fullname" id="fullname" value="<?php if($redirect) echo $fullname?>" >
                </div>
                <div class="mb-3 col-sm-6">
                    <label class="form-label" for="InputFullName">Username</label>
                    <input class="form-control" placeholder="Username" type="text" name="username" id="username" value="<?php if($redirect) echo $username?>" required>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-sm-6">
                    <label class="form-label" for="email">Email</label>
                    <input class="form-control" placeholder="Email" type="email" name="email" id="email" value="<?php if($redirect) echo $email?>" required>
                </div>
                <?php if(!$row['verified']) { ?>
                  <div class="mb-3 col-sm-6">
                    <label class="form-label" for="vcode">Verification Code</label>
                    <input class="form-control" placeholder="Verification Code" type="text" name="vcode" id="vcode" required>
                    <a href="/ITCS333-Project/functions/sendVCode.inc.php">Resend Verification?</a>
                  </div>
                <?php } ?>
                
            </div>
            <a href="/ITCS333-Project/mainpage.php" class="btn btn-secondary mb-2">Cancel</a>
            <button name="submit" type="submit" class="btn btn-primary mb-2">Save Changes</button>
        </form>
      </div>
</div>
<?php require('../partials/footer.inc.php')?>