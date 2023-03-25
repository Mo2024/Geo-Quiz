<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    require('functions.inc.php');
    require("partials/regex.inc.php");

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $birth = $_POST['birth'];
    $pnumber = $_POST['pnum'];
    $type = "user";

    if(preg_match($usernameReg, $username) && preg_match($emailReg, $email)
    && preg_match($passwordReg, $password) && preg_match($passwordReg, $password2)
    && preg_match($nameReg, $firstname) && preg_match($nameReg, $lastname)
    && preg_match($pnumberReg, $pnumber) && preg_match($dateReg, $birth)){

        if($password != $password2){
            echo '
            <div class="container mt-5">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Passwords do not match
                </div>
            </div>
            ';
        }else{

            $usernameQuery = "SELECT * FROM user WHERE username = '$username'";
            $emailQuery = "SELECT * FROM user WHERE email = '$email'";
    
            $usernameResult = ($db->query($usernameQuery)->rowCount());
            $emailResult = ($db->query($emailQuery)->rowCount());
    
            //Cecks if username or email already exist, else it inserts the values into the database
            if($usernameResult>0){
                echoAlertDanger("Username already exists");
            }
            else if($emailResult>0){
                echoAlertDanger("Email already exists");
            }
            else{
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO user (username, email, hash, firstname, lastname, birthdate, phonenumber, type) 
                        VALUES('$username', '$email', '$hash', '$firstname', '$lastname', '$birth', '$pnumber', '$type')";
                $result = $db->query($sql);
         
                $_SESSION["userId"] = $db->lastInsertId();
                $_SESSION["username"] = $username;   
                header("Location: mainpage.php?Signup=success");
                die();        
            }
        }
    }else{
        echoAlertDanger(
            "Please make sure that:
            <ul>
                <li>Username is 4 to 20 characters long, only contains alphabet letters and 0 to 9 numerics </li>
                <li>Email, name and birthdate are enetered properly</li>
                <li>Password has one special character, one small letter, one capital letter and at least 8 characters long</li>
            </ul>"
        );
    }

}
?>