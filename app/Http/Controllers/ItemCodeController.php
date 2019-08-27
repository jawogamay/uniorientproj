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
            'itemcode' => 'required',
            'itemname' => 'required',
         
        ]);
        return ItemCode::create([
            'user_id' => Auth::user()->id,
            'itemcode' => $request['itemcode'],
            'itemname' => $request['itemname'],
        
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
    public function update(Request $request, $id)
    {
        //
            $itemcode = ItemCode::findOrFail($id);
           $this->validate($request,[
            'itemcode' => 'required',
            'itemname' => 'required', 
        ]);
        $itemcode->update([
            'user_id' => Auth::user()->id,
             'itemcode' => $request['itemcode'],
            'itemname' => $request['itemname'],
        ]);
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
