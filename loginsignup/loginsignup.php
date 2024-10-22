<?php 
session_start();
include 'config.php'; // Database connection file

// SIGNUP Process
if (isset($_POST["signup"])) { 
    $full_name = mysqli_real_escape_string($conn, $_POST["full_name"]); 
    $email = mysqli_real_escape_string($conn, $_POST["email"]); 
    $phone = mysqli_real_escape_string($conn, $_POST["phone"]); 
    $address = mysqli_real_escape_string($conn, $_POST["address"]); 
    $password = mysqli_real_escape_string($conn, $_POST["password"]); 
    $cpassword = mysqli_real_escape_string($conn, $_POST["signup_cpassword"]); 

    // Validate passwords
    if ($password !== $cpassword) { 
        echo "<script>alert('Passwords do not match');</script>"; 
    } else { 
        // Check if email already exists
        $check_email = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'"); 
        if (mysqli_num_rows($check_email) > 0) { 
            echo "<script>alert('Email already exists');</script>"; 
        } else { 
            // Hash the password for security
            $hashed_password = password_hash($password, PASSWORD_DEFAULT); 
            // Insert new user into database
            $sql = "INSERT INTO users (full_name, email, phone, address, password) VALUES ('$full_name', '$email', '$phone', '$address', '$hashed_password')"; 
            $result = mysqli_query($conn, $sql); 
            if ($result) { 
                $_SESSION['full_name'] = $full_name; 
                $_SESSION['email'] = $email; 
                $_SESSION['phone'] = $phone; 
                $_SESSION['address'] = $address; 
                $_SESSION['id'] = mysqli_insert_id($conn); // Get the user ID after insertion
                header("Location: otp.php"); // Redirect to OTP verification
                exit(); 
            } else { 
                echo "<script>alert('User registration failed');</script>"; 
            } 
        } 
    } 
}

// LOGIN Process
if (isset($_POST["login"])) { 
    $email = mysqli_real_escape_string($conn, $_POST["email"]); 
    $password = mysqli_real_escape_string($conn, $_POST["password"]); 

    // Check if email exists in the database
    $check_email = mysqli_query($conn, "SELECT id, password, full_name FROM users WHERE email = '$email'"); 
    if (mysqli_num_rows($check_email) > 0) { 
        $row = mysqli_fetch_assoc($check_email); 
        $stored_password = $row['password']; 

        // Verify password
        if (password_verify($password, $stored_password)) { 
            // Set session data
            $_SESSION["id"] = $row['id']; 
            $_SESSION["full_name"] = $row['full_name']; 
            header("Location: index.php"); // Redirect to a secure page after login
            exit(); 
        } else { 
            echo "<script>alert('Login details are incorrect. Please try again.');</script>"; 
        } 
    } else { 
        echo "<script>alert('Login details are incorrect. Please try again.');</script>"; 
    } 
}
?>

<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Login / Signup</title> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <style> 
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Poppins', sans-serif; background-color: #f4f4f4; }
        .container { width: 100%; max-width: 400px; margin: auto; perspective: 1000px; padding: 20px; }
        .card { width: 100%; position: relative; transform-style: preserve-3d; transition: transform 0.6s; }
        .card-front, .card-back { position: absolute; width: 100%; height: 100%; backface-visibility: hidden; border-radius: 10px; padding: 30px; background: #fff; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1); }
        .card-back { transform: rotateY(180deg); }
        h2 { margin-bottom: 20px; text-align: center; font-size: 24px; color: #333; }
        .input-box { width: 100%; padding: 15px; margin: 10px 0; border: 1px solid #ddd; border-radius: 8px; font-size: 14px; outline: none; transition: border 0.3s ease; }
        .input-box:focus { border-color: #6B73FF; }
        .submit-btn { width: 100%; padding: 15px; background-color: #6B73FF; border: none; border-radius: 8px; color: white; font-size: 16px; cursor: pointer; transition: background-color 0.3s ease; }
        .submit-btn:hover { background-color: #000DFF; }
        .btn { background: none; border: none; color: #6B73FF; cursor: pointer; margin-top: 10px; text-align: center; display: block; font-size: 14px; }
        .btn:hover { text-decoration: underline; }
        a { color: #6B73FF; text-decoration: none; font-size: 14px; }
        a:hover { text-decoration: underline; }
        @media (max-width: 600px) { .container { width: 90%; } .input-box, .submit-btn { padding: 12px; } h2 { font-size: 20px; } }
    </style> 
</head> 
<body> 
    <div class="container"> 
        <div class="card" id="card"> 
            <!-- Login Form --> 
            <div class="card-front"> 
                <h2>LOGIN</h2> 
                <form action="#" method="post"> 
                    <input type="email" class="input-box" placeholder="example@mail.com" name="email" required> 
                    <input type="password" class="input-box" placeholder="Password" name="password" required> 
                    <a href="forgotpassword.php">Forgot Your Password</a> 
                    <button type="submit" class="submit-btn" name="login">LOGIN</button> 
                </form> 
                <button type="button" class="btn" onclick="openRegister()">I'm New Here</button> 
            </div> 

            <!-- Signup Form --> 
            <div class="card-back"> 
                <h2>SIGNUP</h2> 
                <form action="#" method="post"> 
                    <input type="text" class="input-box" placeholder="Enter your name" name="full_name" required> 
                    <input type="email" class="input-box" placeholder="Enter your email" name="email" required> 
                    <input type="number" class="input-box" placeholder="Enter your phone number" name="phone" required> 
                    <input type="text" class="input-box" placeholder="Enter your address" name="address" required> 
                    <input type="password" class="input-box" placeholder="Enter your password" name="password" required> 
                    <input type="password" class="input-box" placeholder="Confirm your password" name="signup_cpassword" required> 
                    <button type="submit" class="submit-btn" name="signup">SIGNUP</button> 
                </form> 
                <button type="button" class="btn" onclick="openLogin()">I've an account</button> 
            </div> 
        </div> 
    </div> 

    <script> 
        var card = document.getElementById("card"); 
        function openRegister() { card.style.transform = "rotateY(-180deg)"; }
        function openLogin() { card.style.transform = "rotateY(0deg)"; } 
    </script> 
</body> 
</html>
