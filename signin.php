<?php $title = "Sign In"; require('partials/boilerplate.inc.php')?>
<?php require('controllers/signin.inc.php')?>

<div class="container d-flex justify-content-center align-items-center my-5">
    <div class="row">
        <div class="col-xl-12">
            <div class="bg-color border card border-color-form shadow">
                <div class="card-body">
                    <h5 class="card-title text-secondary">Sign In</h5>
                    <form class="validated-form" method="POST" novalidate>
                            <div class="mb-3">
                                <label class="form-label" for="uid">Email or Username</label>
                                <input placeholder="Email or Username" class="form-control" type="text" name="uid" id="uid" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $uid ?>" required autofocus>

                                <label class="form-label" for="password">Password</label>
                                <input class="form-control" type="password" name="password" id="password" required>
                            </div>
                        <button type="submit" class="btn btn-success btn-block">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require('partials/footer.inc.php')?>