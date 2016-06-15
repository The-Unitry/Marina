<?php

namespace Navicula\Http\Controllers;

use Illuminate\Http\Request;

use Navicula\Http\Requests;

use Navicula\Models\Reservation;
use Auth;

class MyReservationController extends Controller
{
    public function index()
    {
    	return view('my-reservations.index', [
    		'reservations' => Reservation::where('user_id', Auth::id())->orderBy('created_at')->get()
		]);
    }

}
