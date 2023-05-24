<?php 
require('../functions/functions.inc.php');
require("../partials/regex.inc.php");

if(isset($_SESSION['userId']) && !empty($_SESSION['userId'])){
    $id = $_SESSION['userId'];
    $row = selectUser($id, $db);
    if(!isset($email)){
        $email = $row['email'];
        $username = $row['username'];
        $fullname = $row['fName'];
        $redirect = true;
    }
    
    if (isset($_POST['submit'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $fullname = $_POST['fullname'];
        $redirect = true;

        if(!preg_match($emailReg,$email)){
            $_SESSION['error'] = "Please make sure that the entered email is valid";
            header("Location: /ITCS333-Project/profile/profile.php");   
        } else if(!preg_match($usernameReg,$username)){
            $_SESSION['error'] = "Please make sure that Username is 4 to 20 characters long, only contains alphabet letters and 0 to 9 numerics";
            header("Location: /ITCS333-Project/profile/profile.php");   
        } else if(!preg_match($nameReg,$fullname)){
            $_SESSION['error'] = "Please make sure that the entered full name is entered properly";
            header("Location: /ITCS333-Project/profile/profile.php");   
        }else if(isset($_POST['vcode']) && $_POST['vcode'] !== ''){
            $vCode = $_POST['vcode'];
            if($vCode == $row['vcode']){
                if(!preg_match($pcodeReg, $vCode)){
                    $_SESSION['error'] = "Invalid Verification code";
                    header("Location: /ITCS333-Project/profile/profile.php");           
                }else{
                    $insertQuery = "UPDATE users SET vcode = :vcode, verified = :verified WHERE uid = :uid";
                    $stmt = $db->prepare($insertQuery);
                    $stmt->bindParam(':uid', $row['uid']);
                    $stmt->bindValue(':vcode', 0);
                    $stmt->bindValue(':verified', true);
                    $stmt->execute();
                    $_SESSION['Success'] = "Account Verified!";
                    header("Location: /ITCS333-Project/profile/profile.php");           
                }
            }else{
                $_SESSION['error'] = "Incorrect Verification Code";
                header("Location: /ITCS333-Project/profile/profile.php");           
            }
        } else {
            $usernameQuery = "SELECT * FROM users WHERE username = '$username'";
            $emailQuery = "SELECT * FROM users WHERE email = '$email'";
    
            $usernameResult = ($db->query($usernameQuery)->rowCount());
            $emailResult = ($db->query($emailQuery)->rowCount());
    
            //Cecks if username or email already exist, else it inserts the values into the database
            if($usernameResult>0 && $username != $row['username']){
                $_SESSION['error'] = 'Username already exists';
                header("Location: /ITCS333-Project/profile/profile.php");   
            }
            else if($emailResult>0 && $email != $row['email']){
                $_SESSION['error'] = 'Email already exists';
                header("Location: /ITCS333-Project/profile/profile.php");   
            }
            else{
                // $verificationStatus = $row['verified'];                
                // if ($row['email'] != $email){
                //     $verificationStatus = false;
                // }
                $updateQuery = "UPDATE users SET username = :username, email = :email, fName = :fName WHERE uid = :uid";
                $stmt = $db->prepare($updateQuery);
                
                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':fName', $fullname);
                $stmt->bindParam(':uid', $id);
                $stmt->execute();

                $row = selectUser($_SESSION['userId'], $db);
                $_SESSION['success'] = 'User profile updated';
                header("Location: /ITCS333-Project/profile/profile.php"); 
            }
        }
    } 
   
}else{
    $url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    setcookie("redirect", $url,0,'/');
    header("Location: /ITCS333-Project/auth/signin.php");
    
}

?>