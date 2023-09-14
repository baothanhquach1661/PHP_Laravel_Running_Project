<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Auth;
use Carbon\Carbon;
use PDF;
use DB;

class OrderController extends Controller
{   

    // all orders method
    public function allOrders()
    {

        $orders = Order::orderBy('id', 'ASC')->get();

        return view('backend.order.all_orders', compact('orders'));

    } // end method


    // pending order method
    public function pendingOrders()
    {

        $orders = Order::where('status', 'Pending')->orderBy('id', 'DESC')->get();

        return view('backend.order.pending_orders', compact('orders'));

    } // end method


    public function pendingOrderEdit($order_id)
    {

        $order = Order::with('city','province','ward','user')->where('id', $order_id)->first();

        $orderDetail = OrderDetail::with('product')->where('order_id', $order_id)->orderBy('id','DESC')->get();

        return view('backend.order.pending_order_details', compact('order', 'orderDetail'));

    } // end method


    public function confirmedOrders()
    {

        $orders = Order::where('status', 'Confirmed')->orderBy('id', 'DESC')->get();

        return view('backend.order.confirmed_orders', compact('orders'));

    } // end method


    public function processingOrders()
    {

        $orders = Order::where('status', 'Processing')->orderBy('id', 'DESC')->get();

        return view('backend.order.processing_orders', compact('orders'));

    } // end method


    public function pickedOrders()
    {

        $orders = Order::where('status', 'Picked')->orderBy('id', 'DESC')->get();

        return view('backend.order.picked_orders', compact('orders'));

    } // end method


    public function shippedOrders()
    {

        $orders = Order::where('status', 'Shipped')->orderBy('id', 'DESC')->get();

        return view('backend.order.shipped_orders', compact('orders'));

    } // end method


    public function deliveredOrders()
    {

        $orders = Order::where('status', 'Delivered')->orderBy('id', 'DESC')->get();

        return view('backend.order.delivered_orders', compact('orders'));

    } // end method


    public function cancelOrders()
    {

        $orders = Order::where('status', 'Cancel')->orderBy('id', 'DESC')->get();

        return view('backend.order.cancel_orders', compact('orders'));

    } // end method


    public function pendingToConfirm($order_id)
    {

        Order::findOrFail($order_id)->update([
            'status' => 'Confirmed'
        ]);

        $notification = array(
            'message' => 'Order confirmed Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('confirmed-orders')->with($notification);

    }

    public function confirmToProcessing($order_id)
    {

        Order::findOrFail($order_id)->update([
            'status' => 'Processing'
        ]);

        $notification = array(
            'message' => 'Order turn into processing step',
            'alert-type' => 'success'
        );

        return redirect()->route('processing-orders')->with($notification);

    }


    public function processingToPicked($order_id)
    {

        Order::findOrFail($order_id)->update([
            'status' => 'Picked'
        ]);

        $notification = array(
            'message' => 'Order turn into Picked step',
            'alert-type' => 'success'
        );

        return redirect()->route('picked-orders')->with($notification);

    }

    public function pickedToShipped($order_id)
    {

        Order::findOrFail($order_id)->update([
            'status' => 'Shipped'
        ]);

        $notification = array(
            'message' => 'Order turn into Shipped step',
            'alert-type' => 'success'
        );

        return redirect()->route('shipped-orders')->with($notification);

    }

    public function shippedToDelivered($order_id)
    {   
        $product = OrderDetail::where('order_id', $order_id)->get();

        foreach($product as $item){
            Product::where('id', $item->product_id)->update([
                'product_qty' => DB::raw('product_qty-'.$item->qty)
            ]);
        }

        Order::findOrFail($order_id)->update([
            'status' => 'Delivered',
        ]);

        $notification = array(
            'message' => 'Order turn into Delivered step',
            'alert-type' => 'success'
        );

        return redirect()->route('delivered-orders')->with($notification);

    }


    public function invoiceDownloadAdmin($order_id)
    {
        $order = Order::with('city','province','ward','user')->where('id', $order_id)->first();
        $orderDetail = OrderDetail::with('product')->where('order_id', $order_id)->orderBy('id','DESC')->get();

        $pdf = PDF::loadView('backend.order.order_invoice', compact('order','orderDetail'))->setPaper('a4')->setOptions([
                'tempDir' => public_path(),
                'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');

        // return view('frontend.home.order_invoice',compact('order','orderDetail'));
    }


    public function pendingOrderDelete($order_id)
    {
        Order::findOrFail($order->id)->delete();
    }









}


































