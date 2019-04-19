<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voting extends Model
{

    public function  department(){
        return $this->belongsTo('App\Department');
    }


    public  function token(){
        return $this->hasMany('App\NomineeToken');
    }

}
