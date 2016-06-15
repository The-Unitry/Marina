<?php

namespace Navicula\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Navicula\Http\Requests;
use Navicula\Models\User;
use Mail;

class NewsletterController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.newsletters.index');
    }

    /**
     * Send a newsletter to all users.
     * 
     * @return mixed
     */
    public function store(Request $request)
    {
    	foreach (User::all() as $user) {
    		Mail::send('emails.html', [
	            'content' => $request->get('body')
	        ], function ($m) use ($request, $user) {
	            $m->from(setting('company_mail'), setting('company_name'));
	            $m->to($user->email);
	            $m->subject($request->get('subject'));
	        });
    	}

    	return back()->with('message', 'De nieuwsbrief is verzonden.');
    }
}
