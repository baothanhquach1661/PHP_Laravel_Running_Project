<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Image;
use Illuminate\Support\Str;
use Carbon\Carbon;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::latest()->get();
        return view('backend.brand.index', compact('brands'));
    }


    public function create()
    {
        return view('backend.brand.create');
    }


    public function store(Request $request)
    {
        $request->validate([

            'brand_image' => 'required',
        ],[
            'brand_image.required' => 'Please Insert Brand Image!!!',

        ]);

        $image = $request->file('brand_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('upload/brands/'.$name_gen);
        $save_url = 'upload/brands/'.$name_gen;


        Brand::insert([
            'brand_name' => $request->brand_name,
            'brand_slug' => Str::slug($request->brand_name),
            'title' => $request->title,
            'description' => $request->description,
            'brand_image' => $save_url,
            'created_at' => Carbon::now()

        ]);

        $notification = array(
            'message' => 'Brand Created Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('brand.management')->with($notification);
    } // end method


    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('backend.brand.edit', compact('brand'));
    }


    public function update(Request $request)
    {
        $brand_id = $request->id;
        $old_image = $request->old_image;

        if ($request->file('brand_image')){

            unlink($old_image);

            $image = $request->file('brand_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

            Image::make($image)->resize(300,300)->save('upload/brands/'.$name_gen);
            $save_url = 'upload/brands/'.$name_gen;

            Brand::findorfail($brand_id)->update([
                'brand_name' => $request->brand_name,
                'brand_slug' => Str::slug($request->brand_name),
                'title' => $request->title,
                'description' => $request->description,
                'brand_image' => $save_url,
                
            ]);

            $notification = array(
                'message' => 'Brand Updated with Logo Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('brand.management')->with($notification);
        } else {

            Brand::findorfail($brand_id)->update([
                'brand_name' => $request->brand_name,
                'brand_slug' => Str::slug($request->brand_name),
                'title' => $request->title,
                'description' => $request->description,
                'updated_at' => Carbon::now()
            ]);

            $notification = array(
                'message' => 'Brand Updated Without Logo Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('brand.management')->with($notification);
        } // end else
    }


    public function delete($id)
    {
        $brand = Brand::findOrFail($id);
        $img = $brand->brand_image;
        unlink($img);
        Brand::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Brand Has Been Delete Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    public function inActive($id)
    {
        Brand::findOrFail($id)->update(['status' => 0]);

        $notification = array(
            'message' => 'Brand Inactive Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }


    public function active($id)
    {
        Brand::findOrFail($id)->update(['status' => 1]);

        $notification = array(
            'message' => 'Brand Active Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }




























}
