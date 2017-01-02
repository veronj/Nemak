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
       // dd($nearStars);
        $data = array(
                'commandant' => $commandant,
                'nearStars' => $nearStars
        );

        //dd($commandant->nearStars());
//        var_dump($commandant);
        //dd($stars);
        return view('show', $data);
    }
    
    public function moving($direction)
    {
        $info = "Direction choisie " . $direction;
        $messages = new \illuminate\Support\MessageBag($info);

        $commandant = Commandant::findOrFail(1);
/*        if ($direction == 'West') {
            $commandant->x_position -= 1;
        } elseif ($direction == 'East') {
        $commandant->x_position += 1;
        }*/

        switch ($direction) {
            case "North-West":
                $commandant->x_position -= 1;
                $commandant->y_position += 1;
                break;
            case "North":
                $commandant->y_position += 1;
                break;
            case "North-East":
                $commandant->x_position += 1;
                $commandant->y_position += 1;
                break;
            case "West":
                $commandant->x_position -= 1;
                break;
            case "East":
                $commandant->x_position += 1;
                break;
            case "South-West":
                $commandant->x_position -= 1;
                $commandant->y_position -= 1;
                break;
            case "South":
                $commandant->y_position -= 1;
                break;
            case "South-East":
                $commandant->x_position += 1;
                $commandant->y_position -= 1;
                break;
        }

        $commandant->save();

//        $data = array(
//            'message' => $message
//        );
        return $this->show(1)->with($messages);
        //return view('show');
    }
}
