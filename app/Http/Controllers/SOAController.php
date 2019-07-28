<?php

namespace App\Http\Controllers;

use App\SOA;
use Illuminate\Http\Request;
use Auth;

class SOAController extends Controller
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
        return SOA::with('user')->get();
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
          $user = Auth::user()->id;
        $this->validate($request,[
            'start' => 'required|numeric',
        ]);
        return SOA::create([
            'user_id' => $user,
            'startsoa' => $request['start']
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SOA  $sOA
     * @return \Illuminate\Http\Response
     */
    public function show(SOA $sOA)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SOA  $sOA
     * @return \Illuminate\Http\Response
     */
    public function edit(SOA $sOA)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SOA  $sOA
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SOA $sOA)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SOA  $sOA
     * @return \Illuminate\Http\Response
     */
    public function destroy(SOA $sOA)
    {
        //
    }
}
