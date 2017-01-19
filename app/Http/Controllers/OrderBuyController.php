<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Order_buy;

class OrderBuyController extends Controller
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

            $order = Order_buy::where('turn_id', 1)->where('commandant_id', $input['commandant_id'])->first();
            if (!$order) {
                if ($input['ships'] > 0 || $input['men'] > 0 ||$input['lasers'] > 0) {
                    $order = new Order_buy;
                    $order->turn_id = 1;
                    $order->commandant_id = $input['commandant_id'];
                    $order->men = $input['men'];
                    $order->lasers = $input['lasers'];
                    $order->robots = $input['robots'];
                    $order->missiles = $input['missiles'];
                    $order->ships = $input['ships'];
                    $order->save();
                }
            } else {
                $order->men = $input['men'];
                $order->lasers = $input['lasers'];
                $order->robots = $input['robots'];
                $order->missiles = $input['missiles'];
                $order->ships = $input['ships'];
                $order->update();
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
