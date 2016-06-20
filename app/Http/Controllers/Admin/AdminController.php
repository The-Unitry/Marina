<?php

namespace Navicula\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Navicula\Http\Controllers\Controller;
use Navicula\Http\Requests;
use Navicula\Models\Boat;
use Navicula\Models\User;

class AdminController extends Controller
{
    /**
     * AdminController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    /**
     * View the application dashboard.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.dashboard.index', [
            'transients' => count(User::all()),
            'berth_holders' => count(User::all()),
            'boats' => count(Boat::all()),
            'users' => count(User::all())
        ]);
    }
}
