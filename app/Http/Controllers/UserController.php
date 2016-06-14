<?php

namespace Navicula\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

use Navicula\Http\Requests;
use Navicula\Models\User;

class UserController extends Controller
{
    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('users.index', [
            'method' => 'PATCH',
            'user' => Auth::user()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Auth::user()->update($request->all());

        return back()->with(
            'message', trans('confirmations.updated.user')
        );
    }
}
