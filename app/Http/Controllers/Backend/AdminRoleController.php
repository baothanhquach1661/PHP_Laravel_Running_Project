<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Image;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminRoleController extends Controller
{
    public function admins()
    {
        $admins = Admin::where('type', 2)->latest()->get();
        return view('backend.role.admin_role', compact('admins'));

    } // end method


    public function adminCreate()
    {
        return view('backend.role.create_admin');
    }


    public function adminStore(Request $request)
    {

        $request->validate([

            'profile_photo_path' => 'required',
            'email' => 'required|unique:admins',
            'phone' => 'required|unique:admins',
        ],[
            'profile_photo_path.required' => 'Please Insert Avatar!!!',
            'email.unique' => 'Email đã được sử dụng',
            'phone.unique' => 'Số điện thoại đã được sử dụng!!!',

        ]);

        $image = $request->file('profile_photo_path');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->save('upload/admin_images/'.$name_gen);
        $save_url = 'upload/admin_images/'.$name_gen;


        Admin::insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),

            'brand' => $request->brand,
            'category' => $request->category,
            'subcategory' => $request->subcategory,
            'product' => $request->product,
            'slider' => $request->slider,
            'coupon' => $request->coupon,
            'delivery' => $request->delivery,
            'blog' => $request->blog,
            'setting' => $request->setting,
            'return_order' => $request->return_order,
            'review' => $request->review,
            'orders' => $request->orders,
            'stock' => $request->stock,
            'report' => $request->report,
            'all_client' => $request->all_client,
            'admin_user_role' => $request->admin_user_role,

            'type' => 2,

            'profile_photo_path' => $save_url,
            'created_at' => Carbon::now()

        ]);

        $notification = array(
            'message' => 'Admin Created Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin-role')->with($notification);

    }


    public function adminEdit($id)
    {
        $admin_user = Admin::findOrFail($id);
        return view('backend.role.edit_admin', compact('admin_user'));
    }


    public function adminUpdate(Request $request)
    {
        $admin_id = $request->id;
        $old_image = $request->old_image;

        if ($request->file('profile_photo_path')){

            unlink($old_image);

            $image = $request->file('profile_photo_path');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

            Image::make($image)->save('upload/admin_images/'.$name_gen);
            $save_url = 'upload/admin_images/'.$name_gen;

            Admin::findorfail($admin_id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,

                'brand' => $request->brand,
                'category' => $request->category,
                'subcategory' => $request->subcategory,
                'product' => $request->product,
                'slider' => $request->slider,
                'delivery' => $request->delivery,
                'blog' => $request->blog,
                'setting' => $request->setting,
                'return_order' => $request->return_order,
                'review' => $request->review,
                'orders' => $request->orders,
                'stock' => $request->stock,
                'report' => $request->report,
                'all_client' => $request->all_client,
                'admin_user_role' => $request->admin_user_role,

                'type' => 2,

                'profile_photo_path' => $save_url,
                'updated_at' => Carbon::now()
                
            ]);

            $notification = array(
                'message' => 'Admin Information Updated with Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('admin-role')->with($notification);
        } else {

            Admin::findorfail($admin_id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,

                'brand' => $request->brand,
                'category' => $request->category,
                'subcategory' => $request->subcategory,
                'product' => $request->product,
                'slider' => $request->slider,
                'delivery' => $request->delivery,
                'blog' => $request->blog,
                'setting' => $request->setting,
                'return_order' => $request->return_order,
                'review' => $request->review,
                'orders' => $request->orders,
                'stock' => $request->stock,
                'report' => $request->report,
                'all_client' => $request->all_client,
                'admin_user_role' => $request->admin_user_role,

                'type' => 2,

                'updated_at' => Carbon::now()
                
            ]);

            $notification = array(
                'message' => 'Admin Information Updated Without Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('admin-role')->with($notification);
        } // end else

    } // end method


    public function adminDelete($id)
    {
        $admin = Admin::findOrFail($id);
        $img = $admin->profile_photo_path;
        unlink($img);
        Admin::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Admin Has Been Delete Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }






































}


















