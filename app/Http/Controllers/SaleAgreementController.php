<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Passenger;
use App\SaleAgreement;
use Illuminate\Http\Request;

class SaleAgreementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       return SaleAgreement::where('is_used',0)->get('saNumber');
    }
    public function getPassenger(Request $request){
         $data = Passenger::select('fullname')->where('customer_id',$request->customer_id)->get();
        return response()->json($data);
    }
    public function getCustomer(){
        $data = Customer::select('account_name','id')->get();
   
        return response()->json($data);
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SaleAgreement  $saleAgreement
     * @return \Illuminate\Http\Response
     */
    public function show(SaleAgreement $saleAgreement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SaleAgreement  $saleAgreement
     * @return \Illuminate\Http\Response
     */
    public function edit(SaleAgreement $saleAgreement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SaleAgreement  $saleAgreement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SaleAgreement $saleAgreement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SaleAgreement  $saleAgreement
     * @return \Illuminate\Http\Response
     */
    public function destroy(SaleAgreement $saleAgreement)
    {
        //
    }
}
