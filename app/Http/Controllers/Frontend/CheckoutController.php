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

class CheckoutController extends Controller
{
    public function checkoutStoreReturnPage(Request $request)
    {   
        $delivery_fees = $request->order_fee;
        //dd($delivery_fees);

        if (Session::has('coupon')) {
            if(session()->get('coupon')['discount_regular'] == null){
                $total_amount = (int)Session::get('coupon')['total_percentage_amount'] + $delivery_fees;
            }else{
                $total_amount = (int)Session::get('coupon')['total_regular_amount'] + $delivery_fees;
            }
        }else{
            $total_amount = (int)Cart::total() + $delivery_fees;
        }

        // dd($total_amount);

        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_address'] = $request->shipping_address;
        $data['notes'] = $request->notes;

        $data['city_id'] = $request->city_id;
        $data['province_id'] = $request->province_id;
        $data['ward_id'] = $request->ward_id;


        $cartTotal = (int)str_replace(',','',Cart::total());


        if ($request->payment == 'transfer') {
            return view('frontend.payment.transfer', compact('data', 'cartTotal', 'total_amount', 'delivery_fees'));
        }elseif ($request->payment == 'cod') {
            return view('frontend.payment.cod', compact('data', 'cartTotal', 'total_amount', 'delivery_fees'));
        }else{
            return view('frontend.payment.momo', compact('data', 'cartTotal', 'total_amount', 'delivery_fees'));
        }

        

    } // end method

    public function calculateFee(Request $request)
    {
        $data = $request->all();
        
        if($data['matp']){
            $delivery_fees = ShippingFees::where('fee_matp', $data['matp'])
                                        ->where('fee_maqh', $data['maqh'])
                                        ->where('fee_xaid', $data['xaid'])->get();
            if($delivery_fees){
                $count_fee = $delivery_fees->count();
                if($count_fee > 0){
                    foreach ($delivery_fees as $key => $fee) {
                        Session::put('fee', $fee->shipping_fees);
                        Session::save();
                    }
                }else{
                    Session::put('fee', 30000);
                    Session::save();
                }
            } 
        }



    } // end method


    public function deleteFee()
    {
        Session::forget('fee');
        return redirect()->back();
    }



    public function codCheckoutStore(Request $request)
    {
        $delivery_fees = $request->order_fee;
        //dd($delivery_fees);

        if (Session::has('coupon')) {
            if(Session::get('coupon')['discount_regular'] > 0){
                $total1 = Session::get('coupon')['total_regular_amount'];
                $total2 = (int)str_replace(',','',$total1);
                $total_amount = $total2 + $delivery_fees;
            }else{
                $total1 = Session::get('coupon')['total_percentage_amount'];
                $total2 = (int)str_replace(',','',$total1);
                $total_amount = $total2 + $delivery_fees;
            }
        }else{
            $total = (int)str_replace(',','',Cart::total());
            $total_amount = $total + $delivery_fees;
        }

        if (Auth::id()) {
            $user_id = Auth::id();
        }else{
            $user_id = 0;
        }

        //dd($total1);

        $order_id = Order::insertGetId([
            'user_id' => $user_id,
            'city_id' => $request->city_id,
            'province_id' => $request->province_id,
            'ward_id' => $request->ward_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->shipping_address,
            'notes' => $request->notes,

            'payment_type' => 'cod',
            'payment_method' => 'Thanh Toán Khi Nhận Hàng',
            'order_number' => random_int(1000000,9999999),
            'currency' => 'VND',
            'amount' => $total_amount,

            'invoice_no' => 'RA'.mt_rand(10000000,99999999),
            'order_date' => Carbon::now()->format('F d Y'),
            'order_month' => Carbon::now()->format('F'),
            'order_year' => Carbon::now()->format('Y'),
            'shipping_fee' => $request->order_fee,
            'status' => 'Pending',
            'created_at' => Carbon::now(),  

        ]);

        // Start Send Email 
         $invoice = Order::findOrFail($order_id);
            $data = [
                'invoice_no' => $invoice->invoice_no,
                'amount' => $total_amount,
                'name' => $invoice->name,
                'email' => $invoice->email,
            ];

            Mail::to($request->email)->send(new OrderMail($data));

         // End Send Email 



        $carts = Cart::content();

        foreach ($carts as $cart) {
            OrderDetail::insert([
                'order_id' => $order_id, 
                'product_id' => $cart->id,
                'color' => $cart->options->color,
                'size' => $cart->options->size,
                'qty' => $cart->qty,
                'price' => $cart->price,
                'created_at' => Carbon::now(),

            ]);
        }

        if (Session::has('coupon')) {
            Session::forget('coupon');
        }

        Cart::destroy();

        $notification = array(
            'message' => 'Đơn hàng đã được hoàn tất',
            'alert-type' => 'success'
        );

        if (Auth::check()) {
            Session::forget('fee');
            return redirect()->route('dashboard')->with($notification);
        }else{
            Session::forget('fee');
            return redirect()->route('index')->with($notification);
        }
        


    } // end method


    public function transferCheckoutStore(Request $request)
    {

        $delivery_fees = $request->order_fee;
        //dd($delivery_fees);

        if (Session::has('coupon')) {
            if(Session::get('coupon')['discount_regular'] > 0){
                $total1 = Session::get('coupon')['total_regular_amount'];
                $total2 = (int)str_replace(',','',$total1);
                $total_amount = $total2 + $delivery_fees;
            }else{
                $total1 = Session::get('coupon')['total_percentage_amount'];
                $total2 = (int)str_replace(',','',$total1);
                $total_amount = $total2 + $delivery_fees;
            }
        }else{
            $total = (int)str_replace(',','',Cart::total());
            $total_amount = $total + $delivery_fees;
        }


        if (Auth::id()) {
            $user_id = Auth::id();
        }else{
            $user_id = 0;
        }

        //dd($total_amount);

        $order_id = Order::insertGetId([
            'user_id' => $user_id,
            'city_id' => $request->city_id,
            'province_id' => $request->province_id,
            'ward_id' => $request->ward_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->shipping_address,
            'notes' => $request->notes,

            'payment_type' => 'transfer',
            'payment_method' => 'Chuyển khoản qua ngân hàng',
            'order_number' => random_int(1000000,9999999),
            'currency' => 'VND',
            'amount' => $total_amount,

            'invoice_no' => 'RA'.mt_rand(10000000,99999999),
            'order_date' => Carbon::now()->format('F d Y'),
            'order_month' => Carbon::now()->format('F'),
            'order_year' => Carbon::now()->format('Y'),
            'shipping_fee' => $request->order_fee,
            'status' => 'Pending',
            'created_at' => Carbon::now(),  

        ]);

        // Start Send Email 
        $invoice = Order::findOrFail($order_id);
        $data = [
            'invoice_no' => $invoice->invoice_no,
            'amount' => $total_amount,
            'name' => $invoice->name,
            'email' => $invoice->email,
        ];

        Mail::to($request->email)->send(new OrderMail($data));
         // End Send Email 



        $carts = Cart::content();

        foreach ($carts as $cart) {
            OrderDetail::insert([
                'order_id' => $order_id, 
                'product_id' => $cart->id,
                'color' => $cart->options->color,
                'size' => $cart->options->size,
                'qty' => $cart->qty,
                'price' => $cart->price,
                'created_at' => Carbon::now(),

            ]);
        }

        if (Session::has('coupon')) {
            Session::forget('coupon');
        }

        Cart::destroy();

        $notification = array(
            'message' => 'Đơn hàng đã được hoàn tất',
            'alert-type' => 'success'
        );

        if (Auth::check()) {
            Session::forget('fee');
            return redirect()->route('dashboard')->with($notification);
        }else{
            Session::forget('fee');
            return redirect()->route('index')->with($notification);
        }
        


    } // end method




























}






























