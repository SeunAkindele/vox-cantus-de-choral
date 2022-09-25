<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer();

$email = '';
$name = '';
$message = '';

if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $name = $_POST['name'];
    $message = $_POST['message'];
}

try {
    // $mail->SMTPDebug = 1;
    $mail->isSMTP();
    $mail->Host = 'mail.mercistaffing.org';
    $mail->SMTPAuth = true;
    $mail->Username = 'apply@mercistaffing.org';
    $mail->Password = 'p;uXFN}suo^4';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('apply@mercistaffing.org', "$lastname $firstname");
    $mail->addAddress('voxchorale@gmail.com');
    $mail->isHTML(true);
    $mail->Subject = "Enquiry from $name";
    $mail->Body = "<html>$message<br><br>You may respond to $name's enquiry through <a href='mailto: $email'>$email</a><html>";
    $mail->AltBody =
        'A message was just submitted through the vox cantus de chorale website.';
    $mail->send();

    echo 'Thanks for contacting us, we will reply you shortly';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
