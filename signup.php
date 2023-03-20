<?php $title = "Sign Up"; require('partials/boilerplate.php')?>
<?php require('controllers/signup.php')?>

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
                                <input class="form-control" type="email" name="email" id="email" required autofocus>
                            </div>
                            <div class="mb-3 col-6">
                                <label class="form-label" for="username">Username</label>
                                <input class="form-control" type="username" name="username" id="username" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-6">
                                <label class="form-label" for="firstname">First Name</label>
                                <input class="form-control" type="firstname" name="firstname" id="firstname" required>
                            </div>
                            <div class="mb-3 col-6">
                                <label class="form-label" for="lastname">Last Name</label>
                                <input class="form-control" type="lastname" name="lastname" id="lastname" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-6">
                                <label class="form-label" for="password">Password</label>
                                <input class="form-control" type="password" name="password" id="password" required>
                            </div>
                            <div class="mb-3 col-6">
                                <label class="form-label" for="pnum">Phone Number</label>
                                <input class="form-control" type="pnum" name="pnum" id="pnum" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-6">
                                <label class="form-label" for="birth">Birthdate</label>
                                <input class="form-control" type="date" name="birth" id="birth" required>
                            </div>
                        </div>
            
         
                        <button type="submit" class="btn btn-success btn-block">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require('partials/footer.php')?>