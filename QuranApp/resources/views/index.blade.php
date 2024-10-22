<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Surahs Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri+Quran&family=Aref+Ruqaa&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Aref Ruqaa', serif;
            background-color: #f9f9f9;
        }

        h1, h3 {
            font-family: 'Amiri Quran', serif;
            color: #003366;
            text-align: center;
            margin-bottom: 20px;
        }

        .manzil-link {
            text-align: center;
            margin-bottom: 20px;
        }

        .manzil-link a {
            color: #007bff;
            font-size: 1.5rem;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .manzil-link a:hover {
            color: #0056b3;
        }

        table {
            background-color: #fff;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        th {
            background-color: #003366;
            color: #fff;
            text-align: center;
        }

        td {
            text-align: center;
            font-family: 'Amiri Quran', serif;
            direction: rtl;
        }

        td a {
            color: #fff;
            background-color: #007bff;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            text-decoration: none;
        }

        td a:hover {
            background-color: #0056b3;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            h1 {
                font-size: 1.5rem;
            }

            th, td {
                font-size: 0.9rem;
            }

            td a {
                font-size: 0.8rem;
            }
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h1>Quran Surah Index</h1>


        <h3>"Please select the Surah you wish to listen to or recite."</h3>

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Surah Name</th>
                    <th scope="col">Surah Name Meaning</th>
                    <th scope="col">Surah English Name</th>
                    <th scope="col">Verses</th>
                    <th scope="col">Revelation Type</th>
                    <th scope="col">Read Surah</th>
                </tr>
            </thead>

            <tbody>
                @foreach($collection as $item)
                <tr>
                    <td>{{ $item['number'] }}</td>
                    <td>{{ $item['name'] }}</td>
                    <td>{{ $item['englishNameTranslation'] }}</td>
                    <td>{{ $item['englishName'] }}</td>
                    <td>{{ $item['numberOfAyahs'] }}</td>
                    <td>{{ $item['revelationType'] }}</td>
                    <td><a href="/indexread/{{$item['number']}}" class="btn btn-primary">Read Surah</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>
