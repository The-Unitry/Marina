<?php

namespace Navicula\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

use Navicula\Http\Requests;
use Navicula\Models\Boat;

class BoatController extends Controller
{
    public function index()
    {
        return view('boats.index', [
            'boats' => Auth::user()->boats
        ]);
    }
    
    public function create()
    {
        return view('boats.show');
    }

    public function store(Request $request)
    {
        $boat = new Boat($request->all());
        $boat->user_id = Auth::id();

        $boat->save();

        return redirect('/mijn-boten');
    }
}
