<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public function article(){
        return $this->hasOne('App\Article');
    }
}
