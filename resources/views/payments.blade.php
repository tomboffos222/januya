@extends('layouts.user')
@section('content')

    <div class="row">
        <div class="col-lg-12 overflow-scroll card pl-0 pr-0 mt-1">
            <div class="text-center">
                <h3>
                    История оплат
                </h3>
            </div>
            <table class="table table-striped w-100">
                <thead>
                <tr>
                    <td>Сумма</td>

                    <td>Дата оплаты</td>
                    <td>Статус</td>

                </tr>
                </thead>
                <tbody>
                @foreach($debts as $debt)
                    <tr>
                        <td>{{$debt->amount}} тг</td>
                        <td>{{$debt->end_time}}</td>
                        <td>
                            @if($debt['status']=='wait')
                                Ожидается оплата
                            @elseif($debt['status']=='ok')
                                Оплачено

                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>

        </div>

    </div>
@endsection
