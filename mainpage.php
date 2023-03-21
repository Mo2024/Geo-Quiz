<?php $title = "Homepage"; require('partials/boilerplate.php')?>

<?php 
    if(isset($_GET['signup']) && $_GET['signup'] == "success"){
        echo '
            <div class="container mt-5">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Sign Up Successful!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
            ';
    }
?>

<!-- <?php require('partials/footer.php')?> -->