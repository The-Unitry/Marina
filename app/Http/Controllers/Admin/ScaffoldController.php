<?php

namespace Navicula\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Navicula\Http\Requests;
use Navicula\Http\Controllers\Controller;
use Navicula\Models\Scaffold;

class ScaffoldController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.scaffolds.index', [
            'scaffolds' => Scaffold::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.scaffolds.show', [
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
        $scaffold = Scaffold::create($request->all());

        return redirect('/admin/scaffold/' . $scaffold->id)->with('message', trans('confirmations.created_scaffold'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Scaffold $scaffold
     * @return \Illuminate\Http\Response
     */
    public function show(Scaffold $scaffold)
    {
        return view('admin.scaffolds.show', [
            'scaffold' => $scaffold,
            'method' => 'PATCH'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Scaffold $scaffold
     * @return \Illuminate\Http\Response
     */
    public function edit(Scaffold $scaffold)
    {
        return $this->view($scaffold);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Scaffold $scaffold
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Scaffold $scaffold)
    {
        $scaffold->update($request->all());

        return back()->with('message', trans('confirmations.updated_scaffold'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Scaffold $scaffold
     * @return \Illuminate\Http\Response
     */
    public function destroy(Scaffold $scaffold)
    {
        $scaffold->delete();

        return back();
    }
}
