<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public  function voting(){
        return $this->hasMany('App\Voting');
    }


    public  function token(){
        return $this->hasMany('App\NomineeToken');
    }
}
