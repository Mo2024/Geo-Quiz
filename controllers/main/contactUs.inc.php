<?php 
    require_once(realpath('./vendor/autoload.php'));
    use Dotenv\Dotenv;
    $dotenv = Dotenv::createImmutable(__DIR__.'/../../');
    $dotenv->load();
    require('./functions/mailer.inc.php');
    session_start();
    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $msg = $_POST['message'];

        // if(!preg_match($emailReg, $email)){

        // } else if(!preg_match($subjectReg, $subject)){

        // } else if(!preg_match($messageReg, $message)){

        // }

        $recipientEmail = 'itcs333projectgroup@gmail.com';
        $body = 'Sender:\n'.$email.'\n\n Message:\n'.$msg;

        $message->setTo($recipientEmail);
        $message->setSubject($subject);
        $message->setBody($body);
        $mailer->send($message);
        $_SESSION['success'] = 'Thank you for the feedback!';
        header("Location: /ITCS333-Project/mainpage.php");                
    }

?>