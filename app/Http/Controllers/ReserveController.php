<?php

namespace Navicula\Http\Controllers;

use Illuminate\Http\Request;

use Navicula\Http\Requests;

class ReserveController extends Controller
{
    public function index()
    {
        return view('reserve.index');
    }
}
