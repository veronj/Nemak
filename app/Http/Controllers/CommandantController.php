<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Http\Requests;
use App\Commandant;
use App\Order_attack;
use App\Order_mission;
use App\Order_buy;

class CommandantController extends Controller
{
    public function show($id)
    {
        $commandant = Commandant::findOrFail($id);
        $nearStars = $commandant->nearStars();
        $nearStarsData = $this->getOrders($nearStars, $id);
        //dd($nearStarsData);
        $data = array(
                'commandant' => $commandant,
                'nearStars' => $nearStarsData
        );

        return view('show', $data);
    }
    
    public function moving($direction)
    {
        $info = "Direction choisie " . $direction;


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
        Session::flash('moved', $info);
//        $data = array(
//            'message' => $message
//        );
        return $this->show(1);
        //return view('show');
    }

    public function movingJson($info)
    {
        $dataInput = json_decode($info);
        dd($dataInput);

        $info = "Direction choisie " . $direction;


        $commandant = Commandant::findOrFail(1);
        /*        if ($direction == 'West') {
                    $commandant->x_position -= 1;
                } elseif ($direction == 'East') {
                $commandant->x_position += 1;
                }*/

        switch ($direction) {

            case "North":
                $commandant->y_position += 1;
                break;
            case "South":
                $commandant->y_position -= 1;
                break;

        }

        $commandant->save();
        Session::flash('moved', $info);
//        $data = array(
//            'message' => $message
//        );
        return $this->show(1);
        //return view('show');
    }

    public function getOrders($nearStars, $id)
    {
        foreach ($nearStars as $star){
           // $attack_order[] = Order_attack::where('turn_id', 1)->where('commandant_id', $id)->where('star_id', $star->id)->get();
            $star['attack'] = Order_attack::where('turn_id', 1)->where('commandant_id', $id)->where('star_id', $star->id)->first();
            $star['mission'] = Order_mission::where('turn_id', 1)->where('commandant_id', $id)->where('star_id', $star->id)->first();
        }
        $nearStars['buy'] = Order_buy::where('turn_id', 1)->where('commandant_id', $id)->first();
       return $nearStars;
    }
}
