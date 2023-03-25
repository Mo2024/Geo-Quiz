<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $uid = $_POST['uid'];
    $password = $_POST['password'];

    require("partials/regex.inc.php");
    if($uid == '' || $password == ''){
        echo '
        <div class="container mt-5">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Username/Email or Password field are empty
            </div>
        </div>
        ';
    }
    if(preg_match($emailReg, $uid)){
        $emailQuery = "SELECT * FROM user WHERE email = '$uid'";
        $result = $db->query($emailQuery);
        if ($row = $result->fetch()) {
            if (password_verify($password, $row[3])) {
                //password match
            }
        }
        else{
            //User does not exist
        }
    }else if(preg_match($usernameReg, $uid)){
        $userQuery = "SELECT * FROM user WHERE username = '$uid'";
        $result = $db->query($userQuery);
        if ($row = $result->fetch()) {
            if (password_verify($password, $row[3])) {
                session_start();
                $_SESSION["userId"] = $row[0];
                $_SESSION["usernameId"] = $row[1];
                //password match
            }
        }
        else{
            //User does not exist
        }

    }else{
        //invalid username/email or password 
    }

}
?>