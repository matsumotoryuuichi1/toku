@extends('layouts.Officeindex')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">従業員一覧</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                <form method="GET" action="{{route('Office/index')}}" class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" name="search" type="search" placeholder="名前で検索する" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">クリック</button>
		    <a class="btn btn-primary" href="{{route('Office/formcreate')}}">従業員を新規登録する</a>
                </form>

           <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">従業員番号</th>
                    <th scope="col">名前</th>
                    <th scope="col">性別</th>
                    <th scope="col"> 部門</th>
                    <th scope="col">登録日時</th>
                    <th scope="col">詳細</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($offices as $send_index)
                    <tr>
                    <td>{{$send_index->id}}</td>
                    <td>{{$send_index->your_name}}</td>
                    <td>{{$send_index->gender}}</td>
                    <td>{{$send_index->section}}</td>
                    <td>{{$send_index->created_at}}</td>
                    <td><a href="{{route('Office/show',['id'=>$send_index->id])}}">当月詳細を見る</a></td>
                    </tr>
                @endforeach
                </tbody>
                </table>

                 {{$offices->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
