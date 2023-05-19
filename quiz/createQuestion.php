<?php $title = "Sign Up"; require('../partials/boilerplate.inc.php')?>
<?php require('../controllers/quiz/createQuestion.inc.php')?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="container d-flex justify-content-center align-items-center my-5">
    <div class="row w-100">
        <div class="col-xl-12">
            <div class="bg-color border card border-color-form shadow">
                <div class="card-body">
                    <h5 class="card-title text-secondary">Create Questions</h5>
                    <form class="validated-form" method="POST" novalidate enctype="multipart/form-data">
                        <?php 
                            for($i=0; $i < $_SESSION['noOfQuestions']; $i++){
                                $nonIndex = $i + 1;
                                echo '
                                <div class="row">
                                    <div class=" col-sm-6">
                                        <button class="btn btn-primary mb-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample'.$i.'" aria-expanded="false" aria-controls="collapseExample'.$i.'">
                                            Question '.$nonIndex.'
                                        </button>
                                    </div>
                                    <div class="collapse" id="collapseExample'.$i.'">
                                        <div class="card card-body">
                                            <label class="form-label fw-bold mt-1" for="qType'.$i.'">Question Type</label>
                                            <select name="qTypes[]" class="form-select my-select w-50" onchange="handleSelectChange('.$i.', this.value)">
                                                <option selected value="FITB">Fill in the blanks</option>
                                                <option value="MCQ">MCQ</option>
                                                <option value="TF">True or Flase</option>
                                            </select>
                                            <!-- Number thigy -->
                                            
                                            <label class="form-label fw-bold mt-1" for="mark'.$i.'">Mark</label>
                                            <div class="input-group w-50">
                                                <span class="input-group-btn">
                                                    <button type="button" class="btn btn-outline-secondary" onclick="decreaseValue('.$i.')">-</button>
                                                </span>
                                                <input type="number" name="marks[]" class="form-control text-center qMarks" id="mark'.$i.'" value="0" min="0">
                                                <span class="input-group-btn">
                                                    <button type="button" class="btn btn-outline-secondary" onclick="increaseValue('.$i.')">+</button>
                                                </span>
                                            </div>
        
                                            <label class="form-label mt-1 fw-bold" for="question'.$i.'">Write your question here</label>
                                            <textarea class="form-control" placeholder="Question" rows="1" name="questions[]" id="question'.$i.'" required></textarea>
                                                
                                            <div class="qTypePosition">
                                                <label class="form-label mt-1 fw-bold" for="answer'.$i.'">Write your answer here</label>
                                                <input placeholder="Correct Answer" class="form-control" type="text" name="answers[]" id="answer'.$i.'" required autofocus> 
                                            </div>
                                            
                                            <label for="image'.$i.'" class="form-label fw-bold mt-1">Image</label>
                                            <input name="images[]" class="form-control form-control-sm w-25" id="formFileSm'.$i.'" type="file">
                                        </div>
                                    </div>
                                </div>';

                            }

                        
                        
                        ?>
                       
                        <button type="submit" class="btn btn-primary btn-block" name="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


    <script>
        function decreaseValue(value){
            if(document.getElementsByClassName("qMarks")[value].value > 0){
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
                `<label class="form-label mt-1 fw-bold" for="question${divPosition}">Write your question here
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
                <input placeholder="Correct Answer" class="form-control" type="text" name="answers[]" id="answer${divPosition}" required autofocus> `;
            }

        }
    </script>
    
    
</body>
</html>