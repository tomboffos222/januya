<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>{{$title ?? 'JANUYA'}}</title>
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" type="image/x-icon">
    <link rel="icon" href="{{asset('images/favicon.png')}}" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{asset('admin-vendor/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{asset('admin-vendor/plugins/node-waves/waves.css')}}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{asset('admin-vendor/plugins/animate-css/animate.css')}}" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="{{asset('admin-vendor/plugins/morrisjs/morris.css')}}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{asset('admin-vendor/css/style.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;700&display=swap" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{asset('admin-vendor/css/themes/all-themes.css')}}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display:wght@400;700&display=swap" rel="stylesheet">


    <link href="{{asset('assets/css/material-dashboard.css?v=2.1.2')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    @stack('css')
</head>

<body>
<div class="overflow-hidden">
    <header>
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex">
                    <div class="d-flex align-items-center phone" >
                        <div class="white_box">
                            <i class="material-icons">phone</i>
                        </div>
                        8 (701) 101 91 90
                    </div>
                    <div class="d-flex align-items-center phone" >
                        <div class="white_box">
                            <i class="material-icons">phone</i>
                        </div>
                        8 (700) 101 91 90
                    </div>
                </div>
                <button class="btn btn_white">
                    Получить консультацию
                </button>
            </div>

        </div>
    </header>
    <div class="container menu_main">
        <div class="d-flex align-items-center">
            <div class="logo_brand">
                <img src="{{asset('admin-vendor/images/logo.png')}}" alt="" class="w-100">
            </div>
            <div class="d-flex menu">
                <a href="{{route('Home')}}" class="@if(isset($main))active @endif">Главная</a>
                <a href="{{route('About')}}" class="@if(isset($about))active @endif">О коорпаративе</a>
                <a href="{{route('Programs')}}" class="@if(isset($programs)) active @endif"> Программы</a>
                <a href="{{route('Questions')}}" class="@if(isset($questions)) active @endif">вопросы и ответы</a>
                <a href="{{route('Documents')}}" class="@if(isset($documents)) active @endif">документы</a>
                <a href="{{route('Contacts')}}" class="@if(isset($contacts)) active @endif"> контакты</a>
            </div>
            <div class="d-flex flex-column align-items-center login_link " >
                <a href="{{route('LoginPage')}}" class="text-center">
                    <img src="{{asset('admin-vendor/images/user.svg')}}" alt="">
                    <br>
                    Войти
                </a>
            </div>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    @yield('content')
    <footer class="text-center">
        Потребительский кооператив «JANUYA»
    </footer>
</div>

<style>
    .alert li{
        font-size: 18px;
    }
</style>
<!-- Jquery Core Js -->
<script
    src="https://code.jquery.com/jquery-2.2.4.min.js"
    integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
    crossorigin="anonymous"></script>
<!-- Bootstrap Core Js -->
<script src="{{asset('admin-vendor/plugins/bootstrap/js/bootstrap.js')}}"></script>

<!-- Select Plugin Js -->
<script src="{{asset('admin-vendor/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>

<!-- Slimscroll Plugin Js -->
<script src="{{asset('admin-vendor/plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>

<!-- Waves Effect Plugin Js -->
<script src="{{asset('admin-vendor/plugins/node-waves/waves.js')}}"></script>

<!-- Jquery CountTo Plugin Js -->
<script src="{{asset('admin-vendor/plugins/jquery-countto/jquery.countTo.js')}}"></script>

<!-- Custom Js -->
<script src="{{asset('admin-vendor/js/admin.js')}}"></script>

<!-- Demo Js -->
<script src="{{asset('admin-vendor/js/demo.js')}}"></script>

@stack('js')

</body>

</html>
