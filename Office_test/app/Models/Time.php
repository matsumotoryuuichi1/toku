<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    //従業員IDと紐付け
   public function office(){
       return $this->belongsTo('App\Models\Office');
   }


}
