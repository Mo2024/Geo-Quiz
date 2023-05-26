<?php $title = "Sign In"; require('../partials/boilerplate.inc.php')?>
<?php require('../controllers/auth/signin.inc.php')?>

<div class="mb-3 container d-flex justify-content-center align-items-center mt-5">
<div class="row">
    <div class="col-xl-12">
        <div class="bg-color border card border-color-form shadow p-3">
            <div class="card-body ">
                <h5 class="card-title text-center" style="font-size:35px;font-weight:bold;color:black;">Login</h5>
                <form class="validated-form" method="POST" novalidate>
                        <div class="mb-3">
                            <label class="form-label" for="uid">Username</label>
                            <input placeholder="Username" class="form-control" type="text" name="uid" id="uid" value="<?php if (isset($_GET["uid"])) echo $_GET["uid"] ?>" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="password">Password</label>
                            <input class="form-control" placeholder="Password" type="password" name="password" autocomplete="current-password" required="" id="pass"  required>
                            <input class="form-check-input"type="checkbox" onclick="showPassword()">
                            <label class="form-check-label" for="">
                                Show Password
                            </label>
                        </div>


                        <div class="m-3">
                            <input class="form-check-input" name="rememberMe" type="checkbox" value="rememberMe" id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                                Remember me?
                            </label>
                            <a href="/ITCS333-Project/auth/forgetPassword.php">Forget Password?</a>

                        </div>
                    <button type="submit" class="btn btn-lg btn-primary btn-block" name="submit">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<script>
    function showPassword() {
      var x = document.getElementById("pass");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
</script>


<?php require('../partials/footer.inc.php')?>