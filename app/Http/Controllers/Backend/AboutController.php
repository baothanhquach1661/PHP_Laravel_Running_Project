<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use App\Models\TeamImgs;
use Image;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::find(1);
        $teamImgs = TeamImgs::where('about_id', 1)->get();

        return view('backend.about.index', compact('about', 'teamImgs'));
    }


    public function updateWithoutImage(Request $request)
    {
        $about_id = $request->id;

        About::findOrFail($about_id)->update([
            'about_title' => $request->about_title,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,

            'box_1_title' => $request->box_1_title,
            'box_1_des' => $request->box_1_des,

            'box_2_title' => $request->box_2_title,
            'box_2_des' => $request->box_2_des,

            'box_3_title' => $request->box_3_title,
            'box_3_des' => $request->box_3_des,

            'updated_at' => Carbon::now(),   

        ]);

          $notification = array(
            'message' => 'About Updated Without Image Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('about.management')->with($notification);
    }


    public function updateAboutImage(Request $request)
    {
        $about_id = $request->id;
        $oldImage = $request->old_img;
        unlink($oldImage);

        $image = $request->file('about_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(400,480)->save('upload/about/'.$name_gen);
        $save_url = 'upload/about/'.$name_gen;

        About::findOrFail($about_id)->update([
            'about_image' => $save_url,
            'updated_at' => Carbon::now(),

        ]);

         $notification = array(
            'message' => 'Hình nền của trang giới thiệu đã được đổi mới',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    public function updateTeamImgs(Request $request)
    {

        $team_id = $request->id;
        $old_image = $request->old_image;

        if ($request->file('photo_name')){

            unlink($old_image);

            $image = $request->file('photo_name');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

            Image::make($image)->resize(330,380)->save('upload/about/'.$name_gen);
            $save_url = 'upload/about/'.$name_gen;

            TeamImgs::findorfail($team_id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'photo_name' => $save_url,
                'updated_at' => Carbon::now()
                
            ]);

            $notification = array(
                'message' => 'Member Updated with Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('about.management')->with($notification);
        } else {

            TeamImgs::findorfail($team_id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'updated_at' => Carbon::now()
                
            ]);

            $notification = array(
                'message' => 'Member Updated Without Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('about.management')->with($notification);
        } // end else


    } // end method


    public function TeamImgDelete($id)
    {
        $oldimg = TeamImgs::findOrFail($id);
        unlink($oldimg->photo_name);

        TeamImgs::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Hình nền member đã được xóa thành công',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    public function createTeamImg($id)
    {
        $about = About::findOrFail($id);
        return view('backend.about.create_teamImg', compact('about'));
    }


    public function editTeamImg($id)
    {
        $teamImgs = TeamImgs::find($id);
        return view('backend.about.edit_teamImg', compact('teamImgs'));
    }


    public function storeTeamImg(Request $request)
    {
        $images = $request->file('team_img');
        $about_id = $request->id;

        $make_name = hexdec(uniqid()).'.'.$images->getClientOriginalExtension();
        Image::make($images)->resize(330,380)->save('upload/about/'.$make_name);
        $uploadPath = 'upload/about/'.$make_name;

        TeamImgs::where('about_id', $about_id)->insert([
            'about_id' => $about_id,
            'title' => $request->title,
            'description' => $request->description,
            'photo_name' => $uploadPath,
            'created_at' => Carbon::now(), 
        ]);


        $notification = array(
            'message' => 'Member Image Created Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('about.management')->with($notification);
    }





















}


































