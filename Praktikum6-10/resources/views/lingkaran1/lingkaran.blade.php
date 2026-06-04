<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perhitungan Lingkaran</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            color: #333;
            padding: 40px;
        }

        .card {
            max-width: 700px;
            margin: 0 auto;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .08);
            padding: 30px;
        }

        h1 {
            margin-bottom: 20px;
            font-size: 28px;
        }

        p {
            margin: 10px 0;
            line-height: 1.75;
        }

        .result {
            background-color: #e9ecef;
            padding: 15px;
            border-radius: 8px;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="card">
        <h1>Perhitungan Lingkaran</h1>
        <p>Jari-jari lingkaran: {{ $r }}</p>
        <div class="result">
            <p><strong>Luas Lingkaran:</strong> {{ number_format($luas, 2) }}</p>
            <p><strong>Keliling Lingkaran:</strong> {{ number_format($keliling, 2) }}</p>
        </div>
    </div>
</body>

</html>