<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use App\Models\Coupon;

class CartPageController extends Controller
{
    public function myCart()
    {
        return view('frontend.home.cart');
    }


    public function getCartProduct()
    {
        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();

        return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartTotal' => $cartTotal.'₫',
        ));
    }


    public function cartRemoveItem($rowId)
    {
        Cart::remove($rowId);

        if (Session::has('coupon')) {
            Session::forget('coupon');
        }
        return response()->json(['success' => 'Item Removed Successfully From Your Cart']);
    }


    public function cartQtyIncrement($rowId)
    {
        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty + 1);

        if (Session::has('coupon')) {

            $total = (int)str_replace(',','',Cart::total());

            $coupon_name = Session::get('coupon')['coupon_name'];
            $coupon = Coupon::where('coupon_name', $coupon_name)->first();

            Session::put('coupon',[
                'coupon_name' => $coupon->coupon_name,
                'discount_percentage' => $coupon->discount_percentage,
                'discount_regular' => number_format($coupon->discount_regular, 0, '.', ','),

                'discount_percentage_amount' =>  round($total * $coupon->discount_percentage/100),
                'total_percentage_amount' => number_format($total - $total * $coupon->discount_percentage / 100, 0, '.', ','),

                'discount_regular_amount' =>  round($total * $coupon->discount_percentage/100),
                'total_regular_amount' => number_format($total - $coupon->discount_regular, 0, '.', ','),
                ]);
        }

        return response()->json(['increment']);
    }


    public function cartQtyDecrement($rowId)
    {
        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty - 1);

        if (Session::has('coupon')) {

            $total = (int)str_replace(',','',Cart::total());

            $coupon_name = Session::get('coupon')['coupon_name'];
            $coupon = Coupon::where('coupon_name', $coupon_name)->first();

            Session::put('coupon',[
                'coupon_name' => $coupon->coupon_name,
                'discount_percentage' => $coupon->discount_percentage,
                'discount_regular' => number_format($coupon->discount_regular, 0, '.', ','),

                'discount_percentage_amount' =>  round($total * $coupon->discount_percentage/100),
                'total_percentage_amount' => number_format($total - $total * $coupon->discount_percentage / 100, 0, '.', ','),

                'discount_regular_amount' =>  round($total * $coupon->discount_percentage/100),
                'total_regular_amount' => number_format($total - $coupon->discount_regular, 0, '.', ','),
                ]);
        }

        return response()->json(['decrement']);
    }





















































}
