<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $birth = $_POST['birth'];
    $pnumber = $_POST['pnum'];
    $type = "user";
    
    require("partials/regex.php");

    if(preg_match($usernameReg, $username) && preg_match($emailReg, $email)
    && preg_match($passwordReg, $password) && preg_match($nameReg, $firstname)
    && preg_match($nameReg, $lastname) && preg_match($pnumberReg, $pnumber) && preg_match($dateReg, $birth)){
        echo "true";
        $sql = "INSERT INTO user (username, email, hash, firstname, lastname, birthdate, phonenumber, type) 
        VALUES('$username', '$email', '$password', '$firstname', '$lastname', '$birth', '$pnumber', '$type')";
        $rs = $db->query($sql);
    }else{
        echo "false";
    }

    echo $birth;


}
?>