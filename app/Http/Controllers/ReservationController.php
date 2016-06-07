<?php

namespace Navicula\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

use Navicula\Http\Requests;

class ReservationController extends Controller
{
    /**
     * ReservationController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * View the calendar for the reservations.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('reserve.index', [
            'boats' => Auth::user()->boats
        ]);
    }
}
