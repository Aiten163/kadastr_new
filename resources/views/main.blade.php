<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная страница</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Подключаем jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Подключаем плагин для маски -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/suggestions-jquery@22.6.0/dist/js/jquery.suggestions.min.js"></script>
    <script src="js/address-autocomplete.js"></script>
</head>
<body>
<!-- Header-->
<div class="header">
    <div class="logo-container">
        <img src="img/logo.png" alt="Логотип" class="logo">
    </div>
    <div class="jak">
        @auth
            <a href="/admin">Админ панель</a>
        @endauth
        <a href="#section1">о нас</a>
        <a href="#section2">перечень услуг</a>
        <a href="#section3">заказ</a>
    </div>
</div>
<!-- Начало -->
<div class="nach">
    <div class="nach_text">
        <h1>
            <b>Кадастровые работы</b>
        </h1>
        <h2>
            Всем, кто имеет дело с недвижимостью – от 1 небольшого объекта
        </h2>
        <button class="zakaz_1">
            Получить консультацию
        </button>
    </div>
</div>
<!--о нас-->
<div id="section1">
    <div class="secnion1_container">
        <p>Кадастровые работы — это выполнение услуг по подготовке информации и определения недвижимости в качестве индивидуально-определенной вещи. Это и геодезические измерения, и сбор необходимых документов и сведений, и составление новых документов.</p>
        <p>Если кратко, кадастровые работы можно охарактеризовать как действия уполномоченных на то лиц по получению сведений об объектах недвижимости, необходимых для постановки на кадастровый учет. Любой объект недвижимости, будь то участок земли, дом, хозяйственное строение, гараж, баня и т.п., одним словом, все что фундаментально связано с землей, является объектом кадастровой работы.</p>
    </div>
    <img src="/img/o_nas.jpg" width="400" height="350">
</div>
<!--Перечень услуг-->
<div class="container" id="section2">
    <h1 id="glav">Услуги, которые мы предлагаем</h1>

    <p>Выберите услугу, которая подходит под решение ваших задач</p>
    <div class="grid">
        @foreach($services as $service)
            <div class="card">
                <div class="icon"><img src="{{$service->image}}" alt="Icon 1"></div>
                <h2>{{$service->name}}</h2>
                <p id="opi">{{$service->text}}</p>
                <p id="cena"><b>от {{$service->price}} руб.</b></p>
                <button class="choose-button">Выбрать</button>
            </div>
        @endforeach
    </div>
</div>
<!--ЗАКАЗ-->
<h2 id="section3" class="zak"></h2>
<form method="post" action="{{route('main_create')}}" class="order-form">
    @csrf
    <input type="text" name="name" placeholder="Имя" class="form-input">
    <input type="text" name="surename" placeholder="Фамилия" class="form-input">
    <input type="text" name="adress" id="address" placeholder="Адрес" class="form-input">
    <input type="tel" name="number" id="phone" placeholder="+7 ___ ___ __ __" class="form-input">
    <input type="email" name="email" placeholder="Электронная почта" class="form-input">
    <select name="service_id" class="form-select">
        @foreach($services as $service)
            <option value="{{$service->id}}">{{$service->name}}</option>
        @endforeach
    </select>
    <input type="text" name="note" placeholder="Примечание" class="form-input">
    <button type="submit" class="submit-button">Отправить</button>
</form>

<!-- Footer -->
<footer class="footer">
    <div class="footer-content">
        <p>Телефон для обратной связи: <a href="tel:+1234567890">+1234567890</a></p>
        <p>Email: <a href="mailto:example@mail.ru">example@mail.ru</a></p>
    </div>
</footer>
<script>
    $(document).ready(function(){
        $('#phone').mask('+7 (999) 999-99-99');
    });
</script>
</body>
</html>
