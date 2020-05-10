<!doctype html>
<html lang="en">
@php $user = session()->get('user') @endphp
<head>
    <title>JANUYA</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- Material Kit CSS -->


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="{{asset('assets/css/material-dashboard.css?v=2.1.2')}}" rel="stylesheet" />
</head>

<body>
<div class="wrapper ">
    <div class="sidebar" data-color="danger" data-background-color="white">
        <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
        <div class="logo">
            <a href="" class="simple-text logo-mini">
                JANUYA
            </a>
            <a href="" class="simple-text logo-mini">
                Пользователь : {{$user['login']}}
            </a>

        </div>
        <div class="sidebar-wrapper">
            <ul class="nav">

                <li class="nav-item @if($active == 'main') active @endif ">
                    <a class="nav-link" href="{{route('Main')}}" >
                        <i class="material-icons">dashboard</i>
                        <p>Главная</p>
                    </a>
                </li>
                @if($user['status'] == 'client')
                    <li class="nav-item @if($active=='pays') active @endif" >
                        <a href="{{route('Payments')}}" class="nav-link">
                            <i class="material-icons">attach_money</i>
                            <p>
                                История оплат
                            </p>
                        </a>
                    </li>


                @elseif($user['status'] == 'registered')
                    <li class="nav-item @if($active == 'tree') active @endif">
                        <a href="{{route('MainTree',$user['id'])}}" class="nav-link">
                            <i class="material-icons">details</i>
                            <p>Матрица</p>
                        </a>
                    </li>
                    <li class="nav-item @if($active == 'profits') active @endif" >
                        <a href="{{route('Profits')}}" class="nav-link">
                            <i class="material-icons">attach_money</i>
                            <p>
                                История бонусов
                            </p>
                        </a>

                    </li>
                    <li class="nav-item @if($active == 'withdraws') active @endif" >
                        <a href="{{route('Withdraws')}}" class="nav-link">
                            <i class="material-icons">money</i>
                            <p>
                                Выводы
                            </p>
                        </a>

                    </li>

                @endif
                <li class="nav-item">
                    <a href="{{route('Exit')}}" class="nav-link">
                        <i class="material-icons">exit_to_app</i>
                        <p>
                            Выйти
                        </p>
                    </a>
                </li>
                <!-- your sidebar here -->
            </ul>

        </div>
    </div>
    <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <a class="navbar-brand" href="javascript:;">Панель</a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                </button>

            </div>
        </nav>
        <!-- End Navbar -->
        <div class="content">
            <div class="container-fluid">
                <!-- your content here -->
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
            </div>
        </div>
        <footer class="footer">
            <div class="container-fluid">
                <nav class="float-left">
                    <ul>
                        <li>
                            <a href="https://www.nextin.me">
                                NEXTIN
                            </a>
                        </li>
                    </ul>
                </nav>

                <!-- your footer here -->
            </div>
        </footer>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="{{asset('assets/js/core/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{asset("assets/js/core/popper.min.js")}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/core/bootstrap-material-design.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chartist JS -->
    <script src="{{asset('assets/js/plugins/chartist.min.js')}}"></script>
    <!--  Notifications Plugin    -->
    <script src="{{asset('assets/js/plugins/bootstrap-notify.js')}}"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{asset('assets/js/material-dashboard.js?v=2.1.2')}}" type="text/javascript"></script>
</div>
</body>

</html>
