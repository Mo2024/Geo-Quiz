<?php $title = "Add Users"; require('../partials/boilerplate.inc.php')?>
<?php require(__DIR__ .'/../controllers/admin/addUsers.inc.php')?>

<section class="container d-flex justify-content-center align-items-center my-5">
    <div class="col-lg-6">

        <h1 class="text-dark">Add User</h1>
        <form method="POST" class="validated-form" novalidate enctype="multipart/form-data">
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
                <label class="form-label text-dark" for="type">Type</label>
                <select name="types" class="form-select" aria-label="Default select example" required>
                    <option selected hidden>Category</option>
                    <option value="admin">Admin</option>
                    <option value="manager">Manager</option>
                    <option value="user">User</option>
                </select>
            </div>
            
            <div class="mb-3">
                <label class="form-label text-dark">Add Users in bulk? (Optional)</label>
                <label for="image" class="form-label text-dark"></label>
                <input class="form-control mb-1" type="file" id="excel" multiple name="excel">
            </div>
            <div class="mb-3">
                <button name="submit" class="btn btn-success">Add User</button>
            </div>
        </form>
    </div>
</section>

<?php require('../partials/footer.inc.php')?>