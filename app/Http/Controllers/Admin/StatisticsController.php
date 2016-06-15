<?php

namespace Navicula\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Navicula\Http\Requests;
use Navicula\Http\Controllers\Controller;

class StatisticsController extends Controller
{
    /**
     * Display the statistics page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.statistics.index');
    }
}
