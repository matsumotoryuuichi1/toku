@extends('layouts.Office')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">出勤打刻画面</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                <div class="nowdatetime">
                <?php
                $nowdatetime=new DateTime();
                echo $nowdatetime->format('Y年m月d日')."<br>";

                ?>
                </div>
                <p id="RealtimeClockArea">※ここに時計が表示されます。</p>

                <script>
                function set2fig(num) {
                // 桁数が1桁だったら先頭に0を加えて2桁に調整する
                var ret;
                if( num < 10 ) { ret = "0" + num; }
                else { ret = num; }
                return ret;
                }
                function showClock2() {
                var nowTime = new Date();
                var nowHour = set2fig( nowTime.getHours() );
                var nowMin  = set2fig( nowTime.getMinutes() );
                var nowSec  = set2fig( nowTime.getSeconds() );
                var msg = "現在時刻は、" + nowHour + "時" + nowMin + "分" + nowSec + " 秒です。";
                document.getElementById("RealtimeClockArea").innerHTML = msg;
                }
                setInterval('showClock2()',1000);
                </script>
                  @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                        @foreach($errors->all() as $error )
                            <li>{{$error}}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{route('Office/start_store')}}">

                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">社員番号</label>
                    <input type="text" name="office_id" class="form-control" id="formGroupExampleInput" placeholder="社員番号を入力して下さい">
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">名前</label>
                    <input type="text" name="your_name" class="form-control" id="formGroupExampleInput2" placeholder="名前をフルネームで入力して下さい">
                </div>
                 @csrf
                 <button  class="btn btn-info" data-id="" onclick="deletePost1(this);">出勤する</button>
	         <a href="{{route('Office/home')}}"class="btn btn-secondary">ホーム画面へ</a>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function deletePost1(e) {
    'use strict';
    if(confirm('出勤しますか？')) {
        document.getElementById('delete_'+e.dataset.id).submit();
    }

}

</script>

@endsection
