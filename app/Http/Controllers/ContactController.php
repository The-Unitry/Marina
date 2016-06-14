<?php

namespace Navicula\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use Navicula\Http\Requests;
use Navicula\Models\Page;

class ContactController extends Controller
{
    /**
     * View the contact page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
      return view('contact.index', [
          'page' => Page::where('id', 1)->first()
      ]);
    }

    /**
     * Send the message.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        Mail::send('emails.message', [
            'name' => $request->get('name'),
            'mail' => $request->get('email'),
            'body' => $request->get('body')
        ], function ($m) use ($request) {
            $m->from(setting('company_mail'), setting('company_name'));
            $m->to($request->get('email'));
            $m->subject('Het contactformulier is ingevuld');
        });

        return back()->with('message', 'Uw bericht is verstuurd, we nemen zo spoedig mogelijk contact met u op.');
    }
}
