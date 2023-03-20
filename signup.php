<?php $title = "Sign Up"; require('partials/boilerplate.php')?>
<!-- <div class="container d-flex justify-content-center align-items-center">
    <div class="row">
        <div class="col-md-12 offset-md-3 col-xl-4 offset-xl-4">
            <div class="card">
                style="width: 18rem;">
                <div class="card-body">
                    <form action="/register" class="validated-form" method="POST" novalidate>
                        <div class="row">
                            <div class="mb-3 col-6">
                                <label class="form-label" for="email">Email</label>
                                <input class="form-control" type="email" name="email" id="email" required autofocus>
                            </div>
                            <div class="mb-3 col-6">
                                <label class="form-label" for="username">Username</label>
                                <input class="form-control" type="text" name="username" id="username" required>
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
            
                        <div class="mb-3">
                            <label class="form-label" for="password">Password</label>
                            <input class="form-control" type="password" name="password" id="password" required>
                        </div>
                        <button class="btn btn-success btn-block">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->

<div class="container d-flex justify-content-center align-items-center mt-5">
    <div class="row">
        <div class="col-xl-12 ">
            <div class="bg-color border card border-color-form shadow">
                <!-- <img src="https://mir-s3-cdn-cf.behance.net/project_modules/fs/a4f01c82667439.5d24aafde4b5e.jpg" alt=""
                    class="card-img-top" /> -->
                <div class="card-body">
                    <h5 class="card-title text-secondary">Sign Up</h5>
                    <form action="/register" class="validated-form" method="POST" novalidate>
                        <div class="row">
                            <div class="mb-3 col-6">
                                <label class="form-label" for="email">Email</label>
                                <input class="form-control" type="email" name="email" id="email" required autofocus>
                            </div>
                            <div class="mb-3 col-6">
                                <label class="form-label" for="username">Username</label>
                                <input class="form-control" type="text" name="username" id="username" required>
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
            
                        <div class="mb-3">
                            <label class="form-label" for="password">Password</label>
                            <input class="form-control" type="password" name="password" id="password" required>
                        </div>
                        <button class="btn btn-success btn-block">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require('partials/footer.php')?>