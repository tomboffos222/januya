@extends('layouts.base')

@section('content')
    <div class="container">
       <div class="row">

          <div class="col-lg-5 ml-auto mr-auto m-t-100">
              <!-- Material form login -->
              <div class="card p-4 text-center">
                  <button class=" btn mb-5 btn-danger back" onclick="window.location.href='{{route('Home')}}'">
                        <i class="material-icons">arrow_back</i>

                  </button>
                  <h2>
                      Войти в приборную панель
                  </h2>
                  <form action="{{route('Login')}}" class="form" method="post">
                      {{csrf_field()}}

                      <div class="form-group">
                          <label for="login">Введите ваш логин</label>
                          <input type="text" class="form-control" name="login" placeholder="Логин" id="login">
                      </div>
                      <div class="form-group">
                          <label for="password">Введите ваш пароль</label>
                          <input type="password" name="password" id="password" class="form-control" placeholder="Пароль">
                      </div>
                      <div class="form-group d-flex justify-content-center">
                          <input type="submit" value="Войти" class="btn btn-success ">
                      </div>
                  </form>
                  <div class="mt-2">
                      <a href="{{route('RegisterPage')}}" class="font-20 ">Зарегистрироваться?</a>
                  </div>

              </div>

              <!-- Material form login -->
          </div>
       </div>
    </div>
    <style>
        .back.btn{
            position: absolute;
            width: 30px !important;
            border-radius: 50% !important;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0px;
            height:30px;


        }
        .btn:not(.btn-link):not(.btn-circle) i{
            top:0px;
        }
    </style>
@endsection


@push('cs')

    <style>

        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
@endpush
