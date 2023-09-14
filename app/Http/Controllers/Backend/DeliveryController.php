<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Province;
use App\Models\Ward;
use App\Models\ShippingFees;


class DeliveryController extends Controller
{
    public function deliveryCreate(Request $request)
    {
        $city = City::orderBy('matp', 'ASC')->get();
        return view('backend.delivery.create_delivery_fee', compact('city'));
    }


    public function selectDelivery(Request $request)
    {
        $data = $request->all();

        if($data['action']){
            $output = '';
            if($data['action'] == 'city'){
                $select_province = Province::where('matp', $data['ma_id'])->orderBy('maqh', 'ASC')->get();
                $output.='<option>Chọn quận / huyện</option>';
                foreach($select_province as $key => $province){
                    $output.='<option value="'.$province->maqh.'">'.$province->province_name.'</option>';
                }
            }else{
                $select_ward = Ward::where('maqh', $data['ma_id'])->orderBy('xaid', 'ASC')->get();
                $output.='<option>Chọn phường / xã</option>';
                foreach($select_ward as $key => $ward){
                    $output.='<option value="'.$ward->xaid.'">'.$ward->ward_name.'</option>';
                }
            }
        }
        echo $output;
    }


    public function storeDelivery(Request $request)
    {
        $data = $request->all();
        // dd($data);
        $shipping_fee = new ShippingFees();
        $shipping_fee->fee_matp = $data['city'];
        $shipping_fee->fee_maqh = $data['province'];
        $shipping_fee->fee_xaid = $data['ward'];
        $shipping_fee->shipping_fees = $data['shipping_fees'];
        $shipping_fee->save();
    }


    public function showDelivery()
    {
        $shipping_fee = ShippingFees::orderBy('fee_id', 'DESC')->get();
        $output = '';
        $output .= 
        '<div class="table-response">
            <table class="table table-bordered">
                <thread>
                    <tr>
                        <th>Tên thành phố</th>
                        <th>Tên quận huyện</th>
                        <th>Tên xã phường</th>
                        <th>Phí vận chuyển</th>
                    </tr>
                </thread>
                <tbody>
                ';
                    foreach($shipping_fee as $fee){
                        
                        $output .= '<tr>
                            <td>'.$fee->city->city_name.'</td>
                            <td>'.$fee->province->province_name.'</td>
                            <td>'.$fee->ward->ward_name.'</td>
                            <td>
                                <div contenteditable data-shippingfee_id="'.$fee->fee_id.'" class="fee_edit">
                                    '.number_format($fee->shipping_fees,0,',','.').'
                                </div>
                            </td>
                        </tr>
                        ';
                    }
                    
                $output .= '
                </tbody>
            </table>
        </div>';

        echo $output;
    }


    public function updateDeliveryFee(Request $request)
    {
        $data = $request->all();
        $shipping_fee = ShippingFees::find($data['shippingfee_id']);
        $fee_value = rtrim($data['fee_value'],'.');
        $shipping_fee->shipping_fees = $fee_value;
        $shipping_fee->save();

        $notification = array(
            'message' => 'Phí vận chuyển đã được cập nhật',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }















































}

















