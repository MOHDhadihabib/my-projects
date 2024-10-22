<?php
include 'config.php';
if (isset($_POST['otp'])) {
    $user_otp = $_POST['otp'];
    $generated_otp = $_SESSION['otp'];

    if ($user_otp == $generated_otp) {
        echo "<script>alert('OTP verification successful. Welcome!');</script>";
    } else {
        echo "<script>alert('Incorrect OTP. Please try again.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Confirm OTP</title>
</head>
<body>
  <h3>Enter the OTP sent to your email</h3>
  <form action="index.php" method="post">
    <input type="number" name="otp" placeholder="Enter OTP" required>
    <button type="submit">Submit OTP</button>
  </form>
</body>
</html>
