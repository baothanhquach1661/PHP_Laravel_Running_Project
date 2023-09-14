<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FooterSetting;
use Image;
use Carbon\Carbon;

class FooterController extends Controller
{
    public function edit()
    {
        $footer = FooterSetting::find(1);
        return view('backend.site_setting.footer_setting', compact('footer'));
    }


    public function update(Request $request)
    {
        $footer_id = $request->id;
        $old_image = $request->old_image;


        if ($request->file('logo_footer')){

            unlink($old_image);

            $image = $request->file('logo_footer');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

            Image::make($image)->resize(160,40)->save('upload/footer/'.$name_gen);
            $save_url = 'upload/footer/'.$name_gen;

            FooterSetting::findorfail($footer_id)->update([
                'address' => $request->address,
                'phone1' => $request->phone1,
                'phone2' => $request->phone2,
                'phone3' => $request->phone3,

                'title_col2' => $request->title_col2,
                'col_2_1' => $request->col_2_1,
                'col_2_2' => $request->col_2_2,
                'col_2_3' => $request->col_2_3,
                'col_2_4' => $request->col_2_4,
                'col_2_5' => $request->col_2_5,

                'title_col3' => $request->title_col3,
                'col_3_1' => $request->col_3_1,
                'col_3_2' => $request->col_3_2,
                'col_3_3' => $request->col_3_3,
                'col_3_4' => $request->col_3_4,

                'title_col4' => $request->title_col4,
                'col_4_1' => $request->col_4_1,
                'col_4_2' => $request->col_4_2,
                'col_4_3' => $request->col_4_3,
                'col_4_4' => $request->col_4_4,
                'col_4_5' => $request->col_4_5,
                'col_4_6' => $request->col_4_6,

                'logo_footer' => $save_url,
                'updated_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Footer Site Data Updated with Logo Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        } else {

            FooterSetting::findorfail($footer_id)->update([
                'address' => $request->address,
                'phone1' => $request->phone1,
                'phone2' => $request->phone2,
                'phone3' => $request->phone3,

                'title_col2' => $request->title_col2,
                'col_2_1' => $request->col_2_1,
                'col_2_2' => $request->col_2_2,
                'col_2_3' => $request->col_2_3,
                'col_2_4' => $request->col_2_4,
                'col_2_5' => $request->col_2_5,

                'title_col3' => $request->title_col3,
                'col_3_1' => $request->col_3_1,
                'col_3_2' => $request->col_3_2,
                'col_3_3' => $request->col_3_3,
                'col_3_4' => $request->col_3_4,

                'title_col4' => $request->title_col4,
                'col_4_1' => $request->col_4_1,
                'col_4_2' => $request->col_4_2,
                'col_4_3' => $request->col_4_3,
                'col_4_4' => $request->col_4_4,
                'col_4_5' => $request->col_4_5,
                'col_4_6' => $request->col_4_6,

                'updated_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Footer Site Data Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        } // end else
    }


































}
