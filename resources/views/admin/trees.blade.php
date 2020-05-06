@extends('layouts.admin')
@section('content')

    <div class="col-lg-12">
        <div class="card">
            <table class="table table-striped w-100">
                <tr>
                    <td></td>
                </tr>
                @foreach($trees as $tree)
                <tr>
                    <td>
                        <a href="{{route('admin.MainTree',$tree['id'])}}">{{$tree['id']}}</a>
                    </td>
                    <td>
                        {{$tree->login}}
                    </td>
                    <td>
                        {{$tree->phone}}
                    </td>
                    <td>
                        {{$tree->name}}
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
        {{$trees->links()}}
    </div>


    @endsection
