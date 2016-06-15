<?php

namespace Navicula\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Navicula\Http\Requests;
use Navicula\Http\Controllers\Controller;
use Navicula\Models\Invoice;

class InvoiceExportController extends Controller
{
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.invoices.export.index', [
            'invoices' => Invoice::all()
        ]);
    }

    public function export($start, $end)
    {
    	header('Content-type: text/csv');
    	header('Content-Disposition: attachment; filename="export.csv"');
    	
    	$invoices = Invoice::where([
    		['created_at', '>=', $start],
    		['created_at', '<=', $end]
		])->get();

    	return view('admin.invoices.export.csv', [
    		'invoices' => $invoices
		]);
    }
}
