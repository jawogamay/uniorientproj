<?php

namespace App\Http\Controllers;

use App\AR;
use Illuminate\Http\Request;
use Auth;
class ARController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth:api');
    }
    public function index()
    {
        //
        return AR::with('user')->get();
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
        return AR::create([
            'user_id' => $user,
            'startar' => $request['start']
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AR  $aR
     * @return \Illuminate\Http\Response
     */
    public function show(AR $aR)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AR  $aR
     * @return \Illuminate\Http\Response
     */
    public function edit(AR $aR)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AR  $aR
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AR $aR)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AR  $aR
     * @return \Illuminate\Http\Response
     */
    public function destroy(AR $aR)
    {
        //
    }
}
