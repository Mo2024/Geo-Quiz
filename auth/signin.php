<?php $title = "Sign In"; require('../partials/boilerplate.inc.php')?>
<?php require('../controllers/auth/signin.inc.php')?>

<div class="container d-flex justify-content-center align-items-center my-5">
    <div class="row">
        <div class="col-xl-12">
            <div class="bg-color border card border-color-form shadow">
                <div class="card-body">
                    <h5 class="card-title text-secondary">Sign In</h5>
                    <form class="validated-form" method="POST" novalidate>
                            <div class="mb-3">
                                <label class="form-label" for="uid">Username</label>
                                <input placeholder="Username" class="form-control" type="text" name="uid" id="uid" value="<?php if (isset($_GET["uid"])) echo $_GET["uid"] ?>" required autofocus>

                                <label class="form-label" for="password">Password</label>
                                <input placeholder="Password" class="form-control" type="password" name="password" id="password" required>
                            </div>
                            <div class="mb-3">
                                <input class="form-check-input" name="rememberMe" type="checkbox" value="rememberMe" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Remember me?
                                </label>
                            </div>
                        <button type="submit" class="btn btn-success btn-block" name="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require('../partials/footer.inc.php')?>