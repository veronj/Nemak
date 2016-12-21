<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Star;

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

    public function nearStars()
    {
        $x = $this->x_position;
        $y = $this->y_position;


        $nearStars[0] = Star::where('x_position', '=', $x - 1)->where('y_position', '=', $y + 1)->first();
        $nearStars[1] = Star::where('x_position', '=', $x)->where('y_position', '=', $y + 1)->first();
        $nearStars[2] = Star::where('x_position', '=', $x + 1)->where('y_position', '=', $y + 1)->first();

        $nearStars[3] = Star::where('x_position', '=', $x - 1)->where('y_position', '=', $y)->first();
        $nearStars[4] = Star::where('x_position', '=', $x)->where('y_position', '=', $y)->first();
        $nearStars[5] = Star::where('x_position', '=', $x + 1)->where('y_position', '=', $y)->first();

        $nearStars[6] = Star::where('x_position', '=', $x - 1)->where('y_position', '=', $y - 1)->first();
        $nearStars[7] = Star::where('x_position', '=', $x)->where('y_position', '=', $y - 1)->first();
        $nearStars[8] = Star::where('x_position', '=', $x + 1)->where('y_position', '=', $y - 1)->first();

        return $nearStars;
    }
    
    

}
