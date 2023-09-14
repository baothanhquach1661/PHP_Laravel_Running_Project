<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slide;
use Image;
use Illuminate\Support\Str;
use Carbon\Carbon;

class SlideController extends Controller
{
    public function index()
    {
        $slides = Slide::latest()->get();
        return view('backend.slide.index', compact('slides'));
    }
    

    public function create()
    {
        return view('backend.slide.create');
    }

    public function store(Request $request)
    {
        $request->validate([

            'slide_image' => 'required',
        ],[
            'slide_image.required' => 'Quên bỏ hình slide vô kề',

        ]);

        $image = $request->file('slide_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(1700,650)->save('upload/slides/'.$name_gen);
        $save_url = 'upload/slides/'.$name_gen;


        Slide::insert([
            'slide_name' => $request->slide_name,
            'title' => $request->title,
            'description' => $request->description,
            'slide_image' => $save_url,
            'created_at' => Carbon::now()

        ]);

        $notification = array(
            'message' => 'Slide Created Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('slide.management')->with($notification);

    } // end method


    public function edit($id)
    {
        $slide = Slide::find($id);
        return view('backend.slide.edit', compact('slide'));
    }


    public function update(Request $request)
    {
        $slide_id = $request->id;
        $old_image = $request->old_image;

        if ($request->file('slide_image')){

            unlink($old_image);

            $image = $request->file('slide_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

            Image::make($image)->resize(1700,650)->save('upload/slides/'.$name_gen);
            $save_url = 'upload/slides/'.$name_gen;

            Slide::findorfail($slide_id)->update([
                'slide_name' => $request->slide_name,
                'title' => $request->title,
                'description' => $request->description,
                'slide_image' => $save_url,
                'updated_at' => Carbon::now()
                
            ]);

            $notification = array(
                'message' => 'Slide Updated with Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('slide.management')->with($notification);
        } else {

            Slide::findorfail($slide_id)->update([
                'slide_name' => $request->slide_name,
                'title' => $request->title,
                'description' => $request->description,
                'updated_at' => Carbon::now()
                
            ]);

            $notification = array(
                'message' => 'Slide Updated Without Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('slide.management')->with($notification);
        } // end else

    } // end method


    public function delete($id)
    {
        $slide = Slide::findOrFail($id);
        $img = $slide->slide_image;
        unlink($img);
        Slide::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Slide Has Been Delete Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    public function inActive($id)
    {
        Slide::findOrFail($id)->update(['status' => 0]);

        $notification = array(
            'message' => 'Slide Inactive Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }


    public function active($id)
    {
        Slide::findOrFail($id)->update(['status' => 1]);

        $notification = array(
            'message' => 'Slide Active Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }


































}




















