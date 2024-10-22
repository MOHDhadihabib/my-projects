<?php
session_start();
include 'config.php'; // Include your database configuration

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';  // PHPMailer autoload

// Function to send OTP via email
function sendOtpEmail($user_email, $otp) {
    $mail = new PHPMailer(true);
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'hadi.habib315@gmail.com';  // Your email
        $mail->Password   = 'aeaf dvxq solp ezev';      // App-specific password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Recipients
        $mail->setFrom('hadi.habib315@gmail.com');
        $mail->addAddress($user_email);

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

if (isset($_POST['email'])) {
    // Set the session email from POST parameter
    $_SESSION['email'] = $_POST['email'];
    
    // Generate OTP
    $otp = rand(1000, 9999);
    $_SESSION['otp'] = $otp;
    
    // Send OTP to email
    sendOtpEmail($_SESSION['email'], $otp);
}

// Handle OTP verification form
if (isset($_POST['submit_otp'])) {
    $entered_otp = mysqli_real_escape_string($conn, $_POST['otp']);
    
    // Verify OTP
    if ($entered_otp == $_SESSION['otp']) {
        $_SESSION['otp_verified'] = true;
        // Redirect to password reset page after successful OTP verification
        header("Location: updatepassword.php");
        exit();
    } else {
        echo "<script>alert('Invalid OTP. Please try again.');</script>";
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forgot Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f3f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 0 15px; /* Add padding to the sides */
        }
        .container {
            background-color: white;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%; /* Full width for small screens */
            max-width: 400px; /* Maximum width for larger screens */
            text-align: center;
        }
        h2 {
            margin-bottom: 20px;
            color: #333;
        }
        p {
            margin-bottom: 20px;
            color: #666;
        }
        .input-group {
            margin-bottom: 15px;
            text-align: left;
        }
        .input-group label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }
        .input-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
            transition: border-color 0.3s ease;
        }
        .input-group input:focus {
            border-color: #007bff;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #0056b3;
        }
        /* Media Queries for responsiveness */
        @media (max-width: 480px) {
            .container {
                padding: 20px;
            }
            h2 {
                font-size: 20px;
            }
            button {
                padding: 8px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Forgot Your Password?</h2>
        <p>Enter your email to receive OTP.</p>

        <!-- Email input form -->
        <?php if (!isset($_SESSION['email'])): ?>
            <form action="" method="POST">
                <div class="input-group">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" id="email" placeholder="Enter your email" required>
                </div>
                <button type="submit">Send Reset Link</button>
            </form>
        <?php else: ?>
            <form action="" method="post">
                <div class="input-group">
                    <label for="otp">OTP</label>
                    <input type="text" name="otp" id="otp" placeholder="Enter OTP" required>
                </div>
                <button type="submit" name="submit_otp">Verify OTP</button>
            </form>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
