<?php

namespace App\Http\Controllers;

use App\Booklet;
use App\SaleAgreement;
use App\User;
use Illuminate\Http\Request;
use Auth;

class BookletController extends Controller
{

    public function __construct(){
        $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getTC(){
        return User::where('type','consultant')->latest()->get();
    }
    public function index()
    {
        //
        $user = Auth::user()->id;
        return Booklet::where('user_id',$user)->with('user')->get();
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
            'name_assign' => 'required',
            'initial' => 'required|integer|min:1',
            'end => required|integer'
        ]);

        $f1 = (int)$request['initial'];
        $f2 = (int) $request['end'];
        $user =(int) $request['name_assign'];
        $bookNum = $f1."-".$f2;
        Booklet::create([
            'first' => $f1,
            'second' => $f2,
            'user_id' => $user,
            'bookletNumber' =>$bookNum
        ]);
         $arr = [];
        foreach(range($f1,$f2) as $val){
           $arr [] = SaleAgreement::create([
            'saNumber' => $val,
            'user_id' => $user
           ]);
       
     }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Booklet  $booklet
     * @return \Illuminate\Http\Response
     */
    public function show(Booklet $booklet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Booklet  $booklet
     * @return \Illuminate\Http\Response
     */
    public function edit(Booklet $booklet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Booklet  $booklet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booklet $booklet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Booklet  $booklet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booklet $booklet)
    {
        //
    }
}
