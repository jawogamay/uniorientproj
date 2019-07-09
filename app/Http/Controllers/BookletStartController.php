<?php

namespace App\Http\Controllers;

use App\BookletStart;
use Illuminate\Http\Request;
use Auth;
class BookletStartController extends Controller
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
        //This for admin
        return BookletStart::with('user')->get();
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
        return BookletStart::create([
            'user_id' => $user,
            'startbooklet' => $request['start']
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BookletStart  $bookletStart
     * @return \Illuminate\Http\Response
     */
    public function show(BookletStart $bookletStart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BookletStart  $bookletStart
     * @return \Illuminate\Http\Response
     */
    public function edit(BookletStart $bookletStart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BookletStart  $bookletStart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BookletStart $bookletStart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BookletStart  $bookletStart
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookletStart $bookletStart)
    {
        //
    }
}
