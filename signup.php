<?php $title = "Sign Up"; require('partials/boilerplate.php')?>
<div class="d-flex justify-content-center align-items-center">
    <div class="container col-xs-11 ">
        <div class="card">
        <!-- style="width: 18rem;"> -->
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


<?php require('partials/footer.php')?>