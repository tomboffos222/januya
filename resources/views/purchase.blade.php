@extends('layouts.base')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-5 ml-auto mr-auto card text-center p-4">
            <h3>
                Для продолжение оплатите 300000 тг
            </h3>
            <button class="btn btn-danger mt-4" onclick="window.location.href='{{route('Prove',$user['id'])}}'">
                Оплатить
            </button>
        </div>
    </div>
</div>

@endsection
