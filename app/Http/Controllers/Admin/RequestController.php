<?php

namespace Navicula\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Navicula\Http\Requests;
use Navicula\Http\Controllers\Controller;
use Navicula\Models\Boat;
use Navicula\Models\Box;
use Navicula\Models\Reservation;

class RequestController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.requests.index', [
            'reservations' => Reservation::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.requests.show', [
            'method' => 'POST',
            'boats' => Boat::all(),
            'boxes' => Box::all()
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
        $reservation = new Reservation($request->all());
        $reservation->user_id = Boat::find($request->get('boat_id'))->owner->id;
        $reservation->reservation_type_id = 1;

        $reservation->save();

        return redirect('/admin/reservation/' . $reservation->id)->with(
            'message', trans('confirmations.created.reservation')
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  Reservation $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        return view('admin.requests.show', [
            'reservation' => $reservation,
            'method' => 'PATCH',
            'boats' => Boat::all(),
            'boxes' => Box::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Reservation $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        return $this->show($reservation);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Reservation $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        $reservation->update($request->all());

        return back()->with(
            'message', trans('confirmations.updated.reservation')
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Reservation $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return back();
    }
}
