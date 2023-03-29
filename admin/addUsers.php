<?php $title = "Add Users"; require(__DIR__ .'/../partials/boilerplate.inc.php')?>
<?php require(__DIR__ .'/../controllers/addUsers.inc.php')?>

<section class="container d-flex justify-content-center align-items-center my-5">
    <div class="col-lg-6">

        <h1 class="text-dark">Add User</h1>
        <form method="POST" class="validated-form" novalidate enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label text-dark" for="name">Username</label>
                <input class="form-control" type="text" name="username" id="username" required>
            </div>
            <div class="mb-3">
                <label class="form-label text-dark" for="email">Email</label>
                <input class="form-control" type="text" name="email" id="email" required>
            </div>
            <div class="mb-3">
                <label class="form-label text-dark" for="firstname">First Name</label>
                <input class="form-control" type="text" name="firstname" id="firstname" required>
            </div>
            <div class="mb-3">
                <label class="form-label text-dark" for="lastname">Last Name</label>
                <input class="form-control" type="text" name="lastname" id="lastname" required>
            </div>
            <div class="mb-3">
                <label class="form-label text-dark" for="birthdate">Birthdate</label>
                <input class="form-control" type="date" name="birthdate" id="birthdate" required>
            </div>
            <div class="mb-3">
                <label class="form-label text-dark" for="phonenumber">Phone Number</label>
                <input class="form-control" type="tel" name="phonenumber" id="phonenumber" required>
            </div>

            <div class="mb-3">
                <label class="form-label text-dark">Add Users in bulk? (Optional)</label>
                <label for="image" class="form-label text-dark"></label>
                <input class="form-control mb-1" type="file" id="excel" multiple name="excel">
            </div>

            <div class="mb-3">
                <button class="btn btn-success">Add User</button>
            </div>
        </form>
    </div>
</section>

<?php require(__DIR__ .'/../partials/footer.inc.php')?>