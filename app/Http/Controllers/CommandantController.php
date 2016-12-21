<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Commandant;

class CommandantController extends Controller
{
    public function show($id)
    {

        $commandant = Commandant::findOrFail($id);
        $stars = Commandant::find($id)->stars;
        $nearStars = $commandant->nearStars();
        
        $data = array(
                'commandant' => $commandant,
                'nearStars' => $nearStars
        );

        //dd($commandant->nearStars());
//        var_dump($commandant);
        //dd($stars);
        return view('show', $data);
    }
    
    public function moving()
    {
        
    }
}
