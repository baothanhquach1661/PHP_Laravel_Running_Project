<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Coupon;
use App\Models\City;
use App\Models\Province;
use App\Models\Ward;
use Gloudemans\Shoppingcart\Facades\Cart;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        if ($product->discount_price == NULL){

            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'slug' => $product->product_slug,
                'price' => $product->selling_price,
                'qty' => 1,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_thumbnail,
                    'size' => $request->size,
                    'color' => $request->color,
                ],
            ]);

            $notification = array(
                'message' => 'Item Successfully Added To Your Cart',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);

        }else{

            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'slug' => $product->product_slug,
                'price' => $product->discount_price,
                'qty' => 1,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_thumbnail,
                    'size' => $request->size,
                    'color' => $request->color,
                ],
            ]);

            $notification = array(
                'message' => 'Item Successfully Added To Your Cart',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);

        }

    } // end method


    public function addMiniToCart()
    {

        $carts = Cart::content();
        $cartQty = Cart::count();

        $cartTotal = (int)str_replace(',','',Cart::total());

        return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartTotal' => $cartTotal.'₫',
        ));
    }


    public function removeMiniCart($rowId){
        Cart::remove($rowId);
        return response()->json(['success' => 'Item Removed Successfully From Your Cart']);

    } // end mehtod 


    public function couponApply(Request $request)
    {
        $coupon = Coupon::where('coupon_name',$request->coupon_name)->where('coupon_validity','>=',Carbon::now()->format('Y-m-d'))->first();

        $total = (int)str_replace(',','',Cart::total());

        if ($coupon) {

            Session::put('coupon',[
                'coupon_name' => $coupon->coupon_name,
                'discount_percentage' => $coupon->discount_percentage,
                'discount_regular' => number_format($coupon->discount_regular, 0, '.', ','),

                'discount_percentage_amount' =>  round($total * $coupon->discount_percentage/100),
                'total_percentage_amount' => number_format($total - $total * $coupon->discount_percentage / 100, 0, '.', ','),

                'discount_regular_amount' =>  round($total * $coupon->discount_percentage/100),
                'total_regular_amount' => number_format($total - $coupon->discount_regular, 0, '.', ','),
                ]);

            return response()->json(array(

                'validity' => true,
                'success' => 'Mã Coupon đã được áp dụng'
            ));

        }else{
            return response()->json(['error' => 'Mã coupon không hợp lệ. Xin vui lòng thử lại']);
        }
        
    }


    public function couponCalculation()
    {
        $total = (int)str_replace(',','',Cart::total());

        if (Session::has('coupon')) {
            return response()->json(array(
                'subtotal' => Cart::total(),
                'coupon_name' => session()->get('coupon')['coupon_name'],
                'discount_percentage' => session()->get('coupon')['discount_percentage'],
                'discount_percentage_amount' => session()->get('coupon')['discount_percentage_amount'],

                'discount_regular' => session()->get('coupon')['discount_regular'],
                'discount_regular_amount' => session()->get('coupon')['discount_regular'],

                'total_percentage_amount' => session()->get('coupon')['total_percentage_amount'],
                'total_regular_amount' => session()->get('coupon')['total_regular_amount'],
            ));
        }else{
            return response()->json(array(
                'total' => $total,
            ));

        }
    }


    public function couponRemove(){
        Session::forget('coupon');
        return response()->json(['success' => 'Bạn đã gỡ mã giảm giá thành công']);
    }


    public function checkout()
    {
        if (Cart::total() > 0){

            $carts = Cart::content();
            $cartQty = Cart::count();

            $total = (int)str_replace(',','',Cart::total());
            $cartTotal = $total;


            $city_name = City::orderBy('matp', 'ASC')->get();

            return view('frontend.home.checkout', compact('carts', 'cartQty', 'cartTotal', 'city_name'));

        }else{
            $notification = array(
                'message' => 'Không có sản phẩm nào trong giỏ hàng của bạn cả',
                'alert-type' => 'error'
            );

            return redirect()->to('/')->with($notification);
        }
    }


    public function selectDelivery(Request $request)
    {
        $data = $request->all();

        if($data['action']){
            $output = '';
            if($data['action'] == 'city_id'){
                $select_province = Province::where('matp', $data['matp'])->orderBy('maqh', 'ASC')->get();
                $output.='<option>--Chọn--</option>';
                foreach($select_province as $key => $province){
                    $output.='<option value="'.$province->maqh.'">'.$province->province_name.'</option>';
                }
            }else{
                $select_ward = Ward::where('maqh', $data['matp'])->orderBy('xaid', 'ASC')->get();
                $output.='<option>--Chọn--</option>';
                foreach($select_ward as $key => $ward){
                    $output.='<option value="'.$ward->xaid.'">'.$ward->ward_name.'</option>';
                }
            }
        }
        echo $output;
    }































}






















