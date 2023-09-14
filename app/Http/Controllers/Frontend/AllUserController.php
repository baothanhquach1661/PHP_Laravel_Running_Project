<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\City;
use App\Models\Province;
use App\Models\Ward;
use App\Models\User;
use App\Models\ShippingFees;
use Illuminate\Support\Facades\Session;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderMail;
use PDF;

class AllUserController extends Controller
{
    
    public function orderDetails($order_id)
    {
        $order = Order::with('city','province','ward','user')->where('id', $order_id)->where('user_id',Auth::id())->first();
        $orderDetail = OrderDetail::with('product')->where('order_id', $order_id)->orderBy('id','DESC')->get();

        return view('frontend.home.order_details',compact('order','orderDetail'));
    }


    public function invoiceDownload($order_id)
    {
        $order = Order::with('city','province','ward','user')->where('id', $order_id)->where('user_id',Auth::id())->first();
        $orderDetail = OrderDetail::with('product')->where('order_id', $order_id)->orderBy('id','DESC')->get();

        $pdf = PDF::loadView('frontend.home.order_invoice', compact('order','orderDetail'))->setPaper('a4')->setOptions([
                'tempDir' => public_path(),
                'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');

        // return view('frontend.home.order_invoice',compact('order','orderDetail'));
    }


    public function orderReturn(Request $request, $order_id)
    {

        Order::findOrFail($order_id)->update([
            'return_date' => Carbon::now()->format('F d Y'),
            'return_reason' => $request->return_reason,
            'return_order' => 1,
        ]);

        $notification = array(
            'message' => 'Yêu cầu hủy đơn hàng đã được gửi thành công',
            'alert-type' => 'success'
        );

        return redirect()->route('dashboard')->with($notification);

    }


    public function orderTracking(Request $request)
    {

        $invoice = $request->invoice;

        $track = Order::where('invoice_no', $invoice)->first();

        if ($track) {

            return view('frontend.tracking.order_tracking', compact('track'));

        }else{

            $notification = array(
                'message' => 'Invoice không hợp lệ, xin thử lại!',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        }


    }


















































}
