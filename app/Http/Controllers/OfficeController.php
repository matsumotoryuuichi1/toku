<?php

namespace App\Http\Controllers;

use App\Http\Requests\breakrequest;
use Illuminate\Http\Request;

use App\Models\Office;

use App\Models\Time;

use App\Http\Requests\Office_Form;
use App\Http\Requests\reaverequest;
use App\Http\Requests\returnrequest;
use App\Http\Requests\startrequest;
use Illuminate\Support\Facades\DB;

class OfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function home(){
         return view('Office/home');
     }


    public function index(Request $request)
    {
       $office_send_index=DB::table('offices')->select('id','your_name','section','gender','created_at')->get();


        $search=$request->input('search');

         $query=DB::table('offices');

        if($search !==null){
            $search_split=mb_convert_kana($search,'s');

            $search_split2=preg_split('/[\s]+/',$search_split,-1,PREG_SPLIT_NO_EMPTY);

            foreach($search_split2 as $value){
                $query->where('your_name','like','%'.$value.'%');
            }

        };
         $query->select('id','your_name','gender','section','created_at');


       $offices=$query->paginate(20);
     return  view('Office/index',compact('offices'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function formcreate()
    //登録フォーム用
    {
        return view('Office/formcreate');

    }

    //以下４つ打刻画面
    public function start_create()
    {
        return view('Office/start_create');

    }

    public function return_create()
    {
        return view('Office/return_create');

    }

     public function break_create()
    {
        return view('Office/break_create');

    }

     public function reave_create()
    {
        return view('Office/reave_create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Office_Form $request)
    //登録フォーム用
    {
         $office=new Office;

         $office->your_name=$request->input('your_name');
         $office->gender=$request->input('gender');
         $office->section=$request->input('section');

         $office->save();

         return redirect('Office/index');

    }

     public function start_store(startrequest $request)
     //以下４つ打刻用
      {

       $start_time=new Time;

       $start_time->office_id=$request->input('office_id');
       $start_time->your_name=$request->input('your_name');
       $start_time->start_time=date('H:i');//出勤時間

       $start_time->save();
       return redirect('Office/start_create');
        }



        public function break_store(breakrequest $request)
         {
       $break_time=new Time;

       $break_time->office_id=$request->input('office_id');
       $break_time->your_name=$request->input('your_name');
       $break_time->break_time=date('H:i');//休憩時間

       $break_time->save();
        return redirect('Office/break_create');
         }

         public function return_store(returnrequest $request)

         {
       $retrun_time=new Time;
       $retrun_time->office_id=$request->input('office_id');
       $retrun_time->your_name=$request->input('your_name');
       $retrun_time->return_time=date('H:i');//戻り時間

       $retrun_time->save();
       return redirect('Office/return_create');
         }

         public function reave_store(reaverequest $request)

         {
       $reave_time=new Time;
       $reave_time->office_id=$request->input('office_id');
       $reave_time->your_name=$request->input('your_name');
       $reave_time->reave_time=date('H:i');//退勤時間

       $reave_time->save();
       return redirect('Office/reave_create');
         }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

         $office=Office::find($id);

	 $time=Time::find($id);

        return view('Office/show',compact('office','time'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
