<?php $title = "Delete Users"; require(__DIR__ .'/../partials/boilerplate.inc.php')?>
<?php //require(__DIR__ .'/../controllers/deleteUsers.inc.php')?>

<section class="container d-flex justify-content-center align-items-center my-5">
    <div class="col-lg-6">

        <h1 class="text-dark">Delete User</h1>
        <form method="POST" class="validated-form" novalidate enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label text-dark" for="uid">Username/Email</label>
                <input class="form-control" type="text" name="uid" id="uid" required>
            </div>

            <div class="mb-3">
                <label class="form-label text-dark">Delete Users in bulk? (Optional)</label>
                <label for="image" class="form-label text-dark"></label>
                <input class="form-control mb-1" type="file" id="excel" multiple name="excel">
            </div>

            <div class="mb-3">
                <button class="btn btn-success">Delete User</button>
            </div>
        </form>
    </div>
</section>

<?php require(__DIR__ .'/../partials/footer.inc.php')?>