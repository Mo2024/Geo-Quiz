<?php $title = "Homepage"; require('partials/boilerplate.inc.php')?>

<?php 
    $keysAsValues = array_flip($_GET);
    if(isset($keysAsValues['success']) && (isset($_GET['Signup'])||isset($_GET['Signout'])||isset($_GET['Signin'])||isset($_GET['Verification']))){
        if(isset($_SESSION['userId'])){
            require('./functions/phpmailer.inc.php');
            require('./functions/functions.inc.php');
            $user = selectUser($_SESSION['userId'],$db);

            $message->setTo($user['email']);
            $message->setSubject('Email verification');
            $href = $url.'functions/verifyEmail.inc.php?code='.$user['verificationCode'];
            $message->setBody('<p>Click this <a href="'.$href.'">link</a> to verify your email</p>', 'text/html');
            
            // send the message
            $result = $mailer->send($message);
        }
        echo '
            <div class="container mt-5">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    '.$keysAsValues['success'].' Successful!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
            ';
    }
    if(isset($_GET['access']) && $_GET['access'] == 'unauthorized'){
        echo '
            <div class="container mt-5">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Access unauthorized
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
            ';
    }
?>

<?php require('partials/footer.inc.php')?>