<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Read Juz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Amiri Quran', serif;
            background-color: #f0f4f8;
            padding-top: 30px;
        }
        .container {
            max-width: 900px;
            margin: auto;
        }
        .ayah {
            background-color: #ffffff;
            border: 1px solid #e1e8ed;
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 20px;
        }
        .audio-section {
            margin-top: 40px;
            text-align: center;
        }
        audio {
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="audio-section">
            <h3>تلاوة الجزء</h3>
            <audio controls>
                <source src="{{ $juzAudio }}" type="audio/mpeg">
            </audio>
        </div>

        <h3>النص الكامل للجزء</h3>
        @foreach ($juzData['ayahs'] as $ayah)
        <div class="ayah">
            <p>{{ $ayah['text'] }}</p>
        </div>
        @endforeach
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
