<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class ReturnController extends Controller
{
    public function returnRequest()
    {

        $orders = Order::where('return_order', 1)->orderBy('id', 'DESC')->get();

        return view('backend.order.order_return', compact('orders'));

    }


    public function returnApprove($order_id)
    {

        Order::findOrFail($order_id)->update([
            'return_order' => 2,
        ]);

        $notification = array(
            'message' => 'Order Return Approved',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }


    public function allReturnOrders()
    {

        $orders = Order::where('return_order', 2)->orderBy('id', 'DESC')->get();

        return view('backend.order.order_return_all', compact('orders'));

    }

























}
