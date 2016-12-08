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
        $data = array(
                'commandant' => $commandant
        );
//        var_dump($commandant);
        //dd($stars);
        return view('show', $data);
    }
}
