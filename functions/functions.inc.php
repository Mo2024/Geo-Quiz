<?php
    function echoAlertDanger($message){
        echo '
        <div class="container mt-5">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                '.$message.'
            </div>
        </div>
        ';
    }

    function echoAlertSuccess($message){
        echo '
        <div class="container mt-5">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                '.$message.'
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
        ';
    }
    
    function updatePassword($passwordReg, $newPwd, $confirmPwd, $id, $db){
        if(preg_match($passwordReg, $newPwd) && preg_match($passwordReg, $confirmPwd)){
            if ($newPwd == $confirmPwd){
                if($newPwd == $oldpwd){

                }else{
                    $newHash = password_hash($newPwd, PASSWORD_DEFAULT);
                    $updateQuery = "UPDATE users SET hash = '$newHash' WHERE uid = '$id'";
                    $result = $db->query($updateQuery);
                    $_SESSION['success'] = 'Password Updated';
                    header("Location: /ITCS333-Project/profile/updatePassword.php"); 
                }
            } else{
                $_SESSION['error'] = 'New Passwords do not match';
                header("Location: /ITCS333-Project/profile/updatePassword.php"); 
            }
    
            
        }else{
            echoAlertDanger('Make sure that Password has one special character, one small letter, one capital letter and at least 8 characters long');
        }
    }

    function selectUser($id, $db){
        $idQuery = "SELECT * FROM users WHERE uid = '$id'";
        $result = $db->query($idQuery);
        return $result->fetch();
    }

    function selectQuiz($id, $db){
        $idQuery = "SELECT * FROM quiz WHERE quizid = '$id'";
        $result = $db->query($idQuery);
        return $result->fetch();
    }

?>