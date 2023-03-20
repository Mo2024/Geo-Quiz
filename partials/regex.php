<?php 

    //4 to 20 characters with only alphabet letters and 0 to 9
    $usernameReg = "/^[A-Za-z][A-Za-z0-9]{3,19}$/";
    $emailReg = "/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/";
    //At least one special character, one small letter, one capital letter and length is at least 8 characters
    $passwordReg = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";
    $nameReg = "/^[a-zA-Z]{1,}$/";
    $pnumberReg = "/^[0-9]{1,100}$/";
    $dateReg = "/^\d{4}\-(0?[1-9]|1[012])\-(0?[1-9]|[12][0-9]|3[01])$/";

?>