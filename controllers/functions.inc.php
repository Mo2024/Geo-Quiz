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
?>