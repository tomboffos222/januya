@extends('layouts.base')
@section('content')
<div class="container contacts">
    <div class="row">
        <div class="col-lg-12 mb-4">
            <h1>Контакты</h1>
            <hr>
        </div>
        <div class="col-lg-3 text-center"><img src="{{asset('admin-vendor/images/home_icon.png')}}" alt="">
            <h5>
                Адрес Нур-Султан

            </h5>
            <p>
                г. Нур-Султан, ул. Кенесары 40, БЦ 7 Континент, 14 этаж, офис 1422

            </p>
            <p>
                <a href="tel:87011019190">8 701 101-91-90</a> <br>
                <a href="tel:87001019190">8 700 101-91-90</a> <br>
                <a href="tel:87751375187">8 775 137 51 87</a> Серик
            </p>
            <p>
                <a href="">Januya.kz@mail.ru</a>
            </p>
            <p>
                Режим работы <br>
                пн-пт: 09:00 - 18:00 <br>
                сб: 09:00 - 13:00, вс выходной
            </p>
        </div>
        <div class="col-lg-3 text-center"><img src="{{asset('admin-vendor/images/home_icon.png')}}" alt="">
            <h5>
                Адрес Алматы

            </h5>
            <p>
                г . Алматы ул. Кунаева 38/61 угол Макатаева БЦ "Жарсу" офис 313

            </p>
            <p>
                <a href="tel:87024013668">8 702 401-36-68</a>  Жанна <br>
                <a href="tel:87472885089">+7 747 288 5089</a>  Махаббат <br>
                <a href="tel:87770203336">+ 7 777 020 3336</a>  Балауса <br>
                <a href="tel:87758084785">+7 775 808 4785</a>  Баян <br>
                <a href="tel:87759441107">+ 7 775 944 1107</a>  Эльвира
            </p>
            <p>
                Режим работы <br>
                пн-пт: 09:00 - 18:00 <br>
                сб: 09:00 - 13:00, вс выходной
            </p>
        </div>
        <div class="col-lg-3 text-center"><img src="{{asset('admin-vendor/images/home_icon.png')}}" alt="">
            <h5>
                Адрес Караганда

            </h5>
            <p>
                г. Караганда, ул Ерубаева 32, офис 1

            </p>
            <p>
                <a href="tel:87009887995">8 700 988-79-95</a> Сандугаш Караганда

            </p>
            <p>
                Режим работы <br>
                пн-пт: 09:00 - 18:00 <br>
                сб: 09:00 - 13:00, вс выходной
            </p>
        </div>
        <div class="col-lg-3 text-center"><img src="{{asset('admin-vendor/images/home_icon.png')}}" alt="">
            <h5>
                Адрес Шымкент

            </h5>
            <p>
                г. Шымкент, пр. Тауке хана 106

            </p>
            <p>
                <a href="tel:87077557885">+7 707 755 7885</a> Гульжан <br>
                <a href="tel:87078135890">+7 707 813 5890</a> Жанар
            </p>
            <p>
                Режим работы <br>
                пн-пт: 09:00 - 18:00 <br>
                сб: 09:00 - 13:00, вс выходной
            </p>
        </div>
    </div>
</div>

<style>
    .contacts{
        margin-top: 50px;
    }
    .contacts p{
        font-size: 18px;
        color: #636565;
        line-height: 1.6;
    }
    .contacts p a{
        color: #E31E25;
        text-decoration: underline;
    }
    .contacts h5{
        font-size: 21px !important;
        font-weight: 400 !important;
        margin-top: 20px;
    }
</style>
@endsection
