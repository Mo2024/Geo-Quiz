<?php $title = "Delete Users"; require('../partials/boilerplate.inc.php')?>
<?php //require('../controllers/admin/deleteCategory.inc.php')?>

<section class="container d-flex justify-content-center align-items-center my-5">
    <div class="col-lg-6">

        <h1 class="text-dark">Delete Category</h1>
        <form method="POST" class="validated-form" novalidate enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label text-dark" for="name">Category Name</label>
                <input class="form-control" type="text" name="name" id="name" required>
            </div>

            <div class="mb-3">
                <label class="form-label text-dark">Delete Categories in bulk? (Optional)</label>
                <label for="image" class="form-label text-dark"></label>
                <input class="form-control mb-1" type="file" id="excel" multiple name="excel">
            </div>

            <div class="mb-3">
                <button class="btn btn-success">Delete Category</button>
            </div>
        </form>
    </div>
</section>

<?php require('../partials/footer.inc.php')?>