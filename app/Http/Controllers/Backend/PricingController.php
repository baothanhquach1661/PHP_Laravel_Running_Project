<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\pricing;
use App\Models\pricing_banner;
use Carbon\Carbon;
use Image;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PricingController extends Controller
{
    public function index()
    {
        $pricing = Pricing::latest()->get();

        return view('backend.pricing.index', compact('pricing'));
    }


    public function create()
    {
        return view('backend.pricing.create');
    }


    public function store(Request $request)
    {

        $image = $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(640,360)->save('upload/pricing/image/'.$name_gen);
        $save_url = 'upload/pricing/image/'.$name_gen;

        $pricing_id = pricing::insertGetId([
            'name' => $request->name,
            'title' => $request->title,
            'title_slug' => Str::slug($request->title),

            'short_description' => $request->short_description,
            'long_description' => $request->long_description,

            'image' => $save_url,
            'status' => 1,
            'created_at' => Carbon::now(),

        ]);


        ////////// Multiple Image Upload Start ///////////

        $banner = $request->file('banner');

        $make_name = hexdec(uniqid()).'.'.$banner->getClientOriginalExtension();
        Image::make($banner)->resize(1600,750)->save('upload/pricing/banner/'.$make_name);
        $uploadPath = 'upload/pricing/banner/'.$make_name;


        pricing_banner::insert([

            'pricing_id' => $pricing_id,
            'photo_name' => $uploadPath,
            'created_at' => Carbon::now(), 

        ]);

      ////////// End Multiple Image Upload ///////////

        $notification = array(
            'message' => 'Pricing list Created Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('pricing.management')->with($notification);

    } // end method


    public function edit($id)
    {
        $banner = pricing_banner::where('pricing_id', $id)->get();
        $pricing_list = pricing::findOrFail($id);

        return view('backend.pricing.edit',compact('banner', 'pricing_list'));
    }


    public function update(Request $request)
    {
        $pricing_id = $request->id;

        pricing::findOrFail($pricing_id)->update([
        'name' => $request->name,
        'title' => $request->title,
        'title_slug' => Str::slug($request->title),

        'short_description' => $request->short_description,
        'long_description' => $request->long_description,
                  
        'status' => 1,
        'updated_at' => Carbon::now(),   

      ]);

      $notification = array(
        'message' => 'Pricing List Updated Without Image Successfully',
        'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    public function updateWithBanner(Request $request)
    {
        $imgs = $request->pricing_banner;

        if($request->file('pricing_banner')){
            foreach ($imgs as $id => $img) {
                $imgDel = pricing_banner::findOrFail($id);

                $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
                Image::make($img)->resize(1600,750)->save('upload/pricing/banner/'.$make_name);
                $uploadPath = 'upload/pricing/banner/'.$make_name;

                pricing_banner::where('id',$id)->update([
                    'photo_name' => $uploadPath,
                    'updated_at' => Carbon::now(),
                ]);
            } // end foreach

            $notification = array(
                'message' => 'Pricing List Banner Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);

        }
    }


    public function updateImage(Request $request)
    {
        $pricing_id = $request->id;
        $oldImage = $request->old_img;
        //unlink($oldImage);

        $image = $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(640,360)->save('upload/pricing/image/'.$name_gen);
        $save_url = 'upload/pricing/image/'.$name_gen;

        pricing::findOrFail($pricing_id)->update([
            'image' => $save_url,
            'updated_at' => Carbon::now(),

        ]);

         $notification = array(
            'message' => 'Pricing List Image Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }


    public function delete($id)
    {
        $price_list = pricing::findOrFail($id);
        unlink($price_list->image);
        pricing::findOrFail($id)->delete();

        $images = pricing_banner::where('pricing_id',$id)->get();
        foreach ($images as $img) {
            unlink($img->photo_name);
            pricing_banner::where('pricing_id',$id)->delete();
        }

        $notification = array(
            'message' => 'Pricing List Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    public function pricingInactive($id)
    {
        pricing::findOrFail($id)->update(['status' => 0]);
        $notification = array(
            'message' => 'Pricing List Inactive',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    public function pricingActive($id)
    {
        pricing::findOrFail($id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Pricing List Active',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }






















}





















