<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to Quran Portal</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background-image: url('https://example.com/quran-background.jpg'); /* Replace with your image */
            background-size: cover;
            background-attachment: fixed;
            color: #fff;
            font-family: 'Arial', sans-serif;
        }
        .overlay {
            background-color: rgba(0, 0, 0, 0.7);
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
        }
        .content {
            position: relative;
            z-index: 2;
            text-align: center;
            margin-top: 150px;
        }
        h1 {
            font-size: 60px;
            margin-bottom: 20px;
        }
        p {
            font-size: 24px;
            margin-bottom: 40px;
        }
        .btn {
            font-size: 18px;
            padding: 10px 30px;
        }
    </style>
</head>
<body>

    <div class="overlay"></div>
    
    <div class="content">
        <h1>Welcome to Quran Portal</h1>
        <p>"Indeed, it is We who sent down the Qur'an and indeed, We will be its guardian." (15:9)</p>
        <a href="/indexsurah/" class="btn btn-light">Explore Quran</a>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
