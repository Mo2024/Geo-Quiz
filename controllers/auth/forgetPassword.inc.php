<?php 
    require('../partials/regex.inc.php');
    require('../functions/mailer.inc.php');
    require('../functions/functions.inc.php');
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {

        if(isset($_POST['uid'])){
            $userEmail = $_POST['uid'];
            if(!preg_match($emailReg, $userEmail)){
                $_SESSION['error'] = 'Invalid Email Address';
                header("Location: /ITCS333-Project/auth/forgetPassword.php");
            }else{
                $uidQuery = "SELECT * FROM users WHERE email = :email";
                $stmt = $db->prepare($uidQuery);
                $stmt->bindParam(':email', $userEmail);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($result) {
                    $pCode = random_int(100000, 999999);
                    
                    $insertQuery = "UPDATE users SET pcode = :pcode WHERE email = :email";
                    $stmt = $db->prepare($insertQuery);
                    $stmt->bindParam(':email', $userEmail);
                    $stmt->bindParam(':pcode', $pCode);
                    $stmt->execute();

                    
                    $recipientEmail = $userEmail;
                    $subject = 'Forget Password Verification Code';
                    $body = 'Your verification code is '.$pCode;
            
                    // Set recipient email address
                    $message->setTo($recipientEmail);
            
                    // Set email subject
                    $message->setSubject($subject);
            
                    // Set email body
                    $message->setBody($body);
                    $mailer->send($message);
                    setcookie("forgetuid", base64_encode($result['uid']),time() + 300, '/', '', true, true);
                    header("Location: /ITCS333-Project/auth/forgetPassword.php?display=pCode");
                } else {
                    $_SESSION['error'] = 'Email Does not exist';
                    header("Location: /ITCS333-Project/auth/forgetPassword.php");                
                }
            }
        } 
        else if(isset($_POST['pcode'])){
            $pcode = $_POST['pcode'];
            if(!preg_match($pcodeReg, $pcode)){
                $_SESSION['error'] = 'Invalid Verification Code';
                $goToPCode = true;
                $dontGoToEmail = true;
                header("Location: /ITCS333-Project/auth/forgetPassword.php?display=pCode");
            }else{
                if(isset($_COOKIE['forgetuid'])){
                    $decodedID = base64_decode($_COOKIE['forgetuid']);
                    $row = selectUser($decodedID, $db);
                    if ($row['pcode'] == $pcode) {                    
                        $insertQuery = "UPDATE users SET pcode = :pcode WHERE uid = :uid";
                        $stmt = $db->prepare($insertQuery);
                        $stmt->bindParam(':uid', $decodedID);
                        $stmt->bindValue(':pcode', null);
                        $stmt->execute();
                        header("Location: /ITCS333-Project/auth/forgetPassword.php?display=pwd");
                    }else{                       
                        $_SESSION['error'] = 'Incorrect Verification Code';
                        header("Location: /ITCS333-Project/auth/forgetPassword.php?display=pCode");
                    }
                }else{
                    //error
                    setcookie("forgetuid", "",time() - 300, '/', '', true, true);
                    $_SESSION['error'] = 'Timeout error please try again';
                    header("Location: /ITCS333-Project/auth/forgetPassword.php");
                }
            }
        }else if(isset($_POST['password1']) && isset($_POST['password2'])){
            $pwd1 = $_POST['password1'];
            $pwd2 = $_POST['password2'];
            if(isset($_COOKIE['forgetuid'])){
                if(!preg_match($passwordReg, $pwd1) && !preg_match($passwordReg, $pwd2)){
                    $goToPwd = true;
                    $_SESSION['error'] = 'Please make sure that the entered password has one special character, one small letter, one capital letter and at least 8 characters long';
                    header("Location: /ITCS333-Project/auth/forgetPassword.php?display=pwd");
                }else{
                    $hash = password_hash($pwd1, PASSWORD_DEFAULT);
                        $insertQuery = "UPDATE users SET hash = :hash WHERE uid = :uid";
                        $stmt = $db->prepare($insertQuery);
                        $decodedID = base64_decode($_COOKIE['forgetuid']);
                        $stmt->bindParam(':uid', $decodedID);
                        $stmt->bindParam(':hash', $hash);
                        $stmt->execute();
                        setcookie("forgetuid", "",time() - 300, '/', '', true, true);
                        $_SESSION['success'] = 'Password Successfully Updated';
                        header("Location: /ITCS333-Project/mainpage.php");
                }
            } else{
                //error
                $_SESSION['error'] = 'Timeout error please try again';
                header("Location: /ITCS333-Project/auth/forgetPassword.php");
            }
        }
    }


    
?>