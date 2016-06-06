<?php

namespace Navicula\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

use Navicula\Http\Requests;

class BoatController extends Controller
{
    public function index()
    {
        return view('boats', [
            'boats' => Auth::user()->boats
        ]);
    }
}
