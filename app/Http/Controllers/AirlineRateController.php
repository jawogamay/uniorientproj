<?php

namespace App\Http\Controllers;

use App\AirlineRate;
use Illuminate\Http\Request;

class AirlineRateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return AirlineRate::latest()->get();
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
        //
        return AirlineRate::create([
            'rate' => $request['rate'],
            'date' => NOW()
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AirlineRate  $airlineRate
     * @return \Illuminate\Http\Response
     */
    public function show(AirlineRate $airlineRate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AirlineRate  $airlineRate
     * @return \Illuminate\Http\Response
     */
    public function edit(AirlineRate $airlineRate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AirlineRate  $airlineRate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AirlineRate $airlineRate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AirlineRate  $airlineRate
     * @return \Illuminate\Http\Response
     */
    public function destroy(AirlineRate $airlineRate)
    {
        //
    }
}
