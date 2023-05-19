<?php $title = "Sign Up"; require('../partials/boilerplate.inc.php')?>
<?php require('../controllers/auth/signup.inc.php')?>

<div class="container d-flex justify-content-center align-items-center my-5">
    <div class="row">
        <div class="col-xl-12">
            <div class="bg-color border card border-color-form shadow">
                <div class="card-body">
                    <h5 class="card-title text-secondary">Create Quiz</h5>
                    <form class="validated-form" method="POST" novalidate>
                        <div class="row">
                            <div class="mb-3 col-sm-6">
                                <label class="form-label" for="title">Title</label>
                                <input class="form-control" placeholder="Title" type="title" name="title" id="title" value="<?php if (isset($_POST["submit"] )) echo $title ?>" required autofocus>
                            </div>
                            <div class="mb-3 col-sm-6">
                                <label class="form-label" for="timer">Timer</label>
                                <select name="timer" class="form-select" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    <option value="300">5 Minutes</option>
                                    <option value="600">10 Minutes</option>
                                    <option value="1200">20 Minutes</option>
                                    <option value="1800">30 Minutes</option>
                                    <option value="2400">40 Minutes</option>
                                    <option value="3000">50 Minutes</option>
                                    <option value="3600">60 Minutes</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-sm-6">
                                <label class="form-label" for="noOfQuestions">Number of Questions</label>
                                <input class="form-control" placeholder="Number of Questions" type="number" name="noOfQuestions" id="noOfQuestions" required>
                            </div>
                            <div class="mb-3 col-sm-6">
                                <label class="form-label" for="password">Confirm Password</label>
                                <input class="form-control" placeholder="Password" type="password" name="password2" id="password2" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-sm-6">
                                <label class="form-label" for="fullName">Full Name</label>
                                <input class="form-control" placeholder="Full Name" type="text" name="fullname" id="fullname" value="<?php if (isset($_POST["submit"] )) echo $fullname ?>" required>
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
                        <button type="submit" class="btn btn-primary btn-block" name="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require('../partials/footer.inc.php')?>