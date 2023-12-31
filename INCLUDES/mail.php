<?php

    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;

function sendMail($adress, $subject, $message){

    require_once "PHPMAILER/Exception.php";
    require_once "PHPMAILER/PHPMailer.php";
    require_once "PHPMAILER/SMTP.php";

    $mail = new PHPMailer(true);

    try{
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;

        $mail->isSMTP();
        $mail->Host = "localhost";
        $mail->Port = 1025;

        $mail->CharSet = "utf-8";

        $mail->addAddress($adress);

        $mail->setFrom("blackcarpers@gmail.com");

        $mail->Subject = $subject;

        $mail->Body = $message;

        $mail->send();

        

    }
    catch(Exception){

        echo "Message non envoyé. Erreur: {$mail->ErrorInfo}";
    }
}