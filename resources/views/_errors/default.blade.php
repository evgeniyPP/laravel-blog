<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ошибка</title>
    <style>
        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            color: #b0bec5;
            display: table;
            font-weight: 100;
            font-family: sans-serif;
        }
        
        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .title {
            font-size: 72px;
            margin-bottom: 40px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="content">
            <div class="title">
                <span>{{ $errorCode or '500' }}</span>
                {{ $errorMessage or 'Внутренняя ошибка сервера' }}
            </div>
        </div>
    </div>
</body>
</html>