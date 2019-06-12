<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Passenger;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class PassengerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function  __construct(){
        return $this->middleware('auth:api');
    }
    public function index()
    {
        return Passenger::with('user','customer')->get();
    }
    public function getCustomer(){
        return Customer::latest()->get();
    }
    /*public function getAccountName(){
        return DB::table('customers')->value('id');
    }*/
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
    public function autocomplete(Request $request)
    {
        $query = $request['account_name'];
        $users = User::where('email','like','%'.$query.'%')->get();
        return response()->json($users);
    }

    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'account_name' => 'required',
            'lastname' => 'required',
            /*'middlename' => 'required',*/
            'firstname' => 'required',
            'dob' => 'required',
            'tel' => 'required',

        ]);
        return Passenger::create([
            'user_id' => Auth::user()->id,
            'customer_id' => $request['account_name'],
            'lastname' => $request['lastname'],
            'firstname' => $request['firstname'],
            'date_birth' => $request['dob'],
            'prefix' => $request['prefix'],
            'tel' => $request['tel'],
            'notes' => $request['notes'],
            'status' => 'Test'
        ]);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Passenger  $passenger
     * @return \Illuminate\Http\Response
     */
    public function show(Passenger $passenger)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Passenger  $passenger
     * @return \Illuminate\Http\Response
     */
    public function edit(Passenger $passenger)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Passenger  $passenger
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Passenger $passenger)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Passenger  $passenger
     * @return \Illuminate\Http\Response
     */
    public function destroy(Passenger $passenger)
    {
        //
    }
}
