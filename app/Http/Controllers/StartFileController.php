<?php

namespace App\Http\Controllers;

use App\StartFile;
use Illuminate\Http\Request;
use Auth;

class StartFileController extends Controller
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

        return StartFile::with('user')->get();

    }
    public function count(){
        return Startfile::count();
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
            'startbooklet' => 'required|numeric',
            'startsoa' => 'required|numeric',
            'startar' => 'required|numeric',
            'startpr' => 'required|numeric',
            'startpo' => 'required|numeric',
            'startcv' => 'required|numeric',
            'startchv' => 'required|numeric',
            'startpettycash' => 'required|numeric',
            'startor' => 'required|numeric',
        ]);
        return StartFile::create([
            'user_id' => $user,
            'startsoa' => $request['startsoa'],
            'startbooklet' => $request['startbooklet'],
            'startar' => $request['startsoa'],
            'startpr' => $request['startpr'],
            'startpo' => $request['startpo'],
            'startcv' => $request['startcv'],
            'startchv' => $request['startchv'],
            'startor' => $request['startor'],
            'startboxpetty' => $request['startpettycash']
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StartFile  $startFile
     * @return \Illuminate\Http\Response
     */
    public function show(StartFile $startFile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StartFile  $startFile
     * @return \Illuminate\Http\Response
     */
    public function edit(StartFile $startFile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StartFile  $startFile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $startseries = Startfile::findOrFail($id);
          $user = Auth::user()->id;
        $this->validate($request,[
            'startbooklet' => 'required|numeric',
            'startsoa' => 'required|numeric',
            'startar' => 'required|numeric',
            'startpr' => 'required|numeric',
            'startpo' => 'required|numeric',
            'startcv' => 'required|numeric',
            'startchv' => 'required|numeric',
            'startpettycash' => 'required|numeric',
            'startor' => 'required|numeric',
        ]);
         $startseries->update([
               'user_id' => $user,
            'startsoa' => $request['startsoa'],
            'startbooklet' => $request['startbooklet'],
            'startar' => $request['startsoa'],
            'startpr' => $request['startpr'],
            'startpo' => $request['startpo'],
            'startcv' => $request['startcv'],
            'startchv' => $request['startchv'],
            'startor' => $request['startor'],
            'startboxpetty' => $request['startpettycash']
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StartFile  $startFile
     * @return \Illuminate\Http\Response
     */
    public function destroy(StartFile $startFile)
    {
        //
    }
}
