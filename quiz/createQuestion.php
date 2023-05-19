<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<div class="container d-flex justify-content-center align-items-center my-5">
    <div class="row">
        <div class="col-xl-12">
            <div class="bg-color border card border-color-form shadow">
                <div class="card-body">
                    <h5 class="card-title text-secondary">Create Quiz</h5>
                    <form class="validated-form" method="POST" novalidate>
                        <div class="row">
                            <div class="mb-3 col-sm-6">
                                <label class="form-label" for="title">Title</label>
                                <input class="form-control" placeholder="Title" type="title" name="title" id="title" value="<?php if (isset($_POST["submit"] )) echo $title ?>" required autofocus>
                            </div>
                            <div class="mb-3 col-sm-6">
                                <label class="form-label" for="timer">Timer</label>
                                <select name="timer" class="form-select" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    <option value="300">5 Minutes</option>
                                    <option value="600">10 Minutes</option>
                                    <option value="1200">20 Minutes</option>
                                    <option value="1800">30 Minutes</option>
                                    <option value="2400">40 Minutes</option>
                                    <option value="3000">50 Minutes</option>
                                    <option value="3600">60 Minutes</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-sm-6">
                                <label class="form-label" for="noOfQuestions">Number of Questions</label>
                                <input class="form-control" placeholder="Number of Questions" type="number" name="noOfQuestions" id="noOfQuestions" required>
                            </div>
                            <div class="mb-3 col-sm-6">
                                <label class="form-label" for="color">Color Display Box</label>
                                <input style="height: 38px;" class="form-control w-25" placeholder="Color" type="color" name="color" id="color" value="#ff0000" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-sm-12">
                                <label class="form-label" for="description">Description</label>
                                <textarea class="form-control" placeholder="Description" rows="5" name="description" id="description" value="<?php if (isset($_POST["submit"] )) echo $fullname ?>" required>
                            </textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block" name="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>










    
    <?php 
    
        for($i=0; $i < $row['nQuestions']; $i++){

        }
    
    ?>
    
</body>
</html>