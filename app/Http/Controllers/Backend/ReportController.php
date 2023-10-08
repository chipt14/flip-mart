<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use DateTime;

class ReportController extends Controller
{
    public function reportView()
    {
        return view('backend.report.report-view');
    }

    public function reportByDate(Request $request)
    {
        $date = new DateTime($request->date);
        $formatDate = $date->format('d/m/Y');
        $orders = Order::where('order_date', $formatDate)->latest()->get();
        return view('backend.report.report-show', compact('orders'));
    }

    public function reportByMonth(Request $request)
    {
        $orders = Order::where('order_month', $request->month)->where('order_year', $request->year_name)->latest()->get();
        return view('backend.report.report-show', compact('orders'));
    }

    public function reportByYear(Request $request)
    {
        $orders = Order::where('order_year', $request->year)->latest()->get();
        return view('backend.report.report-show', compact('orders'));
    }
}
