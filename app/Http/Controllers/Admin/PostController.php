<?php

namespace Navicula\Http\Controllers\Admin;

use Auth;
use Illuminate\Http\Request;

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
        $post->save();

        return redirect('/admin/post/' . $post->id)->with('message', 'Created post.');
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
        $post->update($request->all());

        return back()->with('message', 'Updated post.');
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
