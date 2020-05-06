@extends('layouts.admin')

@section('content')
    <div class="row">
    @for($i=1  ;$i<=$line;$i++)
    <div class="col-lg-3">
        <a href="{{route('admin.Tree',['userId'=>$user_id ,'tree'=>$i])}}">
            <div class="card text-center d-flex justify-content-center bg-success p-2  align-items-center ">
                <h4 class="">
                    {{$i}} Дерево
                </h4>
            </div>
        </a>

    </div>
    @endfor
    </div>



@endsection
