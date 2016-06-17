<?php

namespace Navicula\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

use Intervention\Image\Facades\Image;
use Navicula\Http\Requests;
use Navicula\Models\Boat;

class BoatController extends Controller
{
    /**
     * BoatController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * View the overview of the logged in user's boats.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('boats.index', [
            'boats' => Auth::user()->boats
        ]);
    }

    /**
     * Show the form for creating a boat.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('boats.show', [
            'method' => 'POST'
        ]);
    }

    /**
     * Show the form for editing a boat.
     *
     * @param Boat $boat
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Boat $boat)
    {
        if (Auth::user() == $boat->owner) {

            $boat->length /= 100;
            $boat->height /= 100;
            $boat->depth  /= 100;
            $boat->width  /= 100;

            return view('boats.show', [
                'boat' => $boat,
                'method' => 'PATCH'
            ]);
        }

        return redirect('/mijn-boten')->with(
            'message', 'Je hebt geen toegang tot deze pagina.'
        );
    }

    /**
     * Update the given boat in storage.
     *
     * @param Request $request
     * @param Boat $boat
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Boat $boat)
    {
        if (isset($request->all()['image_path'])) {
            $boat->uploadImage($request->all()['image_path']);
        }

        $boat->length *= 100;
        $boat->height *= 100;
        $boat->depth  *= 100;
        $boat->width  *= 100;

        $boat->save();

        return back()->with('message', trans('confirmations.updated.boat'));
    }

    /**
     * Store a new boat in the storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $boat = new Boat($request->all());
        $boat->user_id = Auth::id();

        if (isset($request->all()['image_path'])) {
            $boat->uploadImage($request->all()['image_path']);
        }

        $boat->length *= 100;
        $boat->height *= 100;
        $boat->depth  *= 100;
        $boat->width  *= 100;

        $boat->save();

        return redirect('/mijn-boten')->with('message', trans('confirmations.created_boat'));
    }

    /**
     * Delete a boat.
     *
     * @param Boat $boat
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(Boat $boat)
    {
        if (Auth::user() == $boat->owner) {
            $boat->delete();
        } else {
            abort(403);
        }

        return redirect('mijn-boten')->with('message', 'Je boot is verwijderd.');
    }
}
