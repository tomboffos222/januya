@extends('layouts.base')

@section('content')
    <div id="carouselExampleControls" class="carousel slide w-100 h-auto" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active " style="background-image: url('{{asset('admin-vendor/images/camry.png')}}')">
                <div class="d-flex justify-content-center align-items-center text-center carousel_text flex-column">
                    <h5>Потребительский кооператив «JANUYA»</h5>
                    <div class="delimiter"></div>
                    <h3>
                        Мечтаете о собственном автомобиле <br> в рассрочку до 2 лет
                    </h3>
                    <button class="">
                        Получить консультацию
                    </button>
                </div>
            </div>
            <div class="carousel-item" style="background-image: url('{{asset('admin-vendor/images/building.png ')}}')">
                <div class="d-flex justify-content-center align-items-center text-center carousel_text flex-column">
                    <h5>Потребительский кооператив «JANUYA»</h5>
                    <div class="delimiter"></div>
                    <h3>
                        Своё собственное жилье <br> в рассрочку до 10 лет
                    </h3>
                    <button class="">
                        Получить консультацию
                    </button>
                </div>
            </div>

        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="container about">
        <div class="row">
            <div class="col-lg-6">
                <h3>О кооперативе</h3>
                <h1>
                    Что такое кооператив?
                </h1>
                <p>
                    Кооператив –это общественная организация, <br>
                    добровольное объединение граждан с целью оказания <br>
                    взаимопомощи друг другу в приобретении недвижимого <br>
                    имущества.
                </p>
                <p>
                    Мы даем 100% гарантии со стороны законодательства и все наши отношения закрепляются договорами.
                </p>
                <h2>
                    Потребительский кооператив «JANUYA»
                </h2>
                <p>
                    Потребительский кооператив «JANUYA», является некоммерческим объединением граждан с целью приобретения жилья, в котором право Собственности на жилье принадлежит Пайщику.
                </p>
                <button class="btn ">
                    Узнать больше
                </button>
            </div>
            <div class="col-lg-6">

                <img src="{{asset('admin-vendor/camry_building.png')}}" alt="" class="w-100 ml-auto">

            </div>
        </div>
    </div>
    <div class="cards" >
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    Расчеты программ
                </div>
                <div class="col-lg-3" >
                    <div class="card w-100" style="background-image:url('{{asset('admin-vendor/images/back_card.png')}}')">
                        <div class="">
                            <div class="d-flex justify-content-between align-items-center card_inner">
                                <h2 class="numeric">
                                    01
                                </h2>
                                <div class="title">
                                    НАРОДНАЯ программа.
                                </div>

                            </div>
                            <hr>
                            <p class="text">
                                НОВАЯ Жилищная программа от кооператива
                                JANUYA (альтернативная версия- Арендное
                                жилье с последующим ВЫКУПОМ)<br>
                                Условия (что надо объяснить пайщику) <br>
                                ✔НАРОДНАЯ программа. <br>
                                1. Первоначальный взнос 0% <br>
                                2. Система накоплений 6 месяцев
                                (создаем свою платёжную историю клиента)
                                по 50 тысяч тенге ОБЯЗАТЕЛЬНО! <br>
                                3. Единоразовая комиссия 300 000 тг невозвратная. <br>
                                4. После накоплений предоставляется квартира с правом выкупа. <br>
                                5. Ежемесячный платёж после заселения составляет примерно 100 000 тг <br>
                                6. Срок погашения займа до 10 лет <br>
                                7. Есть возможность выкупить квартиру досрочно без переплат. <br>
                                8. В случае расторжения договора до получения недвижимости будет возврат накопленных денежных средств.
                                <br>
                                9. Вы не теряете ни деньги ни время. <br>
                                10. Выгодно чем ипотека под низкий процент <br>
                                11. Стоимость одного договора до  10 млн. <br>
                                12. Квартиры предоставляются кооперативом!
                            </p>
                            <button>
                                Узнать больше
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card w-100" style="background-image:url('{{asset('admin-vendor/images/back_card2.png')}}')">
                        <div class="">
                            <div class="d-flex justify-content-between align-items-center card_inner">
                                <h2 class="numeric">
                                    02
                                </h2>
                                <div class="title">
                                    Программа №1. <br> «Киели Шанырак»
                                </div>

                            </div>
                            <hr>
                            <p class="text">
                                Сумма финансирования от 3 000 000 тг
                                до 25 000 000 тг.
                                К примеру: Вы хотите приобрести жилье
                                стоимостью 10 000 000 тг. <br>
                                <br>

                                Вступительный взнос в кооператив 5% от
                                стоимости недвижимости 500 000 тг.
                                Первоначальный взнос от стоимости
                                недвижимости 20% это 2 000 000тенге.
                                Ежемесячный членский взнос 5 000 тг. <br>
                                <br>
                                После приобретения недвижимости стоимостью 10 000 000 тенге условия будут следующими: • Ежемесячный платеж на срок 84 месяца - 100 238 тенге. Недвижимость оформляется на имя пайщика при этом находится в залоге у Кооператива до полного погашения займа.
                            </p>
                            <button>
                                Узнать больше
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card w-100" style="background-image:url('{{asset('admin-vendor/images/back_card3.png')}}')">
                        <div class="">
                            <div class="d-flex justify-content-between align-items-center card_inner">
                                <h2 class="numeric">
                                    03
                                </h2>
                                <div class="title">
                                    Программа №2. <br> «Киели Баспана»
                                </div>

                            </div>
                            <hr>
                            <p class="text">
                                Сумма финансирования от 3 000 000 тг
                                до 20 000 000 тг.
                                К примеру: Вы хотите приобрести жилье стоимостью 10 000 000 тг. <br>
                                <br>
                                Вступительный взнос в кооператив 5% от
                                стоимости недвижимости 500 000 тг.
                                Первоначальный взнос от стоимости недвижимости
                                50% 5 000 000тенге. Ежемесячный членский взнос 5 000 тг. <br>
                                <br>
                                После приобретения недвижимости стоимостью 10 000 000 тенге условия будут следующими: • Ежемесячный платеж на срок 72 месяца - 74 444 тенге. Недвижимость оформляется на имя пайщика при этом находится в залоге у Кооператива до полного погашения займа.
                            </p>
                            <button>
                                Узнать больше
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card w-100" style="background-image:url('{{asset('admin-vendor/images/back_card.png')}}')">
                        <div class="">
                            <div class="d-flex justify-content-between align-items-center card_inner">
                                <h2 class="numeric">
                                    04
                                </h2>
                                <div class="title">
                                    Программа №3 «Тулпар»
                                </div>

                            </div>
                            <hr>
                            <p class="text">
                                Сумма финансирования от 2 000 000 тг
                                до 6 000 000 тг.
                                К примеру: Вы хотите приобрести автомобиль
                                стоимостью 2 000 000 тг. в рассрочку. <br> <br>
                                7 % единоразовая комиссия от стоимости автомобиля 140 000 тг. <br> <br>
                                Ежемесячный членский взнос 5000 тг.
                                Первоначальный взнос от стоимости
                                автомобиля 30% 600 000тенге. <br> <br>
                                После приобретения автомобиля
                                стоимостью 2 000 000 тг. условия будут
                                следующими: <br> <br>
                                Ежемесячный платеж на срок 24 месяцев – 63 333. Ежемесячный членский взнос 5 000 тг. Автомобиль оформляется на имя пайщика при этом находится в залоге у Кооператива до полного погашения займа.
                            </p>
                            <button>
                                Узнать больше
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="conditions">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <img src="" alt="">
                </div>
                <div class="col-lg-4"><img src="{{asset('admin-vendor/images/uslovia_1.png')}}" alt="" class="w-100"></div>
                <div class="col-lg-4"><img src="{{asset('admin-vendor/images/uslovia_2.png')}}" alt="" class="w-100"></div>
                <div class="col-lg-4"><img src="{{asset('admin-vendor/images/uslovia_3.png')}}" alt="" class="w-100"></div>
                <div class="col-lg-4"><img src="{{asset('admin-vendor/images/uslovia_4.png')}}" alt="" class="w-100"></div>
                <div class="col-lg-4"><img src="{{asset('admin-vendor/images/uslovia_5.png')}}" alt="" class="w-100"></div>
                <div class="col-lg-4"><img src="{{asset('admin-vendor/images/uslovia_6.png')}}" alt="" class="w-100"></div>
                <div class="col-lg-4"><img src="{{asset('admin-vendor/images/uslovia_7.png')}}" alt="" class="w-100"></div>
                <div class="col-lg-4"><img src="{{asset('admin-vendor/images/uslovia_8.png')}}" alt="" class="w-100"></div>
                <div class="col-lg-4"><img src="{{asset('admin-vendor/images/uslovia_9.png')}}" alt="" class="w-100"></div>
            </div>
        </div>
    </div>

    <style>
        .carousel{
            height: 588px;
            z-index: 0;
            position: relative;
            top: -20px;
        }
        .carousel-item{
            height: 588px;
            background-size: cover;
        }
        .carousel-item>div{
            background: rgba(255, 255, 255, 0.75);
            width: 100%;
            height: 100%;
        }

    </style>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@endsection
