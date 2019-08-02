<?php

namespace App\Http\Controllers;

use App\AirlineRate;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
/*use Illuminate\Support\Carbon;*/
class AirlineRateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
    {
        $this->middleware('auth:api');
    }
    public function index()
    {
        //
        return AirlineRate::latest()->with('user')->get();
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
    public function count(){
        AirlineRate::where('date','==',Carbon::now())->get();
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
            'date' => NOW(),
            'day' => NOW(),
            'user_id' => Auth::user()->id
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
    public function update(Request $request, $id)
    {
        //
        $airline = AirlineRate::findOrFail($id);
        $airline->update([
             
            'rate' => $request['rate'],
            'date' => $request['date'],
            'day' => $request['day'],
            'user_id' => Auth::user()->id
       
        ]);
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
