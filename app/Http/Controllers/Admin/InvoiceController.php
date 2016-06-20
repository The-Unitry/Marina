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

        foreach ($request->get('products') as $i => $product) {
            $product['price'] = str_replace(',', '.', $product['price']) * 100;
            Product::find($i)->update($product);
        }

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

    /**
     * Delete product.
     *
     * @param Product $product
     * @return void
     */
    public function destroyProduct(Invoice $invoice, Product $product)
    {
        $product->delete();

        return back();
    }

    public function credit(Invoice $invoice)
    {
        $invoice->update([
            'status' => 'credited'
        ]);

        $credit = Invoice::create([
            'status' => 'credit_note',
            'user_id' => $invoice->user_id
        ]);

        foreach ($invoice->products as $product) {
            Product::create([
                'invoice_id' => $credit->id,
                'amount' => $product->amount,
                'description' => $product->description,
                'vat' => $product->vat,
                'price' => -$product->price,
                'start' => $product->start,
                'end' => $product->end
            ]);
        }

        return redirect('/admin/invoice/' . $credit->id);
    }
}
