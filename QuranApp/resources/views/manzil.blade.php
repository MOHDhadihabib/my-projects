<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Surah {{ $surah['englishName'] }} - Complete Text & Audio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri+Quran&family=Aref+Ruqaa&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Amiri Quran', serif;
            background-color: #f0f4f8;
            padding-top: 30px;
            color: #2c3e50;
        }

        h1 {
            font-family: 'Amiri Quran', serif;
            color: #003366;
            text-align: center;
            margin-bottom: 20px;
        }

        .ayah {
            background-color: #ffffff;
            border: 1px solid #e1e8ed;
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 20px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        }

        .ayah p {
            font-size: 1.6rem;
            line-height: 2.2;
            text-align: justify;
            color: #34495e;
        }

        .audio-section {
            margin-top: 40px;
            text-align: center;
        }

        audio {
            width: 100%;
            max-width: 550px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .back-btn {
            text-align: center;
            margin-top: 20px;
        }

        .back-btn a {
            color: #fff;
            background-color: #007bff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }

        .back-btn a:hover {
            background-color: #0056b3;
        }

    </style>
</head>

<body>
    <div class="container">
        <h1>Surah {{ $surah['englishName'] }} - {{ $surah['englishNameTranslation'] }}</h1>

        <div class="audio-section">
            <audio controls>
                <source src="{{ $surahAudio }}" type="audio/mpeg">
            </audio>
        </div>

        <!-- Ayah by ayah text -->
        @foreach($surah['ayahs'] as $ayah)
        <div class="ayah">
            <p>{{ $ayah['text'] }}</p>
        </div>
        @endforeach

        <div class="back-btn">
            <a href="/">Back to Surah Index</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW
