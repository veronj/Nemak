<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\OrderMission;

class OrderMissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $this->validate($request, array());
        $count = count($input['star']);

        for ($i = 0; $i < $count; $i++) {
            $order = OrderMission::where('turn_id', 1)->where('commandant_id', $input['commandant_id'])->where('star_id', $input['star'][$i])->first();
            if (!$order) {
                if ($input['ships'][$i] > 0) {
                    $order = new OrderMission;
                    $order->turn_id = 1;
                    $order->commandant_id = $input['commandant_id'];
                    $order->star_id = $input['star'][$i];
                    $order->type = $input['type'][$i];
                    $order->ships = $input['ships'][$i];
                    $order->save();
                }
            } else {
                if ($input['ships'][$i] == 0) {
                    $order->type = "C";
                } else {
                    $order->type = $input['type'][$i];
                }
                $order->ships = $input['ships'][$i];
                $order->update();
            }
        }
        return view('welcome');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
