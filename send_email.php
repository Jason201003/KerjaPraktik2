<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// require 'vendor/autoload.php'; // Pastikan PHPMailer terinstal melalui Composer

// $mail = new PHPMailer(true);

// try {
// //     // Server settings
// //     $mail->isSMTP();
// //     $mail->Host       = 'smtp.gmail.com'; // Ganti dengan SMTP server Anda
// //     $mail->SMTPAuth   = true;
// //     $mail->Username   = 'hendryjoel08@gmail.com'; // Ganti dengan email Anda
// //     $mail->Password   = 'btwgklxvmnbtbcwj';       // Ganti dengan password email Anda
// //     $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
// //     $mail->Port       = 587;

// //     // Recipients
// //     $mail->setFrom('hendryjoel08@gmail.com', 'Mailer');
// //     $mail->addAddress('yooitss0987@gmail.com');

// //     // Content
// //     $mail->isHTML(true);
// //     $mail->Subject = 'Test Email';
// //     $mail->Body    = 'This is a test email sent using SMTP!';

// //     $mail->send();
// //     echo 'Message has been sent';
// // } catch (Exception $e) {
// //     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
// }