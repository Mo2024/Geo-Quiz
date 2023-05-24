<?php $title = "Sign Up"; require('../partials/boilerplate.inc.php')?>
<?php require('../controllers/auth/signup.inc.php')?>
<style> 
.email-username-alert {
  color: red;
  font-size: 12px;
  position: absolute;
}

</style>
<div class="container d-flex justify-content-center align-items-center my-5">
    <div class="row">
        <div class="col-xl-12">
            <div class="bg-color border card border-color-form shadow">
                <div class="card-body">
                    <h5 class="card-title text-secondary">Sign Up</h5>
                    <form class="validated-form" method="POST" novalidate>
                        <div class="row">
                            <div class="mb-3 col-sm-6">
                                <label class="form-label" for="email">Email</label>
                                <input class="form-control" placeholder="Email" type="email" name="email" id="email" value="<?php if(isset($_GET['email'])) echo $_GET['email']?>" required>
                                <p id="emailTakenAlert" class="email-username-alert" style="display: none;">Email is already taken.</p>
                            </div>
                            <div class="mb-3 col-sm-6">
                                <label class="form-label" for="username">Username</label>
                                <input class="form-control" placeholder="Username" type="text" name="username" id="username" value="<?php if(isset($_GET['email'])) echo $_GET['username']?>" required>
                                <p id="usernameTakenAlert" class="email-username-alert" style="display: none;">Username is already taken.</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-sm-6">
                                <label class="form-label" for="password">Password</label>
                                <input class="form-control" placeholder="Password" type="password" name="password" id="password" required>
                            </div>
                            <div class="mb-3 col-sm-6">
                                <label class="form-label" for="password">Confirm Password</label>
                                <input class="form-control" placeholder="Password" type="password" name="password2" id="password2" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-sm-6">
                                <label class="form-label" for="fullName">Full Name</label>
                                <input class="form-control" placeholder="Full Name" type="text" name="fullname" id="fullname" value="<?php if(isset($_GET['email'])) echo $_GET['fullname']?>" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-sm-6">
                                <input class="form-check-input" name="rememberMe" type="checkbox" value="rememberMe" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Remember me?
                                </label>
                            </div>
                        </div>
                        <button type="submit" id="signupButton" class="btn btn-primary btn-block" name="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/ITCS333-Project/public/js/signup.js"></script>

<?php require('../partials/footer.inc.php')?>