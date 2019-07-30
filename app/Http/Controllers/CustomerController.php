<?php

namespace App\Http\Controllers;
use Auth;
use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
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
        $user = Auth::user()->id;
        return Customer::where('user_id',$user)->with('user')->get();

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
            'account_name' => 'required',
            'address' => 'required',
            'nature' => 'required',
            'contact' => 'required|numeric',
            'fax' => 'required',
            'term' => 'required',
            'limit' => 'required|numeric',
            'email' => 'required|email',

        ]);

        return Customer::create([
            'account_name' => $request['account_name'],
            'address' => $request['address'],
            'nature' => $request['nature'],
            'user_id' => Auth::user()->id,
            'term' => $request['term'],
            'email' => $request['email'],
            'fax' => $request['fax'],
            'limit' => $request['limit'],
            'contact' => $request['contact'],
            'notes' => $request['notes']
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $customer = Customer::findOrFail($id);
        $this->validate($request,[
            'account_name' => 'required',
            'address' => 'required',
            'nature' => 'required',
            'contact' => 'required|numeric',
            'fax' => 'required',
            'term' => 'required',
            'limit' => 'required|numeric',
            'email' => 'required|email',

        ]);
        $customer->update([
            'account_name' => $request['account_name'],
            'address' => $request['address'],
            'nature' => $request['nature'],
            'user_id' => Auth::user()->id,
            'term' => $request['term'],
            'email' => $request['email'],
            'fax' => $request['fax'],
            'limit' => $request['limit'],
            'contact' => $request['contact'],
            'notes' => $request['notes']
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
