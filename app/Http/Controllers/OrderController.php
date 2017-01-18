<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Order_attack;

class OrderController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function edit()
    {
        return view('welcome');
    }

    public function store(Request $request)
    {
        //validate
$input = $request->all();

        $this->validate($request, array(

    ));
        $count = count($input['star']);

        for ($i=0; $i < $count; $i++) {
            if ($input['men'][$i] > 0 || $input['lasers'][$i] > 0) {
                $order = new Order_attack;
                $order->turn_id = 1;
                $order->commandant_id = $input['commandant_id'];
                $order->star_id = $input['star'][$i];
                $order->type = $input['type'][$i];
                $order->men = $input['men'][$i];
                $order->lasers = $input['lasers'][$i];
                $order->save();
            }
        }
        //store

        //redirect

    }
}
