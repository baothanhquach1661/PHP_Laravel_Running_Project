<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Carbon\Carbon;
use App\Models\CustomerMessage;

class ContactController extends Controller
{
    public function index()
    {
        $data = Contact::find(1);
        return view('backend.contact.index', compact('data'));
    }


    public function update(Request $request)
    {
        $contact_id = $request->id;

        Contact::findorfail($contact_id)->update([
            'rinart_address' => $request->rinart_address,
            'rinart_phone' => $request->rinart_phone,
            'rinart_email' => $request->rinart_email,
            'rinart_adv' => $request->rinart_adv,
            'rinart_opening_hours' => $request->rinart_opening_hours,
            'rinart_opening_hours_2' => $request->rinart_opening_hours_2,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Contact Site Data Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    public function customerMessage()
    {
        $messages = CustomerMessage::latest()->get();
        return view('backend.messages.index',compact('messages'));
    }


    public function messageDetails($message_id)
    {
        $message_details = CustomerMessage::where('id', $message_id)->first();

        return view('backend.messages.message_details', compact('message_details'));
    }


    public function messageDelete($id)
    {
        CustomerMessage::findOrFail($id)->delete();

        $notification = array(
                'message' => 'This Message Deleted Successfully', 
                'alert-type' => 'success'
            );

        return redirect()->back()->with($notification);
    }

    public function inActive($id)
    {
        CustomerMessage::findOrFail($id)->update(['status' => 0]);

        $notification = array(
            'message' => 'Tin nhắn này đã được đọc',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }


    public function inActive2($id)
    {
        CustomerMessage::findOrFail($id)->update(['status' => 0]);

        $notification = array(
            'message' => 'Tin nhắn này đã được đọc',
            'alert-type' => 'info'
        );

        return redirect()->route('customer_messages.management')->with($notification);
    }


    public function active($id)
    {
        CustomerMessage::findOrFail($id)->update(['status' => 1]);

        $notification = array(
            'message' => 'Tin nhắn này chưa đọc',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }


    public function messageRead(Request $request)
    {
        $message_id = $request->id;

        CustomerMessage::findorfail($contact_id)->update([
            'status' => 0,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Tin nhắn này chưa đọc',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }


    public function notReadMessage()
    {
        $not_read_message = CustomerMessage::where('status', 1)->orderBy('id', 'DESC')->get();

        return view('backend.messages.not_read_message', compact('not_read_message'));
    }


    public function readMessage()
    {
        $read_message = CustomerMessage::where('status', 0)->orderBy('id', 'DESC')->get();

        return view('backend.messages.read_message', compact('read_message'));
    }

























}






















