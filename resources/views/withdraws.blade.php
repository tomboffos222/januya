@extends('layouts.user')
@section('content')

    <div class="row">
        <div class="col-lg-12 d-flex">
            <button class="btn btn-success mb-4" data-target="#modal" data-toggle="modal">Сделать вывод</button>
            <button disabled class="btn btn-primary mb-4 ml-4">
                Счет : {{$user['bill']}} kzt
            </button>

        </div>
        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{route('CreateWithdraw')}}" method="get">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Сделать вывод</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>

                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="hidden" name="user_id" value="{{$user['id']}}">
                                <input type="number" name="amount" class="form-control" placeholder="Сумма">
                            </div>
                            <div class="form-group">
                                <input type="text" name="bill" class="form-control" placeholder="Счет">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Отмена</button>
                            <button type="submit" class="btn btn-success">Отправить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <table class="table table-striped w-100">
                <thead>
                <tr>
                    <td>
                        Сумма
                    </td>
                    <td>
                        Карта
                    </td>
                    <td>
                        Статус
                    </td>
                    <td>
                        Дата
                    </td>

                </tr>
                </thead>
                <tbody>
                @foreach($withdraws as $withdraw)
                    <tr>
                        <td>{{$withdraw->amount}}  тг</td>
                        <td>{{$withdraw->bill}}</td>
                        <td>

                            @if($withdraw['status'] == 'wait')
                                В ожиданий
                            @elseif($withdraw['status'] == 'ok')
                                Одобрено
                            @else
                                Отклонено
                            @endif

                        </td>
                        <td>{{$withdraw->created_at}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>



@endsection
