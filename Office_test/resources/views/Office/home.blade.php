@extends('layouts.0fficehome')

@section('content')
<div class="container">
    <div class="row justify-content-center">



  <img class="homeiamge" src="/images/office1.jpg" alt="logo">


        <div class="col-md-12">

            <!-- <div class="card"> -->




                <div class="card-body" style="border:solid none;">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                 <a class="btn btn-secondary" href="{{route('Office/index')}}">管理画面</a>
                 <a class="btn btn-primary" href="{{route('Office/start_create')}}">出勤画面</a>
                 <a class="btn btn-success" href="{{route('Office/break_create')}}">休憩画面</a>
                 <a class="btn btn-warning" href="{{route('Office/return_create')}}">戻り画面</a>
                 <a class="btn btn-danger" href="{{route('Office/reave_create')}}">退勤画面</a>

                </div>
            <!-- </div> -->
        </div>
    </div>
</div>
@endsection
