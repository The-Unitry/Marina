<?php

namespace Navicula\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Navicula\Http\Requests;
use Navicula\Http\Controllers\Controller;
use Navicula\Models\Invoice;

class StatisticsController extends AdminController
{
    /**
     * Display the statistics page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.statistics.index', [
            'revenue' => [
                'january' => Invoice::getRevenueForMonth(1),
                'february' => Invoice::getRevenueForMonth(2),
                'march' => Invoice::getRevenueForMonth(3),
                'april' => Invoice::getRevenueForMonth(4),
                'may' => Invoice::getRevenueForMonth(5),
                'june' => Invoice::getRevenueForMonth(6),
                'july' => Invoice::getRevenueForMonth(7),
                'august' => Invoice::getRevenueForMonth(8),
                'september' => Invoice::getRevenueForMonth(9),
                'october' => Invoice::getRevenueForMonth(10),
                'november' => Invoice::getRevenueForMonth(11),
                'december' => Invoice::getRevenueForMonth(12),
            ]
        ]);
    }
}
