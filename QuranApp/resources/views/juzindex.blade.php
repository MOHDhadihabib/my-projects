<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Juz Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f9f9f9;
        }
        h1 {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Quran Juz Index</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Juz Number</th>
                    <th>Read Juz</th>
                </tr>
            </thead>
            <tbody>
                @foreach($juzCollection as $juz)
                <tr>
                    <td>{{ $juz['number'] }}</td>
                    <td>{{ $juz['number'] }}</td>
                    <td><a href="/indexjuzread/{{$juz['number']}}" class="btn btn-primary">Read Juz</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
