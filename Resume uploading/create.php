<?php
include("config.php"); 
$error = "";

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    
    $uploadfile = $_FILES['resume']['name'];
    $tmname = $_FILES['resume']['tmp_name']; 
    $folder = "uploads/" . basename($uploadfile);
    
    $fileType = strtolower(pathinfo($folder, PATHINFO_EXTENSION));

    $allowedTypes = array('doc', 'docx', 'pdf');

    if (in_array($fileType, $allowedTypes)) {
        if (move_uploaded_file($tmname, $folder)) {
            
            if ($name != "" && $email != "" && $folder != "") {
                $sql = "INSERT INTO users (name, email, resume) VALUES ('$name', '$email', '$folder')";

                if (mysqli_query($conn, $sql)) {
                    $error .= "<div class='alert alert-success'>Data inserted successfully!</div>";
                } else {
                    $error .= "<div class='alert alert-danger'>Error inserting data: " . mysqli_error($conn) . "</div>";
                }
            } else {
                $error .= "<div class='alert alert-danger'>All fields are required.</div>";
            }
        } else {
            $error .= "<div class='alert alert-danger'>Failed to upload the file.</div>";
        }
    } else {
        $error .= "<div class='alert alert-danger'>Only DOC, DOCX, and PDF files are allowed.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Resume</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            background-color: #f4f4f4;
            font-family: 'Arial', sans-serif;
            padding: 30px;
        }
        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 0 auto;
        }
        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }
        .form-group {
            margin-top: 20px;
            margin-bottom: 20px;
        }
        .btn-primary {
            background-color: #28a745;
            border: none;
        }
        .btn-primary:hover {
            background-color: #218838;
        }
        .alert {
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Submit Your Information</h2>
        <?php echo $error; ?>
        
        <form action="create.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="resume">Upload Resume:</label>
                <input type="file" class="form-control-file" id="resume" name="resume" accept=".pdf,.doc,.docx" required>
            </div>

            <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
        </form>
    </div>

    <!-- Include Bootstrap JS and dependencies -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
