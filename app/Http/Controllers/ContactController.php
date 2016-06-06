<?php

namespace Navicula\Http\Controllers;

use Illuminate\Http\Request;

use Navicula\Http\Requests;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }
}
