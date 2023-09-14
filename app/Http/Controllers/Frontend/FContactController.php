<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\CustomerMessage;
use Carbon\Carbon;

class FContactController extends Controller
{
    public function contactPage()
    {
        return view('frontend.home.contact');
    }


    public function storeMessage(Request $request)
    {

        $this->validate(
            $request, 
            ['phone' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10'],
            ['phone.regex' => 'Số điện thoại không đúng định dạng'],
            ['phone.min' => 'Số điện thoại quá ngắn'],

        );

        CustomerMessage::insert([

            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'message' => $request->message,
            'status' => 1,
            'created_at' => Carbon::now(),

        ]);

         $notification = array(
            'message' => 'Cảm ơn quý khách. Bộ phận chúng tôi sẽ liên lạc quý khách sớm nhất có thể', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }



















}

























