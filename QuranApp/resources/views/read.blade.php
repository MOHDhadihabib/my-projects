<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Beautiful Surah Display</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri+Quran&family=Aref+Ruqaa&display=swap" rel="stylesheet">
    <style>
       body {
            font-family: 'Amiri Quran', serif;
            direction: rtl;
            background-color: #f0f4f8;
            padding-top: 30px;
            color: #2c3e50;
        }
        .container {
            max-width: 900px;
            margin: auto;
        }
        h3 {
            color: #1abc9c;
            font-size: 2rem;
            margin-bottom: 20px;
            text-align: center;
            font-family: 'Aref Ruqaa', serif;
        }
        .ayah {
            background-color: #ffffff;
            border: 1px solid #e1e8ed;
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 20px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .ayah:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
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
        @media (max-width: 768px) {
            .ayah p {
                font-size: 1.3rem;
            }
            h3 {
                font-size: 1.6rem;
            }
            audio {
                max-width: 100%;
            }
        }
        /* Custom dividers */
        .divider {
            height: 4px;
            background-color: #1abc9c;
            border-radius: 10px;
            margin: 40px 0;
        }
    </style>
  </head>
  <body>
    <div class="container">
      <!-- Full surah audio -->
      <div class="audio-section">
        <h3>تلاوة السورة</h3>
        <audio controls>
          <source src="{{ $surahAudio }}" type="audio/mpeg">
        </audio>
      </div>

      <div class="divider"></div>

      <!-- Surah Text -->
      <h3>النص الكامل للسورة</h3>

      <!-- Ayah by ayah text -->
      @foreach ($alldata as $item)
      <div class="ayah">
        <p>{{ $item['text'] }}</p>
      </div>
      @endforeach
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
