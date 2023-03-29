<?php $title = "Sign Up"; require('../partials/boilerplate.inc.php')?>
<?php require('../controllers/auth/signup.inc.php')?>

<div class="container d-flex justify-content-center align-items-center my-5">
    <div class="row">
        <div class="col-xl-12">
            <div class="bg-color border card border-color-form shadow">
                <div class="card-body">
                    <h5 class="card-title text-secondary">Sign Up</h5>
                    <form class="validated-form" method="POST" novalidate>
                        <div class="row">
                            <div class="mb-3 col-6">
                                <label class="form-label" for="email">Email</label>
                                <input class="form-control" placeholder="Email" type="email" name="email" id="email" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $email ?>" required autofocus>
                            </div>
                            <div class="mb-3 col-6">
                                <label class="form-label" for="username">Username</label>
                                <input class="form-control" placeholder="Username" type="text" name="username" id="username" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $username ?>" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-6">
                                <label class="form-label" for="firstname">First Name</label>
                                <input class="form-control" placeholder="First Name" type="text" name="firstname" id="firstname" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $firstname ?>" required>
                            </div>
                            <div class="mb-3 col-6">
                                <label class="form-label" for="lastname">Last Name</label>
                                <input class="form-control" placeholder="Last Name" type="text" name="lastname" id="lastname" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $lastname ?>" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-6">
                                <label class="form-label" for="password">Password</label>
                                <input class="form-control" placeholder="Password" type="password" name="password" id="password" required>
                            </div>
                            <div class="mb-3 col-6">
                                <label class="form-label" for="password">Confirm Password</label>
                                <input class="form-control" placeholder="Password" type="password" name="password2" id="password2" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-6">
                                <label class="form-label" for="birth">Birthdate</label>
                                <input class="form-control" type="date" name="birth" id="birth" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $birth ?>" required>
                            </div>
                            <div class="mb-3 col-6">
                                <label class="form-label" for="pnum">Phone Number</label>
                                <input class="form-control" type="number" placeholder="Phone Number" name="pnum" id="pnum" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $pnumber ?>" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-6">
                                <input class="form-check-input" name="rememberMe" type="checkbox" value="rememberMe" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Remember me?
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success btn-block" name="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require('../partials/footer.inc.php')?>