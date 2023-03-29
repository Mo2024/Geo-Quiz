<?php $title = "Delete Quiestions"; require('../partials/boilerplate.inc.php')?>
<?php //require('../controllers/manager/deleteQuestions.inc.php')?>

<section class="container d-flex justify-content-center align-items-center my-5">


    <div class="col-lg-6">

        <h1 class="text-dark">Delete Questions</h1>
        <form method="POST" class="validated-form" novalidate enctype="multipart/form-data">

            <div class="mb-3">
                <label class="form-label text-dark" for="category">Category</label>
                <select name="category[id]" class="form-select" aria-label="Default select example">
                    <option selected hidden>Category</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label text-dark" for="title">Title</label>
                <select name="title[id]" class="form-select" aria-label="Default select example">
                    <option selected hidden>Title</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label text-dark">Delete Questions in Bulk? (Optional)</label>
                <label for="image" class="form-label text-dark"></label>
                <input class="form-control mb-1" type="file" id="excel" multiple name="excel">
            </div>

            <div class="mb-3">
                <button class="btn btn-success">Delete Questions</button>
            </div>
        </form>
    </div>
</section>

<?php require('../partials/footer.inc.php')?>