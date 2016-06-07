<?php

namespace Navicula\Http\Controllers\Admin;

use Auth;
use Illuminate\Http\Request;

use Intervention\Image\Facades\Image;
use Navicula\Http\Controllers\Admin\AdminController;
use Navicula\Http\Requests;
use Navicula\Models\Post;

class PostController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.show', [
            'method' => 'POST'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post($request->all());
        $post->user_id = Auth::user()->id;
        $post->slug = str_slug($request->get('title'));

        if (isset($request->all()['header_path'])) {
            $post->uploadHeader($request->all()['header_path']);
        }
        
        $post->save();

        return redirect('/admin/post/' . $post->id)->with('message', trans('confirmations.created_post'));
    }

    /**
     * Display the specified resource.
     *
     * @param Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', [
            'post' => $post,
            'method' => 'PATCH'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $this->show($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post = Post::find($post->id);
        $post->fill($request->all());
        $post->slug = str_slug($post->title);

        if (isset($request->all()['header_path'])) {
            $post->uploadHeader($request->all()['header_path']);
        }

        $post->save();

        return back()->with('message', trans('confirmations.updated_post'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return back();
    }
}
