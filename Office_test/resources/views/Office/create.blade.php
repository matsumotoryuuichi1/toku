@extends('layouts.Office')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">打刻画面</div>

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




                <form method="POST" action="{{route('Office/start_store')}}">

 <label for="formGroupExampleInput" class="form-label">Example label</label>
  <input type="text" name="your_name" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder">
</div>
 <div class="btn" display: flex;>
 <div class="mb-3">

                @csrf
                <!-- <input class="btn btn-info" type="submit" value="出勤する"> -->

                 <button  class="btn btn-info" data-id="" onclick="deletePost1(this);">出勤する</button>
                <!-- <a href="#" name="start_time"value="start_time" class="btn btn-info" data-id="" onclick="deletePost1(this);">出勤する</a> -->
                </form>

                <br>

                <form method="POST" action="{{route('Office/break_store')}}">
                @csrf

                <!-- <input class="btn btn-success" type="submit" value="休憩する"> -->
                  <button  class="btn btn-success" data-id="" onclick="deletePost2(this);">休憩する</button>
                 <!-- <a href="#" class="btn btn-success" data-id="" onclick="deletePost2(this);">休憩する</a> -->
                </form>

                <br>
                   <?php
                if(!empty($_POST['start_time'])){
                    $start_time=date('H:i');
                     dd($start_time);

                }
                // echo date('H:i');
                ?>


                <form method="POST" action="{{route('Office/return_store')}}">
                @csrf
                 <button  class="btn btn-warning" data-id="" onclick="deletePost3(this);">休憩終了</button>
                </form>
                <br>
                <form method="POST"  action="{{route('Office/reave_store')}}">
                    @csrf
                       <button  class="btn btn-danger" data-id="" onclick="deletePost4(this);">退勤する</button>
                </form>
                </div>
                </div>
                </div>
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

function deletePost2(e) {
    'use strict';
    if(confirm('休憩しますか？')) {
        document.getElementById('delete_'+e.dataset.id).submit();
    }

}


function deletePost3(e) {
    'use strict';
    if(confirm('休憩から戻りますか？')) {
        document.getElementById('delete_'+e.dataset.id).submit();
    }

}


function deletePost4(e) {
    'use strict';
    if(confirm('退勤しますか？')) {
        document.getElementById('delete_'+e.dataset.id).submit();
    }

}

</script>



@endsection
