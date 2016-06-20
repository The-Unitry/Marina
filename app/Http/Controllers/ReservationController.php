<?php

namespace Navicula\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Navicula\Http\Controllers\Api;
use Navicula\Models\Boat;
use Navicula\Models\Box;
use Navicula\Models\Reservation;
use Carbon\Carbon;
use Mail;

use Navicula\Http\Requests;

class ReservationController extends Controller
{
    /**
     * ReservationController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * View the calendar for the reservations.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('reservations.index', [
            'boats' => Auth::user()->boats
        ]);
    }

    /**
     * ShowForm() for the available boxes.
     *
     * @return view
     */
    public function boxes(Request $request)
    {
        $boat = Boat::findOrFail($request->get('boat_id'));
        return view('reservations.available_boxes', [
            'boxes' => Api\BoxController::getAvailableBoxes($boat, $request->get('start'), $request->get('end')),
            'filled' => $request->all()
        ]);
    }

    /**
     * Create a new reservation with the given data.
     *
     * @return redirect
     */
    public function store(Boat $boat, $start, $end, $amountOfPersons, Box $box)
    {
        $reservation = Reservation::create([
            'approved' => 0,
            'user_id' => Auth::id(),
            'box_id' => $box->id,
            'reservation_type_id' => 1,
            'amount_of_persons', $amountOfPersons,
            'boat_id' => $boat->id,
            'start' => new Carbon($start),
            'end' => new Carbon($end)
        ]);

        Mail::send('emails.reservation', [
            'name' => Auth::user()->name,
            'box' => $reservation->box->getFullCode(),
            'amount_of_persons' => $reservation->amount_of_persons,
            'company_name' => setting('company_name'),
            'start' => $reservation->start,
            'end' => $reservation->end,
            'boat' => $reservation->boat
        ], function ($m) {
            $m->from(setting('company_mail'), setting('company_name'));
            $m->to(Auth::user()->email);
            $m->bcc(setting('company_mail'), setting('company_name'));
            $m->subject('Bedankt voor uw boeking!');
        });

        return redirect('/reserveren/bedankt');
    }

    /**
     * Show the thanks page.
     * @return View
     */
    public function thanks()
    {
        return view('reservations.success');
    }
}
