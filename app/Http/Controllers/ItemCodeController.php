<?php

namespace App\Http\Controllers;

use App\ItemCode;
use Illuminate\Http\Request;
use Auth;
class ItemCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        return $this->middleware('auth:api');
    }
    public function index()
    {
        //
        return ItemCode::latest()->with('user')->get();
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
        $this->validate($request,[
            'ticket' => 'required',
            'tax' => 'required',
            'hotel' => 'required',
            'package' => 'required',
            'service_fee' => 'required',
            'document' => 'required'
        ]);
        return ItemCode::create([
            'user_id' => Auth::user()->id,
            'ticket' => $request['ticket'],
            'tax' => $request['tax'],
            'hotel' => $request['hotel'],
            'package' => $request['package'],
            'service_fee' => $request['service_fee'],
            'documentation' => $request['document']
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ItemCode  $itemCode
     * @return \Illuminate\Http\Response
     */
    public function show(ItemCode $itemCode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ItemCode  $itemCode
     * @return \Illuminate\Http\Response
     */
    public function edit(ItemCode $itemCode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ItemCode  $itemCode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ItemCode $itemCode)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ItemCode  $itemCode
     * @return \Illuminate\Http\Response
     */
    public function destroy(ItemCode $itemCode)
    {
        //
    }
}
