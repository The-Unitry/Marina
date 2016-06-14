<?php

namespace Navicula\Http\Controllers;

use Illuminate\Http\Request;

use Navicula\Http\Requests;
use Navicula\Models\Post;

class BlogController extends Controller
{
    /**
     * View the blog overview.
     * 
     * @return View
     */
    public function index()
    {
        return view('blog.index', [
            'posts' => Post::orderBy('created_at')->get()
        ]);
    }
    
    /**
     * View a blog by it's slug, otherwise return a 404 error.
     * 
     * @return mixed
     */
    public function show($slug)
    {
        $result = Post::where('slug', $slug)->first();

        if (empty($result)) {
            return abort(404);
        }

        return view('blog.show', [
            'post' => $result
        ]);
    }
}
