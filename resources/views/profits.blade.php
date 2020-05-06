@extends('layouts.user')
@section('content')

    <div class="row">
        <div class="col-lg-12 overflow-scroll card pl-0 pr-0 mt-1">
            <table class="table table-striped w-100">
                <thead>
                <tr>
                    <td>Сумма</td>
                    <td>Описание</td>
                    <td>Дата получения</td>
                </tr>
                </thead>
                <tbody>
                @foreach($operations as $profit)
                    <tr>
                        <td>{{$profit['amount']}} KZT</td>
                        <td>{{$profit['description']}}</td>
                        <td>{{$profit['created_at']}}</td>
                    </tr>

                @endforeach
                </tbody>

            </table>
            {{$operations->links()}}
        </div>

    </div>
@endsection
