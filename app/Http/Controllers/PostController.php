<?php

namespace Navicula\Http\Controllers;

use Illuminate\Http\Request;

use Navicula\Http\Requests;
use Navicula\Models\Post;

class PostController extends Controller
{
    public function show($slug)
    {
        return view('posts.show', [
            'post' => Post::where('slug', $slug)->first()
        ]);
    }
}
