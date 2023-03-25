<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    $smtpEmail = $_ENV['email'];
    $password = $_ENV['password'];
    $url = $_ENV['url'];

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->SMTPAuth = true;                       
    $mail->Host       = 'smtp.gmail.com;';    
    $mail->SMTPAuth   = true;               
    $mail->Username   = $smtpEmail;     
    $mail->Password   = $password;         
    $mail->SMTPSecure = 'tls';              
    $mail->Port       = 587;
    $mail->setFrom($smtpEmail, 'ITCS333 G-2');           
    $mail->addAddress($email);    
    $mail->isHTML(true);                  
    $verificationCode = substr(number_format(time() * rand(), 0, '', ''), 0, 6);                
    $mail->Subject = 'Email verification';
    $href = $url.'functions/verify.inc.php?code='.$verificationCode;
    $mail->Body    = '<p>Click this <a href="'.$href.'">link</a> to cerify</p>';
    $mail->send();

?>