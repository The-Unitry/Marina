<?php

namespace Navicula\Http\Controllers\Admin;

use Auth;
use Illuminate\Http\Request;

use Navicula\Http\Requests;
use Navicula\Models\Page;

class PageController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.index', [
            'pages' => Page::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.show', [
            'method' => 'POST'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $page = new Page($request->all());
        $page->user_id = Auth::user()->id;
        $page->save();

        return redirect('/admin/page/' . $page->id)->with('message', trans('confirmations.created_page'));
    }

    /**
     * Display the specified resource.
     *
     * @param Page $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        return view('admin.pages.show', [
            'page' => $page,
            'method' => 'PATCH'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Page $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        $this->show($page);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Page $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        $page->update($request->all());

        return back()->with('message', trans('confirmations.updated_page'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        $page->delete();

        return back();
    }
}
