<?php $title = "Create Category"; require(__DIR__ .'/../partials/boilerplate.inc.php')?>
<?php require(__DIR__ .'/../controllers/addCategory.inc.php')?>

<section class="container d-flex justify-content-center align-items-center my-5">
    <div class="col-lg-6">
        <h1 class="text-dark">Add Category</h1>
        <form method="POST" class="validated-form" novalidate enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label text-dark" for="title">Title</label>
                <input class="form-control" type="text" name="title" id="title" required>
            </div>

            <div class="mb-3">
                <label class="form-label text-dark">Add Categories in bulk? (Optional)</label>
                <label for="image" class="form-label text-dark"></label>
                <input class="form-control mb-1" type="file" id="excel" multiple name="excel">
            </div>

            <div class="mb-3">
                <button class="btn btn-success">Add Category</button>
            </div>
        </form>
    </div>
</section>

<?php require(__DIR__ .'/../partials/footer.inc.php')?>