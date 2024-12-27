
@extends('layouts.form')

@section('header')
    <div class="header">
        <a href='#logo1'>
            <div class="logo">
                <img src="img/logo.png" width="200" height="44">
            </div>
        </a>
        <div class="jak">
            <a href="#section1">о нас</a>
            <a href="#section2">перечень услуг</a>
            <a href="#section3">заказ</a>
        </div>
    </div>

    <form method="post" action="/home">
        @csrf
        <input type="text" name="name" value="{{old('name')}}"  placeholder="Имя">
        <input type="text" name="surename" value="{{old('surename')}}" placeholder="Фамилия">

        <input type="text" name="adress" id="address" value="{{old('adress')}}" placeholder="Адрес">
        {{--            ДЛЯ НИКИТЫ: ДОБАВЬ КЛАССЫ КОТОРЫЕ СНИЗУ, ЧТОБЫ ИЗМЕНИТЬ ПОДСКАЗКИ--}}
        {{--        <div class="suggestions-hint">Выберите вариант ниже или продолжите ввод</div>  --}}
        {{--        <div class="suggestions-suggestion suggestions-selected">...</div>--}}
        {{--        <div class="suggestions-suggestion">...</div>--}}

        <input type="tel" maxlength="16" name="number" id="number"
               title="Введите номер в формате: +7(123) 456-7890" placeholder="Телефон" required
               value="{{old('number')}}">
        <input type="email" name="email" value="{{old('email')}}" placeholder="Почта">
        <select type="text" name="service_id">
            @foreach($services as $service)
                <option value="{{$service->id}}">{{$service->name}}</option>
            @endforeach
        </select>
        <input type="text" name="note" value="{{old('note')}}" placeholder="Коментарий">
        <button type="submit">Отправить </button>
    </form>
    <footer class="footer">
        <div class="footer-content">
            <p>Телефон для обратной связи: <a href="tel:+1234567890">+1234567890</a></p>
            <p>Email: <a href="mailto:example@mail.ru">example@mail.ru</a></p>
        </div>
    </footer>
@endsection
