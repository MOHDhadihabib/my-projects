<?php
session_start();
include 'config.php';

// Check if the user is logged in
if (!isset($_SESSION["id"])) {
    echo "You need to log in first.";
    exit();
}

$id = $_SESSION["id"]; // Get the user ID from session
$query = "SELECT * FROM users WHERE id='$id'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    // Fetch user data
    $row = $result->fetch_assoc();
    $full_name = $row['full_name'];
    $email = $row['email'];
    $phone = $row['phone'];
    $address = $row['address'];
} else {
    // Handle case where no user was found
    echo "No user found.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
        }

        .profile-container {
            width: 80%;
            max-width: 900px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .profile-header {
            display: flex;
            align-items: center;
            border-bottom: 1px solid #ddd;
            padding-bottom: 20px;
            margin-bottom: 20px;
        }

        .profile-image {
            flex-shrink: 0;
            width: 150px;
            height: 150px;
            border-radius: 50%;
            overflow: hidden;
            margin-right: 20px;
        }

        .profile-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .profile-details h2 {
            font-size: 24px;
            color: #333;
        }

        .profile-details p {
            font-size: 18px;
            color: #777;
        }

        .profile-info h3 {
            margin-bottom: 10px;
            font-size: 20px;
            color: #333;
        }

        .profile-info p {
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .profile-info ul {
            list-style: none;
        }

        .profile-info ul li {
            margin-bottom: 10px;
        }

        .profile-info ul li strong {
            color: #555;
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <div class="profile-header">
            <div class="profile-image">
                <img src="avatar.png" alt="User Avatar"> <!-- Use dynamic profile picture here if available -->
            </div>
            <div class="profile-details">
                <h2><?php echo htmlspecialchars($full_name); ?></h2>
                <p>Software Developer</p> <!-- This can also be dynamic if you have a field for it -->
            </div>
        </div>

        <div class="profile-info">
            <h3>About Me</h3>
            <p>
                Passionate developer with expertise in web development and a love for building interactive applications.
            </p>

            <h3>Personal Information</h3>
            <ul>
                <li><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></li>
                <li><strong>Phone:</strong> <?php echo htmlspecialchars($phone); ?></li>
                <li><strong>Location:</strong> <?php echo htmlspecialchars($address); ?></li>
            </ul>
        </div>
    </div>
</body>
</html>
