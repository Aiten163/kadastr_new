<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Новый заказ</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card mt-4">
                <div class="card-body">
                    <h2 class="card-title">Новый заказ</h2>
                    <p class="card-text">Получен новый заказ с информацией о клиенте и заказе:</p>
                    <ul class="list-unstyled">
                        <li><strong>Имя:</strong> {{ $data['name'] }}</li>
                        <li><strong>Фамилия:</strong> {{ $data['surename'] }}</li>
                        <li><strong>Номер телефона:</strong> {{ $data['number'] }}</li>
                        <li><strong>Адрес:</strong> {{ $data['adress'] }}</li>
                        <li><strong>Почта:</strong> {{ $data['email'] }}</li>
                        <li><strong>Услуга:</strong> {{ $data["service_id"] }}</li>
                        <li><strong>Комментарий:</strong> {{ $data['note'] }}</li>
                    </ul>
                    <p>Пожалуйста, обработайте этот заказ как можно скорее.</p>
                    <p>Спасибо!</p>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
