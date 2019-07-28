<?php

namespace App\Http\Controllers;

use App\CHV;
use Illuminate\Http\Request;
use Auth;
class CHVController extends Controller
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
        return CHV::with('user')->get();
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
        return CHV::create([
            'user_id' => $user,
            'startchv' => $request['start']
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CHV  $cHV
     * @return \Illuminate\Http\Response
     */
    public function show(CHV $cHV)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CHV  $cHV
     * @return \Illuminate\Http\Response
     */
    public function edit(CHV $cHV)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CHV  $cHV
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CHV $cHV)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CHV  $cHV
     * @return \Illuminate\Http\Response
     */
    public function destroy(CHV $cHV)
    {
        //
    }
}
