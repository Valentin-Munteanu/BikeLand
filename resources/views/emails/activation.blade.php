<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activare cont</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .mail-container {
            background-color: #ffffff;
            margin: 50px auto;
            padding: 20px;
            border-radius: 8px;
            max-width: 600px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .mail-container h2 {
            font-size: 24px;
            color: #333333;
            margin-bottom: 20px;
            font-weight: 700;
        }
        .mail-container p {
            font-size: 16px;
            color: #555555;
            line-height: 1.6;
            margin-bottom: 20px;
        }
        .mail-container p strong {
            font-size: 18px;
            color: #000;
        }
        .mail-container a {
            display: inline-block;
            background-color: #007bff;
            color: white;
            padding: 12px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
        }
        .mail-container a:hover {
            background-color: #0056b3;
        }
        .footer {
            margin-top: 30px;
            font-size: 12px;
            color: #999999;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="mail-container">
        <img src="" alt="">
        <h2>Bună, {{ $user['name'] }}!</h2>
        <p>Te rugăm să-ți activezi contul folosind codul de activare de mai jos:</p>
        <p><strong>Cod de activare: {{ $activationCode }}</strong></p>
        <p>Sau accesează linkul următor:</p>
        <a href="{{ route('activate', ['code' => $activationCode]) }}">Activează contul</a>
        <p class="footer">Dacă nu ai solicitat această activare, te rugăm să ignori acest email.</p>
    </div>
</body>
</html>
