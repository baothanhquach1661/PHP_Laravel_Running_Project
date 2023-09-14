<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteSetting;
use App\Models\Seo;
use Image;
use Carbon\Carbon;

class SiteSettingController extends Controller
{
    public function site()
    {
        $site = SiteSetting::find(1);
        return view('backend.site_setting.site', compact('site'));
    }


    public function update(Request $request)
    {
        $header_id = $request->id;
        $old_image = $request->old_image;
        //unlink($old_image);

        $image = $request->file('logo_header');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

        Image::make($image)->resize(160,40)->save('upload/footer/'.$name_gen);
        $save_url = 'upload/footer/'.$name_gen;

        SiteSetting::findorfail($header_id)->update([
            'logo_header' => $save_url,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Header Logo Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
        
         
    }


    public function seo()
    {
        $seo = Seo::find(1);
        return view('backend.site_setting.seo', compact('seo'));
    }


    public function seoUpdate(Request $request)
    {
        $seo_id = $request->id;

        Seo::findorfail($seo_id)->update([
            'meta_title' => $request->meta_title,
            'meta_author' => $request->meta_author,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description,
            'google_analystics' => $request->google_analystics,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Seo setting Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
        
         
    }
































}
