@extends('layouts.base')

@section('content')
    <div class="container">
       <div class="row">

           <div class="col-md-5 ml-auto mr-auto  card p-5">
               <div class="text-center mb-5">
                   <button class=" btn mb-5 btn-danger back" onclick="window.location.href='{{route('Home')}}'">
                       <i class="material-icons">arrow_back</i>

                   </button>
                   <h2 class="">Регистрация</h2>
               </div>
               <form class=" " action="@if(!isset($clientRef)){{route('RegisterClient')}} @else{{route("Register")}}@endif" method="post">

                   {{csrf_field()}}
                   @if(isset($userId))
                   <div class="form-group ">

                       <input class="form-control" placeholder="Например 123456" type="hidden"  id="bs_id" name="bs_id">
                   </div>
                   @elseif(isset($bs_id))
                       <input type="hidden" name="bs_id" value="{{$bs_id}}">
                   @endif
                   <div class="form-group">
                       <label for="login">Введите ваш Login</label>
                       <input class="form-control" placeholder="Логин" type="text" required id="login" name="login">
                   </div>
                   <div class="form-group">
                       <label for="name">Введите ваше ФИО</label>
                       <input class="form-control" placeholder="ФИО" type="text" required id="name" name="name">
                   </div>
                   <div class="form-group">
                       <label for="email">Введите ваш Email</label>
                       <input class="form-control" type="email" required id="email" name="email" placeholder="Email">
                   </div>
                   <div class="form-group">
                       <label for="zhsn">Введите ваш ИИН</label>
                       <input type="number" class="form-control" required id="zhsn" name="zhsn" placeholder="ИИН">
                   </div>
                   <div class="form-group">
                       <label for="phone">Введите ваш Телефон номер</label>
                       <input class="form-control" type="number" required id="phone" name="phone" placeholder="Телефон">
                   </div>
                   <div class="form-group">
                       <label for="password">Введите ваш пароль</label>
                       <input class="form-control" type="password" required id="password" name="password" placeholder="Пароль">
                   </div>

                   <div class="text-center mt-4">
                       <button class="btn btn-primary " type="submit">Отправить</button>
                   </div>
               </form>
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
