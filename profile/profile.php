<?php $title = "Profile"; require(__DIR__ .'/../partials/boilerplate.inc.php')?>
<?php require(__DIR__ .'/../controllers/profile.inc.php')?>
<div class="container d-flex justify-content-center align-items-center my-5">
    <div class="row">
        <div class="col-xl-12">
            <div class="bg-color border card border-color-form shadow">
                <div class="card-body">
                    <h5 class="card-title text-secondary">Edit Profile </h5>
                    <form class="validated-form" method="POST" novalidate>
                        <?php if(!$row['verified']){ ?>
                        <div class="row">
                            <div class="mb-3 col-6">
                                <a href="/ITCS333-Project/profile/profile.php?verification=sent">Click to verify your account</a>
                                <?php if(isset($_GET['verification']) && $_GET['verification'] == 'sent') echo 'Check you email';?>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="row">
                            <div class="mb-3 col-6">
                                <label class="form-label" for="email">Email</label>
                                <input class="form-control" placeholder="Email" type="email" name="email" id="email" value="<?php echo $row['email'] ?>" required autofocus>
                            </div>
                            <div class="mb-3 col-6">
                                <label class="form-label" for="username">Username</label>
                                <input class="form-control" placeholder="Username" type="text" name="username" id="username" value="<?php echo $row['username'] ?>" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-6">
                                <label class="form-label" for="firstname">First Name</label>
                                <input class="form-control" placeholder="First Name" type="text" name="firstname" id="firstname" value="<?php echo $row['firstname'] ?>" required>
                            </div>
                            <div class="mb-3 col-6">
                                <label class="form-label" for="lastname">Last Name</label>
                                <input class="form-control" placeholder="Last Name" type="text" name="lastname" id="lastname" value="<?php echo $row['lastname'] ?>" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-6">
                                <label class="form-label" for="birth">Birthdate</label>
                                <input class="form-control" type="date" name="birth" id="birth" value="<?php echo $row['birthdate'] ?>" required>
                            </div>
                            <div class="mb-3 col-6">
                                <label class="form-label" for="pnum">Phone Number</label>
                                <input class="form-control" type="number" placeholder="Phone Number" name="pnum" id="pnum" value="<?php echo $row['phonenumber'] ?>" required>
                            </div>
                        </div>
            
         
                        <button type="submit" class="btn btn-success btn-block" name="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require(__DIR__ .'/../partials/footer.inc.php')?>