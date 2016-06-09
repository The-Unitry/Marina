<?php

namespace Navicula\Http\Controllers;

use Illuminate\Http\Request;

use Navicula\Http\Requests;
use Navicula\Models\Post;

class BlogController extends Controller
{
    public function index()
    {
        return view('blog.index', [
            'posts' => Post::orderBy('created_at')->get()
        ]);
    }
    
    public function show($slug)
    {
        return view('blog.show', [
            'post' => Post::where('slug', $slug)->first()
        ]);
    }
}
