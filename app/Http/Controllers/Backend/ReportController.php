<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DateTime;
use App\Models\Order;

class ReportController extends Controller
{
    public function reports()
    {
        return view('backend.report.view');
    }

    public function searchByDate(Request $request)
    {

        $data = new DateTime($request->date);
        $title = $data->format('F d Y');
        // return $format_date;

        $orders = Order::where('order_date', $title)->latest()->get();

        return view('backend.report.report_show', compact('orders', 'title'));

    }


    public function searchByMonth(Request $request)
    {
        $month = $request->month;
        $year = $request->year;
        $title = 'Kết quả tháng '.$month.' trong năm '.$year;
        $orders = Order::where('order_month', $request->month)->where('order_year', $request->year)->latest()->get();

        return view('backend.report.report_show', compact('orders', 'title'));

    }


    public function searchByYear(Request $request)
    {

        $title = $request->year;
        $orders = Order::where('order_year', $request->year)->latest()->get();

        return view('backend.report.report_show', compact('orders', 'title'));

    }









}































