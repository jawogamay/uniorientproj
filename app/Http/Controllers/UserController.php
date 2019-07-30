<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return User::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
      public function user(){
        $user = Auth::user()->id;
        $editUser = User::findOrFail($user);
        return $editUser::all();
    }
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
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:6',
            'dob' => 'required|date',
            'hired' => 'required|date',
            'type' => 'required',
            'code' => 'required'
        ]);

        return User::create([
            'code' => $request['code'],
            'name' => $request['name'],
            'email' => $request['email'],
            'dob' => $request['dob'],
            'hired' => $request['hired'],
            'type' => $request['type'],
            'password' => Hash::make($request['password'])
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $employee = User::findOrFail($id);
         $this->validate($request,[
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:6',
            'dob' => 'required|date',
            'hired' => 'required|date',
            'type' => 'required',
            'code' => 'required'
        ]);
         $employee->update([
            'code' => $request['code'],
            'name' => $request['name'],
            'email' => $request['email'],
            'dob' => $request['dob'],
            'hired' => $request['hired'],
            'type' => $request['type'],
            'password' => Hash::make($request['password'])
         ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
