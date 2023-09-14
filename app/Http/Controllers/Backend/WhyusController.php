<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\WhyUs;
use Image;
use Carbon\Carbon;
use Illuminate\Http\Request;

class WhyusController extends Controller
{
    public function manage()
    {
        $whyus = WhyUs::find(1);
        return view('backend.site_setting.whyus', compact('whyus'));
    }


    public function update(Request $request)
    {
        $whyus_id = $request->id;

        WhyUs::findorfail($whyus_id)->update([
            'whyus_1' => $request->whyus_1,
            'whyus_2' => $request->whyus_2,
            'whyus_3' => $request->whyus_3,
            'whyus_4' => $request->whyus_4,
            'whyus_5' => $request->whyus_5,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Whyus setting Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
        
         
    }
}
