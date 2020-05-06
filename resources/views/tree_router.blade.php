@extends('layouts.user')
@section('content')

    <div class="row">
    @for($i=1  ;$i<=$line;$i++)
            <div class="col-lg-3">
                <a href="{{route('Tree',['userId'=>$user_id ,'tree'=>$i])}}">
                    <div class="card text-center d-flex justify-content-center align-items-center p-2 bg-success ">
                        <h4 class="">
                            {{$i}} Дерево
                        </h4>
                    </div>
                </a>

            </div>
    @endfor
    </div>



@endsection
