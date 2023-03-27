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

    function sendVerCode($row, $id, $db){
            require(__DIR__ .'/../functions/phpmailer.inc.php');
            $verificationCode = substr(number_format(time() * rand(), 0, '', ''), 0, 6);   
            $mail->addAddress($row['email']);                 
            $mail->Subject = 'Forget Password Verification';
            $mail->Body    = '<p>Your verification code is <b>'.$verificationCode.'</b></p>';
        
            $updateQuery = "UPDATE user SET pwdVerificationCode = '$verificationCode' WHERE id = '$id'";
            $result = $db->query($updateQuery);
        
            $mail->send();

    }
    
    function updatePassword($passwordReg, $newPwd, $confirmPwd, $id, $db){
        if(preg_match($passwordReg, $newPwd) && preg_match($passwordReg, $confirmPwd)){
            if ($newPwd == $confirmPwd){
                $newHash = password_hash($newPwd, PASSWORD_DEFAULT);
                $updateQuery = "UPDATE user SET hash = '$newHash', pwdVerificationCode = NULL WHERE id = '$id'";
                $result = $db->query($updateQuery);
                echoAlertSuccess('Password Updated');
            } else{
                echoAlertDanger('Passwords do not match');
            }
    
            
        }else{
            echoAlertDanger('Make sure that Password has one special character, one small letter, one capital letter and at least 8 characters long');
        }
    }

?>