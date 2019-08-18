<?php

namespace App\Http\Controllers;

use App\AirlineIata;
use Illuminate\Http\Request;
use App\SalesSummaries
class AirlineIataController extends Controller
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
    public function getsalesagreement(){
        return SalesSummaries::all();
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AirlineIata  $airlineIata
     * @return \Illuminate\Http\Response
     */
    public function show(AirlineIata $airlineIata)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AirlineIata  $airlineIata
     * @return \Illuminate\Http\Response
     */
    public function edit(AirlineIata $airlineIata)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AirlineIata  $airlineIata
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AirlineIata $airlineIata)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AirlineIata  $airlineIata
     * @return \Illuminate\Http\Response
     */
    public function destroy(AirlineIata $airlineIata)
    {
        //
    }
}
