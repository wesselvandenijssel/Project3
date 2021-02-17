<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
require 'assets/mail/src/Exception.php';
require 'assets/mail/src/PHPMailer.php';
require 'assets/mail/src/SMTP.php';
// Instantiation and passing `true` enables exceptions
// $mail = new PHPMailer(true);
// try {
//     //Server settings
//     $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
//     $mail->isSMTP();                                            // Send using SMTP
//     $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
//     $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
//     $mail->Username   = 'wesselvandenijsselxampp@gmail.com';                     // SMTP username
//     $mail->Password   = 'Sazukafotaf.';                               // SMTP password
//     //$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
//     $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
//     //Recipients
//     $mail->setFrom('wesselvandenijsselxampp@gmail.com', 'Mailer');
//     $mail->addAddress('wessel069@gmail.com', 'Joe User');     // Add a recipient
//     //$mail->addAddress('ellen@example.com');               // Name is optional
//     $mail->addReplyTo('wesselvandenijsselxampp@gmail.com', 'Information');
//     //$mail->addCC('cc@example.com');
//     //$mail->addBCC('bcc@example.com');
//     // Attachments
//    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//     //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
//     // Content
//     $mail->isHTML(true);                                  // Set email format to HTML
//     $mail->Subject = 'Here is the subject';
//     $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
//     $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
//     $mail->send();
//     echo 'Message has been sent';
// } catch (Exception $e) {
//     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
// }

// $to_email = "wessel069@gmail.com";
// $subject = "Simple Email Test via PHP";
// $body = "Hi,nn This is test email send by PHP Script";
// $headers = "From: sender\'s email";


//     $mail= mail($to_email, $subject, $body, $headers);
//     var_dump($mail)

$mail = new PHPMailer(true);
// Send mail using Gmail

    $mail->IsSMTP(); // telling the class to use SMTP
    $mail->SMTPAuth = true; // enable SMTP authentication
    $mail->SMTPSecure = "ssl"; // sets the prefix to the servier
    $mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
    $mail->Port = 465; // set the SMTP port for the GMAIL server
    $mail->Username = "wesselvandenijsselxampp@gmail.com"; // GMAIL username
    $mail->Password = "Sazukafotaf."; // GMAIL password

// Typical mail data
$mail->AddAddress("wessel069@gmail.com", "Wessel van den IJssel");
$mail->SetFrom("wesselvandenijsselxampp@gmail.com", "Test2");
$mail->Subject = "My Subject";
$mail->Body = "Mail contents";
try{
    $mail->Send();
    echo "Success!";
} catch(Exception $e){
    // Something went bad
    echo "Fail :(";
    var_dump($e);
}
?>