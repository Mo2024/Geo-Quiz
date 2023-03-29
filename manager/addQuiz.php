<?php $title = "Add Quizzes"; require('../partials/boilerplate.inc.php')?>
<?php //require('../controllers/manager/addQuiz.inc.php')?>

<section class="container d-flex justify-content-center align-items-center my-5">


    <div class="col-lg-6">

        <h1 class="text-dark">New Quiz</h1>
        <form method="POST" class="validated-form" novalidate enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label text-dark" for="title">Title</label>
                <input class="form-control" type="text" name="title" id="title" required>
            </div>

            <div class="mb-3">
                <label class="form-label text-dark" for="category">Category</label>
                <select name="category[id]" class="form-select" aria-label="Default select example">
                    <option selected hidden>Category</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label text-dark description-box" for="description">Description</label>
                <textarea class="form-control" type="text" name="description" id="description"
                    required></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label text-dark">Quiz Images</label>
                <label for="image" class="form-label text-dark"></label>
                <input class="form-control mb-1" type="file" id="image" multiple name="image">
            </div>

            <div class="mb-3">
                <label class="form-label text-dark">Create quizzes in bulk? (Optional)</label>
                <label for="image" class="form-label text-dark"></label>
                <input class="form-control mb-1" type="file" id="excel" multiple name="excel">
            </div>

            <div class="mb-3">
                <button class="btn btn-success">Add Quiz</button>
            </div>
        </form>
    </div>
</section>

<?php require('../partials/footer.inc.php')?>