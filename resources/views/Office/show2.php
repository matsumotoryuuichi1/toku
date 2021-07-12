@extends('layouts.Officetask')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">当月従業員詳細

                <?php
                $nowdatetime=new DateTime();
                echo $nowdatetime->format('Y年m月d日')."現在"." "."従業員名".":";
                ?>
                {{$offece->your_name}}

                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   <?php

                                    //タイムゾーン設定
                    date_default_timezone_set('Asia/Tokyo');

                    //表示させる年月を設定　↓これは現在の月

		    if (isset($_GET['ym'])) {
			$ym = $_GET['ym'];
			} else {
			// 今月の年月を表示
			$ym = date('Y-m');
		    }

		    $timestamp = strtotime($ym.'-01');

		    if ($timestamp === false) {
		    $ym = date('Y-m');
	    	    $timestamp = strtotime($ym.'-01');
		  }

		    $today = date('Y-m-j');

		    $html_title = date('Y年n月', $timestamp);

		    $prev = date('Y-m',strtotime('-1 month',$timestamp));

		    $next = date('Y-m', strtotime('+1 month', $timestamp));

		    $day_count = date('t', $timestamp);

		    $aryWeek = ['日', '月', '火', '水', '木', '金', '土'];

		    $year = date('Y',$timestamp);
		    $month = date('m',$timestamp);

		    $aryCalendar = array();

		    for($i=1;$i<=$day_count;$i++){
			$aryCalendar[$i]['day']=$i;
			$aryCalendar[$i]['week'] = date('w', strtotime($year.$month.sprintf('%02d', $i)));
		  }
                         ?>
                <table class="table table-hover table table-bordered">

	            <h3 class="mb-5"><a href="?ym=<?php echo $prev; ?>">&lt;</a> <?php echo $html_title; ?> <a href="?ym=<?php echo $next; ?>">&gt;</a></h3>

                    <tr>
                        <th>日付</th>
                        <th>始業時間</th>
                        <th>休憩時間</th>
                        <th>戻り時間</th>
                        <th>退勤時間</th>
                    </tr>
                    <?php foreach($aryCalendar as $value){ ?>


                        <td><?php echo $value['day']."日" ?>(<?php echo $aryWeek[$value['week']] ?>)</td>
                        <td>{{$time->start_time}}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                    <?php } ?>
                 </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
