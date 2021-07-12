<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    //打刻時間と紐付け
    public function times(){
        return $this->hasMany('App\Models\Time');
    }







}
