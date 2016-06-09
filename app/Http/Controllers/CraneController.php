<?php

namespace Navicula\Http\Controllers;

use Illuminate\Http\Request;

use Navicula\Http\Requests;

class CraneController extends Controller
{
    /**
     * CraneController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display the crane planning view.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('cranes.index');
    }
}
