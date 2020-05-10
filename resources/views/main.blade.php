@extends('layouts.user')


@section('content')
    <div class="row">
        @if($user['status'] == 'registered')
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-warning card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">content_copy</i>
                        </div>
                        <p class="card-category">Ваша должность</p>
                        <h3 class="card-title">{{$user['achievement']}}

                        </h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-success card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">attach_money</i>
                        </div>
                        <p class="card-category">Счет</p>
                        <h3 class="card-title">{{$user['bill']}} KZT</h3>
                    </div>
                    <div class="card-footer">
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-danger card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">info_outline</i>
                        </div>
                        <p class="card-category">Пользователи</p>
                        <h3 class="card-title">{{$children}}</h3>
                    </div>
                    <div class="card-footer">

                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6"></div>
            <div class="col-md-12">
                <div class="card p-4 d-flex">
                    <button class="btn btn-danger copy_button" id="button_copy" onclick="copyToClipboard('#copy_aim')">Скопировать</button>
                    <h3 class="mt-5">
                        Ссылка для реферального консультанта :<a href="{{route('RegConsultant',$user['id'])}}" id="copy_aim"> {{route('RegConsultant',$user['id'])}}</a>
                    </h3>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card p-4 d-flex">
                    <button class="btn btn-danger copy_button" id="button_copy" onclick="copyToClipboard1('#copy_aim1')">Скопировать</button>
                    <h3 class="mt-5">
                        Ссылка для реферального пользователя :<a href="{{route('Registration',$user['id'])}}" id="copy_aim1"> {{route('Registration',$user['id'])}}</a>
                    </h3>
                </div>
            </div>

        @elseif($user['status'] == 'client')
            <div class="col-lg-6 col-md-6">
                <div class="card p-4 bg-success level">
                    Срок оплаты: {{$end}}

                </div>

            </div>
            <div class="col-lg-6 col-md-6">
                <div class="card p-4 bg-danger level">
                    Осталось: {{$differ}} дней
                    <br>

                </div>

            </div>
            <div class="col-lg-6 col-md-6">
                <div class="card p-4 bg-blue level d-flex justify-content-between align-items-center">
                    Оплатить 50000 тг <a href="{{route('PayDebt',$user['id'])}}" class="btn btn-danger" >Оплатить</a>
                </div>
            </div>



        @endif

    </div>


    <script>
        function copyToClipboard(element) {
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val($(element).text()).select();
            document.execCommand("copy");
            $temp.remove();
            $('#button_copy').html('Скопировано')
        }
        function copyToClipboard1(element) {
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val($(element).text()).select();
            document.execCommand("copy");
            $temp.remove();
            $('#button_copy').html('Скопировано')
        }
    </script>
    <style>
        .copy_button{
            position: absolute;
            right: 15px;
            top:5px;
        }
        .level.d-flex{
            flex-direction: row!important;
        }
        .card-title{
            font-size: 18px;
        }
        .level{
            background-color: #00adff;
            color: #fff;
            font-size: 20px;
            display: flex;
            padding: 15px;
        }
        .level b{
            margin-left: 5px;
        }
    </style>
@endsection
