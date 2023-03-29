<?php $title = "Update Password"; require('../partials/boilerplate.inc.php')?>
<?php require('../controllers/profile/updatepassword.inc.php')?>
<div class="container d-flex justify-content-center align-items-center my-5">
    <div class="row">
        <div class="col-xl-12">
            <div class="bg-color border card border-color-form shadow">
                <div class="card-body">
                    <h5 class="card-title text-secondary">Update password</h5>
                    <form class="validated-form" method="POST" novalidate>
                            <div class="mb-3">
                                <?php 
                                    if(isset($_GET['status']) &&($_GET['status'] == 'forget'|| $_GET['status'] == 'resend')){
                                        echo '
                                        <label class="form-label" for="VerificationCode">Verification Code</label>
                                        <input placeholder="Verification Code" class="form-control" type="text" name="VerificationCode" id="VerificationCode"  required autofocus>
                                        <a href="/ITCS333-Project/profile/updatepassword.php?status=resend">Resend code?</a>
                                        ';
                                    }else{
                                        echo '
                                        <label class="form-label" for="currentPwd">Current Password</label>
                                        <input placeholder="Current Password" class="form-control" type="password" name="currentPwd" id="currentPwd"  required autofocus>
                                        <a href="/ITCS333-Project/profile/updatepassword.php?status=forget">Forget Password?</a>
                                        ';
                                    }
                                ?>

                                <br>
                                <label class="form-label" for="newPwd">New Password</label>
                                <input placeholder="New Password" class="form-control" type="password" name="newPwd" id="newPwd" required>

                                <label class="form-label" for="confirmNewPwd">Confirm New Password</label>
                                <input placeholder="Confirm New Password" class="form-control" type="password" name="confirmNewPwd" id="confirmNewPwd" required>
                            </div>
                        <button type="submit" class="btn btn-success btn-block" name="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require('../partials/footer.inc.php')?>