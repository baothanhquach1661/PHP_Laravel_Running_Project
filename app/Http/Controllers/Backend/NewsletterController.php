<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\NewsLetter;
use App\Models\CustomerNewsletter;
use Carbon\Carbon;
use Image;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function manage()
    {
        $newsletter = NewsLetter::find(1);
        return view('backend.site_setting.newsletter', compact('newsletter'));
    }


    public function update(Request $request)
    {
        $newsletter_id = $request->id;
        $old_image = $request->old_image;

        if ($request->file('image')){

            unlink($old_image);

            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

            Image::make($image)->resize(1300,400)->save('upload/banners/'.$name_gen);
            $save_url = 'upload/banners/'.$name_gen;

            NewsLetter::findorfail($newsletter_id)->update([
                'title' => $request->title,
                'image' => $save_url,
                'updated_at' => Carbon::now()
                
            ]);

            $notification = array(
                'message' => 'Newsletter Updated with Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        } else {

            NewsLetter::findorfail($newsletter_id)->update([
                'title' => $request->title,
                'updated_at' => Carbon::now()
                
            ]);

            $notification = array(
                'message' => 'Newsletter Updated Without Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        } // end else

    } // end method


    public function sendNewsletter(Request $request)
    {

        CustomerNewsletter::insert([

            'email' => $request->email,
            'status' => 1,
            'created_at' => Carbon::now(),

        ]);

         $notification = array(
            'message' => 'Cảm ơn quý khách đã đăng ký. Chúng tôi sẽ gửi mã khuyến mãi cho quý khách ngay khi có thể', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }


    public function manageNewsLetter()
    {

        $newsletters = CustomerNewsletter::latest()->get();
        return view('backend.newsletter.manage', compact('newsletters'));

    }



















}





















