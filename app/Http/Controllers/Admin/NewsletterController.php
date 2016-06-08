<?php

namespace Navicula\Http\Controllers\Admin;

// use Auth;
use Illuminate\Http\Request;

// use Navicula\Http\Controllers\Admin\AdminController;
use Navicula\Http\Requests;
// use Navicula\Models\Newsletter;

class NewsletterController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.newsletters.index', [
            // 'newsletters' => Newsletter::all()
        ]);
    }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     return view('admin.newsletters.show', [
    //         'method' => 'POST'
    //     ]);
    // }
    //
    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     $reservation = new Newsletter($request->all());
    //
    //     $reservation->save();
    //
    //     return redirect('/admin/newsletter/' . $reservation->id)->with('message', trans('confirmations.created_newsletter'));
    // }
    //
    // /**
    //  * Display the specified resource.
    //  *
    //  * @param Newsletter $newsletter
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show(Newsletter $newsletter)
    // {
    //     return view('admin.newsletter.show', [
    //         'newsletter' => $newsletter,
    //         'method' => 'PATCH'
    //     ]);
    // }
    //
    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  Newsletter $newsletter
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit(Newsletter $newsletter)
    // {
    //     return $this->show($newsletter);
    // }
    //
    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  Newsletter $newsletter
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, Newsletter $newsletter)
    // {
    //     $newsletter->update($request->all());
    //
    //     return back()->with('message', trans('confirmations.updated_newsletter'));
    // }
    //
    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  Newsletter $newsletter
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy(Newsletter $newsletter)
    // {
    //     $newsletter->delete();
    //
    //     return back();
    // }
}
