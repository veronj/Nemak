<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Star extends Model
{
    public function commandant()
    {
        return $this->belongsTo('App\Commandant');
    }


}
