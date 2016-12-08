<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commandant extends Model
{
    public function stars()
    {
        return $this->hasMany('App\Star');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
