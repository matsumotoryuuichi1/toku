@extends('layouts.Officelogin')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">従業員登録画面</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                        @foreach($errors->all() as $error )
                            <li>{{$error}}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST"  action="{{route('Office/store')}}">
                    @csrf
                <input name="your_name" class="form-control" type="text" placeholder="お名前を入力してください" aria-label="default input example">
                    <br>
                   <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" value="男性" id="flexRadioDefault1" >
                    <label class="form-check-label" for="flexRadioDefault1">
                        男性
                    </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" value="女性" id="flexRadioDefault2">
                    <label class="form-check-label" for="flexRadioDefault2">
                       女性
                    </label>
                    </div>
                    <select name="section">
                    <option value="">部門を選択してください</option>
                    <option value="営業部">営業部</option>
                    <option value="製造部">製造部</option>
                    <option value="経理部">経理部</option>
                    </select>
                    <br>
                    <br>
                    <input type="checkbox" name="caution" value="1" class="btn-check" id="btn-check-2-outlined"  autocomplete="off">
                    <label class="btn btn-warning" for="btn-check-2-outlined">確認した</label>
                    <br>
                    <input class="btn btn-info" type="submit" value="登録する">
                    </form>
		    <br>
		    <a href="{{route('Office/index')}}"class="btn btn-secondary">従業員一覧へ</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
