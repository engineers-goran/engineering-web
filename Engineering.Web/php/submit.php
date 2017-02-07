<?php

require 'class.phpmailer.php';
require 'class.smtp.php';
// specify your email here

$to = 'office@bauengineering.rs';

ini_set('SMTP','in.mailjet.com"' ); 
ini_set('sendmail_from', 'contact_form@bauengineering.rs');
ini_set('smtp_port', 2525);
ini_set('smtp_user', '5965b1ec79ecf38ba6d0c10c613256c3');
ini_set('smtp_pass', 'f0990ca6065c4a5f8f5bf2690827f9d1');

    // Assigning data from $_POST array to variables
if (isset($_POST['name'])) { $name = $_POST['name']; }
if (isset($_POST['email'])) { $from = $_POST['email']; }
if (isset($_POST['company'])) { $company = $_POST['company']; }
if (isset($_POST['message'])) { $message = $_POST['message']; }

    // Construct subject of the email
$subject = 'Contact Iquery ' . $name;

    // Construct email body
$body_message .= 'NAME: ' . $name . "\r\n\n";
$body_message .= 'EMAIL: ' . $from . "\r\n\n";
$body_message .= 'SUBJECT: ' . $company . "\r\n\n";
$body_message .= 'MESSAGE: ' . $message . "\r\n\n";

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'in.mailjet.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = '5965b1ec79ecf38ba6d0c10c613256c3';                 // SMTP username
$mail->Password = 'f0990ca6065c4a5f8f5bf2690827f9d1';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom($from, 'Engineering');
$mail->addAddress($to);     // Add a recipient

$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = $subject;
$mail->Body    = $body_message;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}


?>