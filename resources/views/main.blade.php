<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Кадастр Саранск</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/suggestions-jquery@22.6.0/dist/js/jquery.suggestions.min.js"></script>
    <script src="js/address-autocomplete.js"></script>
</head>
<body>
<!-- Header -->
<header class="bg-light shadow-sm py-3">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="logo d-flex align-items-center">
            <img src="img/logo.png" alt="Логотип" class="me-2" style="height: 100px;">
        </div>
        <nav>
            <ul class="nav">
                <li class="nav-item"><a href="#section1" class="nav-link text-dark">О нас</a></li>
                <li class="nav-item"><a href="#section2" class="nav-link text-dark">Услуги</a></li>
                <li class="nav-item"><a href="#section3" class="nav-link text-dark">Заказ</a></li>
            </ul>
        </nav>
    </div>
</header>

<!-- Hero Section -->
<section class="hero bg-primary text-white text-center py-5">
    <div class="container">
        <h1 class="display-4">Кадастровые работы</h1>
        <p class="fs-5">Всем, кто имеет дело с недвижимостью – от 1 небольшого объекта</p>
        <button class="btn btn-light btn-lg mt-3">Получить консультацию</button>
    </div>
</section>

<!-- О нас -->
<section id="section1" class="py-5">
    <div class="container d-md-flex align-items-center">
        <div class="w-50">
            <h2 class="mb-4">О нас</h2>
            <p>Кадастровые работы — это выполнение услуг по подготовке информации и определения недвижимости в качестве индивидуально-определенной вещи. Это и геодезические измерения, и сбор необходимых документов и сведений, и составление новых документов.</p>
            <p>Кратко, это действия уполномоченных лиц по получению сведений об объектах недвижимости, необходимых для постановки на кадастровый учет.</p>
        </div>
        <img src="img/o_nas.jpg" alt="О нас" class="w-50 rounded shadow-sm ms-md-4">
    </div>
</section>

<!-- Услуги -->
<section id="section2" class="py-5 bg-light">
    <div class="container text-center">
        <h2 class="mb-4">Услуги, которые мы предлагаем</h2>
        <p class="mb-4">Выберите услугу, которая подходит под решение ваших задач</p>
        <div class="row">
            @foreach($services as $service)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm">
                        <img src="{{$service->image}}" alt="Услуга" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">{{$service->name}}</h5>
                            <p class="card-text">{{$service->text}}</p>
                            <p class="text-primary fw-bold">от {{$service->price}} руб.</p>
                            <button class="btn btn-primary">Выбрать</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Заказ -->
<section id="section3" class="py-5">
    <div class="container">
        <h2 class="text-center mb-4">Закажите консультацию</h2>
        <form method="post" action="{{route('main_create')}}" class="mx-auto" style="max-width: 600px;">
            @csrf
            <div class="mb-3">
                <input type="text" name="name" placeholder="Имя" class="form-control">
            </div>
            <div class="mb-3">
                <input type="text" name="surename" placeholder="Фамилия" class="form-control">
            </div>
            <div class="mb-3">
                <input type="text" name="adress" id="address" placeholder="Адрес" class="form-control">
            </div>
            <div class="mb-3">
                <input type="tel" name="number" id="phone" placeholder="+7 ___ ___ __ __" class="form-control">
            </div>
            <div class="mb-3">
                <input type="email" name="email" placeholder="Электронная почта" class="form-control">
            </div>
            <div class="mb-3">
                <select name="service_id" class="form-select">
                    @foreach($services as $service)
                        <option value="{{$service->id}}">{{$service->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <input type="text" name="note" placeholder="Примечание" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary w-100">Отправить</button>
        </form>
    </div>
</section>

<!-- Footer -->
<footer class="bg-dark text-white py-4">
    <div class="container text-center">
        <p>Телефон для связи: <a href="tel:+1234567890" class="text-white">+1234567890</a></p>
        <p>Email: <a href="mailto:example@mail.ru" class="text-white">example@mail.ru</a></p>
    </div>
</footer>
<script>
    $(document).ready(function() {
        $('#phone').mask('+7 (000) 000-00-00');
    });
</script>
</body>
</html>
