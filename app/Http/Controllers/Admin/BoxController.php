<?php

namespace Navicula\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Navicula\Http\Requests;
use Navicula\Http\Controllers\Controller;
use Navicula\Models\Box;
use Navicula\Models\Scaffold;

class BoxController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.boxes.index', [
            'boxes' => Box::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.boxes.show', [
            'method' => 'POST',
            'scaffolds' => Scaffold::all()
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
        $box = new Box($request->all());
        $box->price_per_night = $box->price_per_night * 100;

        $box->save();

        return redirect('/admin/box/' . $box->id)->with('message', 'Created box.');
    }

    /**
     * Display the specified resource.
     *
     * @param  Box $box
     * @return \Illuminate\Http\Response
     */
    public function show(Box $box)
    {
        return view('admin.boxes.show', [
            'box' => $box,
            'scaffolds' => Scaffold::all(),
            'method' => 'PATCH'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Box $box
     * @return \Illuminate\Http\Response
     */
    public function edit(Box $box)
    {
        return $this->show($box);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Box $box
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Box $box)
    {
        $box = Box::find($box->id);
        $box->fill($request->all());
        $box->price_per_night = $request->get('price_per_night') * 100;
        $box->save();

        return back()->with('message', 'Updated box.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Box $box
     * @return \Illuminate\Http\Response
     */
    public function destroy(Box $box)
    {
        $box->delete();

        return back();
    }
}
