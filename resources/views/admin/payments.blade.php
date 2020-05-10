@extends('layouts.admin')
@section('content')


    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex justify-content-end">
                <button class="btn btn-primary" onclick="window.location.href='{{route('admin.Payments')}}'">
                    Скачать
                </button>
            </div>
        </div>
        <div class="col-lg-12 card pl-0 pr-0">
            <table class="table table-striped w-100" >
                <tr>
                    <th>
                       Id пользователя
                    </th>
                    <th>
                        Описание
                    </th>
                    <th>
                        Сумма оплаты
                    </th>
                    <th>
                        Доступная сумма
                    </th>

                </tr>
                @foreach($payments as $payment)
                    <tr>
                        <td>{{$payment->user_id}}</td>
                        <td>
                            {{$payment->description}}
                        </td>
                        <td>
                            {{$payment->amount}}
                        </td>
                        <td>
                            @if($payment->profit == null)
                                {{$payment->amount}}
                            @else
                                {{$payment->profit}}
                            @endif
                        </td>
                    </tr>
                @endforeach
                {{$payments->links()}}
            </table>
        </div>
    </div>


@endsection
