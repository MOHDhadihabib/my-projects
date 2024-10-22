<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load PHPMailer if installed via Composer
require 'vendor/autoload.php';

// Check if the user email is set in the session
if (!isset($_SESSION['email']) || empty($_SESSION['email'])) {
    die('Error: Email is not set in session. Please log in first.');
}

// Get user email from session
$user_email = $_SESSION['email'];

// Generate OTP
$otp = rand(1000, 9999);
$_SESSION['otp'] = $otp;

function sendOtpEmail($user_email, $otp) {
    $mail = new PHPMailer(true);
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'hadi.habib315@gmail.com'; // Your email
        $mail->Password   = 'aeaf dvxq solp ezev';      // App-specific password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Recipients
        $mail->setFrom('hadi.habib315@gmail.com', 'Your Website');
        $mail->addAddress($user_email); // Ensure this is a valid email address

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Your OTP Code';
        $mail->Body    = "Your OTP code is: <strong>$otp</strong>";

        $mail->send();
        echo 'OTP has been sent to your email.';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

// Send the OTP email
sendOtpEmail($user_email, $otp);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>OTP</title>
</head>
<body>
  <h3>An OTP has been sent to your email. Please check your inbox and enter the OTP in the form.</h3>
  <a href="confirmotp.php">Go to OTP Verification</a>
</body>
</html>
