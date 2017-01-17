<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderAttack extends Model
{
    public function index()
    {

    }
    
    public function edit()
    {

    }

    public function store(Request $request)
    {
        //validate
        dd($request);
        $this->validate($request, array(

        ));
        //store

        //redirect

    }
}
