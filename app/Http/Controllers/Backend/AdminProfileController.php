<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    public function adminProfile()
    {
        $id = Auth::user()->id;
        $adminData = Admin::find($id);
        return view('backend.admin.admin_profile', compact('adminData'));
    }

    public function adminProfileStore(Request $request)
    {   
        // $id = Auth::user()->id;
        $id = Auth::guard('admin')->id();
        $data = Admin::find($id);
        $data->name = $request->name;
        $data->email = $request->email;

        
        if ($request->file('profile_photo_path')) {
            $image = $request->file('profile_photo_path');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->save('upload/admin_images/'.$name_gen);
            $save_url = 'upload/admin_images/'.$name_gen;
            $data['profile_photo_path'] = $save_url;
        }

        $data->save();

        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.profile')->with($notification);
    } // end method


    public function adminChangePassword(Request $request)
    {
        $validateData = $request->validate([
            'current_password' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ]);

        $hashedPassword = Auth::user()->password;

        if (Hash::check($request->current_password, $hashedPassword)){
            $admin = Admin::find(Auth::id());
            $admin->password = Hash::make($request->password);
            $admin->save();

            $notification = array(
                'message' => 'Password updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        }else{

            $notification = array(
                'message' => 'Something Wrong, please try again!',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        }
    } // end method


    public function users()
    {
        $users = User::latest()->get();
        return view('backend.user.view', compact('users'));
    }









}














































