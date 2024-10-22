<?php
session_start();
include 'config.php'; // Include your database configuration

// Check if OTP is verified
if (!isset($_SESSION['otp_verified']) || $_SESSION['otp_verified'] !== true) {
    echo "<script>alert('You must verify your OTP before resetting your password.'); window.location.href='loginsignup.php';</script>";
    exit();
}

// Handle password update form submission
if (isset($_POST['submit_password'])) {
    $new_password = mysqli_real_escape_string($conn, $_POST['new_password']);
    
    // Update password in the database (assumes user is already in session)
    $email = $_SESSION['email'];
    $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);
    
    $query = "UPDATE users SET password='$hashed_password' WHERE email='$email'";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Password has been reset successfully.'); window.location.href='loginsignup.php';</script>";
        session_destroy();
    } else {
        echo "<script>alert('Error updating password. Please try again.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Password</title>
</head>
<body>
    <h3>Reset your password</h3>
    <form action="" method="post">
        <input type="password" name="new_password" placeholder="New Password" required><br><br>
        <button type="submit" name="submit_password">Reset Password</button>
    </form>
</body>
</html>
