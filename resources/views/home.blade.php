@extends('layouts.base')

@section('content')

    <div class="container">
        <a class="btn btn-primary" href="{{route('RegisterPage')}}">Регистрация</a>
        <a class="btn btn-primary" href="{{route('LoginPage')}}">Войти</a>
    </div>
@endsection
