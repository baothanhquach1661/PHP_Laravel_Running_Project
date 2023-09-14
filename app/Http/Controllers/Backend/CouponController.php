<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use App\Models\CouponImage;
use Image;
use Illuminate\Support\Str;
use Carbon\Carbon;

class CouponController extends Controller
{
    public function index()
    {
        $coupons = Coupon::latest()->get();
        return view('backend.coupon.index', compact('coupons'));
    }


    public function create()
    {
        return view('backend.coupon.create');
    }


    public function store(Request $request)
    {

        Coupon::insert([
            'coupon_name' => $request->coupon_name,
            'title' => $request->title,
            'description' => $request->description,
            'discount_regular' => $request->discount_regular,
            'discount_percentage' => $request->discount_percentage,
            'coupon_validity' => $request->coupon_validity,
            'description' => $request->description,
            'created_at' => Carbon::now()

        ]);

        $notification = array(
            'message' => 'Coupon Created Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('coupon.management')->with($notification);

    } // end method


    public function edit($id)
    {
        $coupon = Coupon::find($id);
        return view('backend.coupon.edit', compact('coupon'));
    }


    public function update(Request $request)
    {
        $coupon_id = $request->id;
        $old_image = $request->old_image;

        if ($request->file('coupon_image')){

            unlink($old_image);

            $image = $request->file('coupon_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

            Image::make($image)->save('upload/coupons/'.$name_gen);
            $save_url = 'upload/coupons/'.$name_gen;

            Coupon::findorfail($coupon_id)->update([
                'coupon_name' => $request->coupon_name,
                'title' => $request->title,
                'description' => $request->description,
                'discount_regular' => $request->discount_regular,
                'discount_percentage' => $request->discount_percentage,
                'coupon_validity' => $request->coupon_validity,
                'coupon_image' => $save_url,
                'updated_at' => Carbon::now()
                
            ]);

            $notification = array(
                'message' => 'Coupon Updated with Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('coupon.management')->with($notification);
        } else {

            Coupon::findorfail($coupon_id)->update([
                'coupon_name' => $request->coupon_name,
                'title' => $request->title,
                'description' => $request->description,
                'discount_regular' => $request->discount_regular,
                'discount_percentage' => $request->discount_percentage,
                'coupon_validity' => $request->coupon_validity,
                'updated_at' => Carbon::now()
                
            ]);

            $notification = array(
                'message' => 'Coupon Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('coupon.management')->with($notification);
        } // end else

    } // end method


    public function delete($id)
    {
        $coupon = Coupon::findOrFail($id);
        $img = $coupon->coupon_image;
        unlink($img);
        Coupon::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Coupon Has Been Delete Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    public function inActive($id)
    {
        Coupon::findOrFail($id)->update(['status' => 0]);

        $notification = array(
            'message' => 'Coupon Inactive Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }


    public function active($id)
    {
        Coupon::findOrFail($id)->update(['status' => 1]);

        $notification = array(
            'message' => 'Coupon Active Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }


    public function couponImage()
    {   
        $coupon_image = CouponImage::find(1);
        return view('backend.coupon.coupon_image', compact('coupon_image'));
    }


    public function couponImageUpdate(Request $request)
    {
        $coupon_id = $request->id;
        $old_image = $request->old_image;

        if ($request->file('coupon_image')){

            unlink($old_image);

            $image = $request->file('coupon_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

            Image::make($image)->save('upload/coupons/'.$name_gen);
            $save_url = 'upload/coupons/'.$name_gen;

            CouponImage::findorfail($coupon_id)->update([
                'title' => $request->title,
                'coupon_image' => $save_url,
                'updated_at' => Carbon::now()
                
            ]);

            $notification = array(
                'message' => 'Coupon Background Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        } else {

            CouponImage::findorfail($coupon_id)->update([
                'title' => $request->title,
                'updated_at' => Carbon::now()
                
            ]);

            $notification = array(
                'message' => 'Coupon Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        } // end else
    }
































}
