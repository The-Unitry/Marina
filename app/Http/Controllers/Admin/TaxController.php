<?php

namespace Navicula\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Navicula\Http\Requests;
use Navicula\Http\Controllers\Controller;
use Navicula\Models\Invoice;

class TaxController extends AdminController
{
    public function index()
    {
        return view('admin.invoices.tax.index');
    }

    public function show(Request $request, $start, $end)
    {
        $invoices = Invoice::where([
            ['created_at', '<=', $end],
            ['created_at', '>=', $start]
        ])->get();

        $revenue = 0;
        $vat = 0;
        $tourist_tax = 0;

        foreach($invoices as $invoice) {
            foreach($invoice->products as $product) {
                $revenue += $product->totalPrice();
                $vat += $product->totalVat();

                if($product->description == 'Toeristenbelasting') {
                    $tourist_tax += ($product->amount * $product->price);
                }
            }
        }

        return [
            'revenue' => euro($revenue / 100),
            'vat' => euro($vat / 100),
            'tourist_tax' => euro($tourist_tax / 100),
            'payments' => count($invoices),
        ];
    }
}
