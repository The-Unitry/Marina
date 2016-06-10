<?php

namespace Navicula\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Navicula\Http\Requests;
use Navicula\Models\Invoice;
use Navicula\Models\Product;
use Navicula\Models\User;

class InvoiceController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.invoices.index', [
            'invoices' => Invoice::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.invoices.show', [
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
        $invoice = Invoice::create($request->all());

        return redirect('/admin/invoice/' . $invoice->id)->with(
            'message', trans('confirmations.updated.invoice')
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  Invoice $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        return view('admin.invoices.show', [
            'invoice' => $invoice,
            'users' => User::all(),
            'method' => 'PATCH'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Invoice $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        $this->show($invoice);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Invoice $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        $invoice->update($request->all());

        return back()->with(
            'message', trans('confirmations.updated.invoice')
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Invoice $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        $invoice->delete();

        return back();
    }

    /**
     * View a PDF version of the invoice.
     *
     * @param Invoice $invoice
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view(Invoice $invoice)
    {
        return view('admin.invoices.view', [
            'invoice' => $invoice
        ]);
    }

    /**
     * Add empty product to the given invoice.
     *
     * @param Invoice $invoice
     * @return void
     */
    public function addProduct(Invoice $invoice)
    {
        Product::create([
            'invoice_id' => $invoice->id
        ]);

        return redirect('/admin/invoice/' . $invoice->id);
    }
}
