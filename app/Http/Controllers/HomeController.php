<?php

namespace Navicula\Http\Controllers;

use Navicula\Http\Requests;
use Illuminate\Http\Request;
use Navicula\Models\Post;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome', [
            'posts' => Post::orderBy('created_at', 'desc')->get()
        ]);
    }
}
