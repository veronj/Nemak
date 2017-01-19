<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Http\Requests;
use App\Commandant;
use App\OrderAttack;
use App\OrderMission;
use App\OrderBuy;

class CommandantController extends Controller
{
    public function show($id)
    {
        $commandant = Commandant::findOrFail($id);
        $nearStars = $commandant->nearStars();
        $nearStarsData = $this->getStarsOrders($nearStars, $id);
        $orders = $this->getOrders($id);
       
        $data = array(
                'commandant' => $commandant,
                'nearStars' => $nearStarsData,
                'orders' => $orders
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

    public function getOrders($id)
    {
        
        $nearStars['buy'] = OrderBuy::where('turn_id', 1)->where('commandant_id', $id)->first();
        if(!($nearStars['buy'])){
            $nearStars['buy']['men'] = 0;
            $nearStars['buy']['lasers'] = 0;
            $nearStars['buy']['robots'] = 0;
            $nearStars['buy']['missiles'] = 0;
            $nearStars['buy']['ships'] = 0;
        }
       return $nearStars;
    }

    public function getStarsOrders($nearStars, $id)
    {
        foreach ($nearStars as $star){

            $star['attack'] = OrderAttack::where('turn_id', 1)->where('commandant_id', $id)->where('star_id', $star->id)->first();
            $star['mission'] = OrderMission::where('turn_id', 1)->where('commandant_id', $id)->where('star_id', $star->id)->first();
        }

        return $nearStars;
    }
}
