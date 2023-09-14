<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\banner_adv;
use Image;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BannerAdvController extends Controller
{
    public function index()
    {
        $banner2 = banner_adv::latest()->get();
        return view('backend.banner2.index', compact('banner2'));
    }
    

    public function create()
    {
        return view('backend.banner2.create');
    }


    public function store(Request $request)
    {
        $request->validate([

            'banner_photo' => 'required',
        ],[
            'banner_photo.required' => 'Quên bỏ hình banner vô kề',

        ]);

        $image = $request->file('banner_photo');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(1600,600)->save('upload/banners/'.$name_gen);
        $save_url = 'upload/banners/'.$name_gen;


        banner_adv::insert([
            'banner_name' => $request->banner_name,
            'title' => $request->title,
            'description' => $request->description,
            'banner_photo' => $save_url,
            'created_at' => Carbon::now()

        ]);

        $notification = array(
            'message' => 'Banner Created Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('banner2.management')->with($notification);

    } // end method


    public function edit($id)
    {
        $banner = banner_adv::find($id);
        return view('backend.banner2.edit', compact('banner'));
    }


    public function update(Request $request)
    {
        $banner_id = $request->id;
        $old_image = $request->old_image;

        if ($request->file('banner_photo')){

            unlink($old_image);

            $image = $request->file('banner_photo');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

            Image::make($image)->resize(1600,600)->save('upload/banners/'.$name_gen);
            $save_url = 'upload/banners/'.$name_gen;

            banner_adv::findorfail($banner_id)->update([
                'banner_name' => $request->banner_name,
                'title' => $request->title,
                'description' => $request->description,
                'banner_photo' => $save_url,
                'updated_at' => Carbon::now()
                
            ]);

            $notification = array(
                'message' => 'Banner Updated with Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('banner2.management')->with($notification);
        } else {

            banner_adv::findorfail($banner_id)->update([
                'banner_name' => $request->banner_name,
                'title' => $request->title,
                'description' => $request->description,
                'updated_at' => Carbon::now()
                
            ]);

            $notification = array(
                'message' => 'Banner Updated Without Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('banner2.management')->with($notification);
        } // end else

    } // end method


    public function delete($id)
    {
        $banner = banner_adv::findOrFail($id);
        $img = $banner->banner_photo;
        unlink($img);
        banner_adv::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Banner Has Been Delete Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    public function inActive($id)
    {
        banner_adv::findOrFail($id)->update(['status' => 0]);

        $notification = array(
            'message' => 'Banner Inactive Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }


    public function active($id)
    {
        banner_adv::findOrFail($id)->update(['status' => 1]);

        $notification = array(
            'message' => 'Banner Active Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }

























}













