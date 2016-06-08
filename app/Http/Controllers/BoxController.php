<?php

namespace Navicula\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

use Navicula\Http\Requests;
use Navicula\Models\Box;

class BoxController extends Controller
{
  /**
   * BoatController constructor.
   */
  public function __construct()
  {
      $this->middleware('auth');
  }

  /**
   * View the overview of the logged in user's boats.
   *
   * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
    public function index()
    {
        return view('boxes.index', [
          'boxes' => Auth::user()->boxes
        ]);
    }
}
