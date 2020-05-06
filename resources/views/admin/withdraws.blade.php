@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <table class="table table-striped w-100">
            <thead>
            <tr>
                <td>
                    Логин пользователя
                </td>
                <td>
                    Телефон
                </td>
                <td>
                    Сумма
                </td>
                <td>
                    Статус
                </td>
                <td>
                    Счет
                </td>
                <td>

                </td>

            </tr>
            </thead>
            <tbody>
            @foreach($withdraws as $withdraw)
            <tr>
                <td>
                    {{$withdraw->login}}
                </td>
                <td>
                    {{$withdraw->phone}}
                </td>
                <td>
                    {{$withdraw->amount}} тг
                </td>
                <td>

                    @if($withdraw['status'] == 'wait')
                        В ожиданий
                    @elseif($withdraw['status'] == 'ok')
                        Одобрено
                    @else
                        Отклонено
                    @endif
                </td>
                <td>
                    {{$withdraw->bill}}
                </td>
                @if($withdraw['status'] == 'wait')
                    <td>
                        <a href="{{route('admin.WithdrawApprove',$withdraw['id'])}}" class="btn btn-success">
                            Одобрить
                        </a>
                        <a href="{{route('admin.WithdrawReject',$withdraw['id'])}}" class="btn btn-danger">
                            Отклонить
                        </a>

                    </td>

                @endif
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-lg-12">
        {{$withdraws->links()}}
    </div>
</div>
@endsection
