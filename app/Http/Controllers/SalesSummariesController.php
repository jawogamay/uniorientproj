<?php

namespace App\Http\Controllers;

use App\SalesSummaries;
use Illuminate\Http\Request;
use App\SaleAgreement;
use Auth;
use Illuminate\Support\Facades\DB;
class SalesSummariesController extends Controller
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
        //
/*        $name = SalesSummaries::get('passenger_name');
        $names = explode('.',$name);
        $fullname= SalesSummaries::with('customer')->get();
        return $names;*/
        return SalesSummaries::with('customer','user')->get();
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
           
            'soa' => 'required',
            'account_name' => 'required',
            'passenger_name' => 'required',
            'payment' => 'required'
        ]);
        $sanumber = SaleAgreement::latest()->where('is_used',0)->pluck('saNumber');
        $int = (int)$sanumber[0];
        $passenger =  $request->passenger_name;
        $passenger = array_flatten($passenger);
         SalesSummaries::create([
            'salesagreement' =>   $int,
            'soa' => $request['soa'],
            'customer_id' =>  (int)$request->account_name['id'],
            'passenger_name' =>  implode(', ',$passenger),
            'user_id' => Auth::user()->id,
            'payment' => $request['payment'],
            'verified' => 'Not Verified'
        ]);
      return DB::table('sale_agreements')
                ->where('saNumber',$int)
                ->update(['is_used'=>1]);
                
                
              
            /* return $passenger->implode(',', $passenger[0]);*/
              
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SalesSummaries  $salesSummaries
     * @return \Illuminate\Http\Response
     */
    public function show(SalesSummaries $salesSummaries)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SalesSummaries  $salesSummaries
     * @return \Illuminate\Http\Response
     */
    public function edit(SalesSummaries $salesSummaries)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SalesSummaries  $salesSummaries
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SalesSummaries $salesSummaries)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SalesSummaries  $salesSummaries
     * @return \Illuminate\Http\Response
     */
    public function destroy(SalesSummaries $salesSummaries)
    {
        //
    }
}
