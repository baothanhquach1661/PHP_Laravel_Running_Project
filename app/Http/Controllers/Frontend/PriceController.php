<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\pricing;
use App\Models\pricing_banner;
use Carbon\Carbon;
use Image;
use Illuminate\Support\Str;

class PriceController extends Controller
{
    public function pricingPage()
    {
        $data = pricing::where('status', 1)->latest()->get();
        return view('frontend.home.pricing', compact('data'));
    }


    public function pricingDetails($id)
    {
        $price = pricing::where('id', $id)->get();

        $banner = pricing_banner::where('pricing_id', $id)->get();

        //dd($price->id);
        return view('frontend.home.pricing_details', compact('price', 'banner'));
    }

















}















