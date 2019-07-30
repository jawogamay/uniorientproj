<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;
use Auth;

class SupplierController extends Controller
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
        return Supplier::latest()->with('user')->get();
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
            'company' => 'required',
            'address' => 'required',
            'tel' => 'required|numeric',
            'fax' => 'numeric',
            'mobile' => 'numeric',
            'email' => 'required|email',
            'notes' => 'required|max:150',
        ]);
        return Supplier::create([
            'user_id' => Auth::user()->id,
            'company' => $request['company'],
            'address' => $request['address'],
            'tel' => $request['tel'],
            'fax' => $request['fax'],
            'email' => $request['email'],
            'mobile' => $request['mobile'],
            'notes' => $request['notes']
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $supplier = Supplier::findOrFail($id);
           $this->validate($request,[
            'company' => 'required',
            'address' => 'required',
            'tel' => 'required|numeric',
            'fax' => 'numeric',
            'mobile' => 'numeric',
            'email' => 'required|email',
            'notes' => 'required|max:150',
        ]);
           $supplier->update([
            'user_id' => Auth::user()->id,
            'company' => $request['company'],
            'address' => $request['address'],
            'tel' => $request['tel'],
            'fax' => $request['fax'],
            'email' => $request['email'],
            'mobile' => $request['mobile'],
            'notes' => $request['notes']
           ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        //
    }
}
