<?php $title = "Sign Up"; require('../partials/boilerplate.inc.php')?>
<?php require('../controllers/quiz/createQuestion.inc.php')?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="container d-flex justify-content-center align-items-center my-5">
    <div class="row w-100">
        <div class="col-xl-12">
            <div class="bg-color border card border-color-form shadow">
                <div class="card-body">
                    <h5 class="card-title text-secondary">Create Questions</h5>
                    <form class="validated-form" id="questionsForm" method="POST" novalidate enctype="multipart/form-data">
                        <?php 
                            $mcqChoices = 0;
                            for($i=0; $i < $newQuiz['noOfQuestions']; $i++){
                                $nonIndex = $i + 1;
                                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit']) && !$valid){
                        ?>                       
                                    <div class="row mt-2">
                                        <div class=" col-sm-6">
                                            <button class="btn btn-primary mb-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample<?php echo $i ?>" aria-expanded="false" aria-controls="collapseExample<?php echo $i?>">
                                                Question <?php echo $nonIndex ?>
                                            </button>
                                        </div>
                                        <div class="collapse" id="collapseExample<?php echo $i ?>">
                                            <div class="card card-body">
                                                <label class="form-label fw-bold mt-1" for="qType<?php echo $i ?>">Question Type</label>
                                                <select name="qTypes[]" class="form-select my-select w-50" onchange="handleSelectChange(<?php echo $i ?>, this.value)">
                                                    <?php if($qTypes[$i] == 'MCQ'){?>
                                                        <option value="FITB">Fill in the blanks</option>
                                                        <option selected value="MCQ">MCQ</option>
                                                        <option value="TF">True or Flase</option>
                                                    <?php } else if($qTypes[$i] == 'FITB') {?>
                                                        <option selected value="FITB">Fill in the blanks</option>
                                                        <option value="MCQ">MCQ</option>
                                                        <option value="TF">True or Flase</option>
                                                    <?php } else if($qTypes[$i] == 'TF') {?>      
                                                        <option value="FITB">Fill in the blanks</option>
                                                        <option value="MCQ">MCQ</option>
                                                        <option selected value="TF">True or Flase</option>
                                                    <?php } ?>
                                                </select>
                                                <!-- Number thigy -->
                                                
                                                <label class="form-label fw-bold mt-1" for="mark<?php echo $i ?>">Mark</label>
                                                <div class="input-group w-50">
                                                    <span class="input-group-btn">
                                                        <button type="button" class="btn btn-outline-secondary" onclick="decreaseValue(<?php echo $i ?>)">-</button>
                                                    </span>
                                                    <input type="number" name="marks[]" class="form-control text-center qMarks" id="mark<?php echo $i ?>" value="<?php echo $marks[$i] ?>" min="0">
                                                    <span class="input-group-btn">
                                                        <button type="button" class="btn btn-outline-secondary" onclick="increaseValue(<?php echo $i ?>)">+</button>
                                                    </span>
                                                </div>
            
                                                <label class="form-label mt-1 fw-bold" for="question<?php echo $i ?>">Write your question here</label>
                                                <textarea class="form-control" placeholder="Question" rows="1" name="questions[]" id="question<?php echo $i ?>" required><?php echo $questions[$i] ?></textarea>
                                    <?php if($qTypes[$i] == 'MCQ'){?>                       
                                        <div class="qTypePosition">
                                                    <h3 class="form-label mt-1 fw-bold">Write your options below</h3>
                                                    <?php
                                                        for($j=0; $j < $newQuiz['noOfQuestions']; $j++){
                                                            $optionsCounter = $i+1 ?>
                                                            <label class="form-label mt-1 fw-bold" for="option<?php echo $j ?>#<?php echo $optionsCounter ?>">Option <?php echo $optionsCounter ?></label>
                                                            <input placeholder="Option <?php echo $optionsCounter ?>" value="<?php echo $options[$i] ?>" class="form-control" type="text" name="options[]" required autofocus>
                                                    <?php $mcqChoices; ?>
                                                    <?php } ?>
                                                    
                                                        
                                                    <label class="form-label mt-1 fw-bold" for="answer<?php echo $i ?>">Write your answer here</label>
                                                    <input placeholder="Correct Answer" class="form-control" type="text" name="answers[]" value="<?php echo $marks[$i] ?>" id="answer<?php echo $i ?>" required autofocus> 
                                                </div>
                                    <?php }else if($qTypes[$i] == 'FITB'){?>                       
                                        <div class="qTypePosition">
                                            <label class="form-label mt-1 fw-bold" for="answer<?php echo $i ?>">Write your answer here</label>
                                            <input placeholder="Correct Answer" class="form-control" type="text" name="answers[]" value="<?php echo $answers[$i] ?>" id="answer<?php echo $i ?>" required autofocus> 
                                        </div>
                                    <?php }else if($qTypes[$i] == 'TF'){?>                       
                                            <div class="qTypePosition">
                                                <label class="form-label mt-1 fw-bold" for="answer<?php echo $i ?>">Choose the correct answer</label>
                                                <select name="answers[]" class="form-select my-select w-50">
                                                    <?php if($answers[$i] == 'true'){?>
                                                        <option value="">Please select an answer</option>
                                                        <option selected value="true">True</option>
                                                        <option value="false">False</option>
                                                    <?php } else if($answers[$i] == 'false') {?>     
                                                        <option value="">Please select an answer</option>
                                                        <option value="true">True</option>
                                                        <option selected value="false">False</option>
                                                    <?php } ?>


                                                </select>
                                            </div>
                                    <?php } ?>                                                                                   
                                            </div>
                                        </div>
                                    </div>
                                <?php }else{?>                       
                                    <div class="row mt-2">
                                        <div class=" col-sm-6">
                                            <button class="btn btn-primary mb-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample<?php echo $i ?>" aria-expanded="false" aria-controls="collapseExample<?php echo $i ?>">
                                                Question <?php echo $nonIndex?>
                                            </button>
                                        </div>
                                        <div class="collapse" id="collapseExample<?php echo $i ?>">
                                            <div class="card card-body">
                                                <label class="form-label fw-bold mt-1" for="qType<?php echo $i ?>">Question Type</label>
                                                <select name="qTypes[]" class="form-select my-select w-50" onchange="handleSelectChange(<?php echo $i ?>, this.value)">
                                                    <option selected value="FITB">Fill in the blanks</option>
                                                    <option value="MCQ">MCQ</option>
                                                    <option value="TF">True or Flase</option>
                                                </select>
                                                <!-- Number thigy -->
                                                
                                                <label class="form-label fw-bold mt-1" for="mark<?php echo $i ?>">Mark</label>
                                                <div class="input-group w-50">
                                                    <span class="input-group-btn">
                                                        <button type="button" class="btn btn-outline-secondary" onclick="decreaseValue(<?php echo $i ?>)">-</button>
                                                    </span>
                                                    <input type="number" name="marks[]" class="form-control text-center qMarks" id="mark<?php echo $i ?>" value="1" min="0">
                                                    <span class="input-group-btn">
                                                        <button type="button" class="btn btn-outline-secondary" onclick="increaseValue(<?php echo $i ?>)">+</button>
                                                    </span>
                                                </div>
            
                                                <label class="form-label mt-1 fw-bold" for="question<?php echo $i ?>">Write your question here</label>
                                                <textarea class="form-control" placeholder="Question" rows="1" name="questions[]" id="question<?php echo $i ?>" required></textarea>
                                                    
                                                <div class="qTypePosition">
                                                    <label class="form-label mt-1 fw-bold" for="answer<?php echo $i ?>">Write your answer here</label>
                                                    <input placeholder="Correct Answer" class="form-control" type="text" name="answers[]" id="answer<?php echo $i ?>" required autofocus> 
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                <?php
                                }

                            }

                        
                        
                        ?>
                       
                        <button id="formButton" type="button" onclick="enableAllCollapses()" class="btn btn-primary btn-block mt-3" name="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


    <script>
        function enableAllCollapses() {
            var collapses = document.querySelectorAll('.collapse');

            for (var i = 0; i < collapses.length; i++) {
                collapses[i].classList.add('show');
            }
            let button = document.getElementById('formButton');
            button.type = "submit";
            buttonm.click();

        }
        function decreaseValue(value){
            if(document.getElementsByClassName("qMarks")[value].value > 1){
                document.getElementsByClassName("qMarks")[value].value--;
            }
        }
        function increaseValue(value){
            document.getElementsByClassName("qMarks")[value].value++;
        }

        function handleSelectChange(divPosition, value){
            if(value == "FITB"){
                let questionType = document.getElementsByClassName('qTypePosition')[divPosition];
                questionType.innerHTML = 
                `<label class="form-label mt-1 fw-bold" for="question${divPosition}">Write your answer here
                </label>
                <input placeholder="Correct Answer" class="form-control" type="text" name="answers[]" id="answer${divPosition}" required autofocus>`;
            }else if(value == 'TF'){
                let questionType = document.getElementsByClassName('qTypePosition')[divPosition];
                questionType.innerHTML = 
                `<label class="form-label mt-1 fw-bold" for="answer${divPosition}">Choose the correct answer</label>
                <select name="answers[]" class="form-select my-select w-50">
                    <option selected value="">Please select an answer</option>
                    <option value="true">True</option>
                    <option value="false">False</option>
                </select>`;
            } else if(value == 'MCQ'){
                let questionType = document.getElementsByClassName('qTypePosition')[divPosition];
                questionType.innerHTML = 
                `<h3 class="form-label mt-1 fw-bold">Write your options below</h3>
                <label class="form-label mt-1 fw-bold" for="option1#${divPosition}">Option 1</label>
                <input placeholder="Option 1" class="form-control" type="text" name="options[]" required autofocus>
                
                <label class="form-label mt-1 fw-bold" for="option2#${divPosition}">Option 2</label>
                <input placeholder="Option 2" class="form-control" type="text" name="options[]" required autofocus>
    
                <label class="form-label mt-1 fw-bold" for="option3#${divPosition}">Option 3</label>
                <input placeholder="Option 3" class="form-control" type="text" name="options[]" required autofocus>
                
                <label class="form-label mt-1 fw-bold" for="option3#${divPosition}">Option 4</label>
                <input placeholder="Option 4" class="form-control" type="text" name="options[]" required autofocus>
                
                    
                <label class="form-label mt-1 fw-bold" for="answer${divPosition}">Write your answer here</label>
                <input placeholder="Correct Answer" class="form-control" type="text" name="answers[]" id="answer${divPosition}" required autofocus>`;
            }

        }
    </script>
    
    
<?php require('../partials/footer.inc.php')?>