<?php $title = "Homepage"; require('partials/boilerplate.inc.php')?>

<?php 
    $keysAsValues = array_flip($_GET);
    if(isset($keysAsValues['success']) && (isset($_GET['Signup'])||isset($_GET['Signout'])||isset($_GET['Signin'])||isset($_GET['Verification']))){
        echo '
            <div class="container mt-5">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    '.$keysAsValues['success'].' Successful!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
            ';
    }
    $id = $_SESSION['userId'];
    $idQuery = "SELECT * FROM user WHERE id = '$id'";
    $result = $db->query($idQuery);
    $row = $result->fetch();
    if (is_null($row['verificationCode'])) {echo 'hehe';}
?>

<?php require('partials/footer.inc.php')?>