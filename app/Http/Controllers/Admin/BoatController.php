<?php

namespace Navicula\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Navicula\Http\Requests;
use Navicula\Http\Controllers\Controller;
use Navicula\Models\Boat;
use Navicula\Models\User;

class BoatController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.boats.index', [
            'boats' => Boat::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.boats.show', [
            'method' => 'POST',
            'users' => User::all()
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
        $boat = Boat::create($request->all());

        return redirect('/admin/boat/' . $boat->id)->with('message', 'Created boat.');;
    }

    /**
     * Display the specified resource.
     *
     * @param  Boat $boat
     * @return \Illuminate\Http\Response
     */
    public function show(Boat $boat)
    {
        return view('admin.boats.show', [
            'boat' => $boat,
            'users' => User::all(),
            'method' => 'PATCH'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Boat $boat
     * @return \Illuminate\Http\Response
     */
    public function edit(Boat $boat)
    {
        $this->show($boat);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Boat $boat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Boat $boat)
    {
        $boat->update($request->all());

        return back()->with('message', 'Updated boat.');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Boat $boat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Boat $boat)
    {
        $boat->delete();

        return back();
    }
}
