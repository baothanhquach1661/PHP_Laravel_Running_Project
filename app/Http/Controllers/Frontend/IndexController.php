<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Slide;
use App\Models\Product;
use App\Models\About;
use App\Models\MultiImg;
use App\Models\TeamImgs;

class IndexController extends Controller
{
    public function index()
    {
        $slides = Slide::where('status', 1)->orderBy('id', 'ASC')->limit(3)->get();
        $new_arrivals = Product::where([
                                    ['status', '=', 1],
                                    ['new_arrivals', '=', 1] ])->inRandomOrder()->orderBy('id', 'ASC')->limit(10)->get();
        $best_sellers = Product::where([
                                    ['status', '=', 1],
                                    ['best_sellers', '=', 1] ])->inRandomOrder()->orderBy('id', 'ASC')->limit(10)->get();
        $features = Product::where([
                                    ['status', '=', 1],
                                    ['features', '=', 1] ])->inRandomOrder()->orderBy('id', 'ASC')->limit(20)->get();
        $flash_deals = Product::where([
                                    ['status', '=', 1],
                                    ['flash_deals', '=', 1],
                                    ['discount_price', '!=', NULL] ])->inRandomOrder()->orderBy('id', 'ASC')->limit(10)->get();

        // Get exactly products from 1 category
        // $skip_category_0 = Category::skip(0)->first();
        // $skip_product_0 = Product::where('status', 1)->where('category_id', $skip_category_0->id)->orderBy('id', 'DESC')->get();
        // Get exactly products from 1 category

        return view('frontend.index', compact('slides', 'new_arrivals', 'best_sellers', 'features', 'flash_deals'));
    } // end index method


    public function userLogout()
    {
        Auth::logout();
        return redirect()->route('index');
    } // end method


    public function userProfileStore(Request $request)
    {
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone_number = $request->phone_number;
        $data->address = $request->address;

        if ($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/user_images/'.$data->profile_photo_path));

            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'),$filename);
            $data['profile_photo_path'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'Thông tin của bạn đã được cập nhật thành công',
            'alert-type' => 'success'
        );

        return redirect()->route('dashboard')->with($notification);
    } // end method


    public function userPasswordStore(Request $request)
    {
        $validateData = $request->validate([
            'current_password' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ]);

        $hashedPassword = Auth::user()->password;

        if (Hash::check($request->current_password, $hashedPassword)){
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();

            $notification = array(
                'message' => 'Password updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        }else{

            $notification = array(
                'message' => 'Something Wrong, please try again!',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        }
    }

    // Rinart About Page //
    public function homeAbout()
    {
        $team_imgs = TeamImgs::where('about_id', 1)->get();
        return view('frontend.home.about', compact('team_imgs'));
    }
    // Rinart About Page //

    // Product details Page //
    public function productDetails($slug)
    {
        $products = Product::where('product_slug', $slug)->first();
        $multi_img = MultiImg::where('product_id', $products->id)->get();

        $color = $products->product_color;
        $product_color = explode(',', $color);

        $size = $products->product_size;
        $product_size = explode(',', $size);

        $cat_id = $products->category_id;
        $related_products = Product::where('category_id', $cat_id)->where('id', '!=', $cat_id)->orderBy('id', 'DESC')->get();

        return view('frontend.products.product_details', compact('products', 'multi_img', 'product_color', 'product_size', 'related_products'));
    }
    // Product details Page //


    // Category wise products Page //
    public function categoryWiseProduct($slug)
    {
        $categories = Category::orderBy('category_name', 'ASC')->get();
        $category = Category::where('category_slug', $slug)->get();
        $subcategories = Subcategory::where('category_id', $category->id)->get();

        $products = Product::where([
                                    ['status', '=', 1],
                                    ['category_id', '=', $category->id] ])->orderBy('id', 'DESC')->paginate(8);

        return view('frontend.products.category_products', compact('products', 'categories', 'category', 'subcategories'));
    }
    // Category wise products Page //


    // SubCategory wise products Page //
    public function subcategoryWiseProduct($slug, $sub_id)
    {
        $products = Product::where([
                                    ['status', '=', 1],
                                    ['subcategory_id', '=', $sub_id] ])->orderBy('id', 'DESC')->paginate(12);

        $categories = Category::orderBy('category_name', 'ASC')->get();

        $subcategories = Subcategory::orderBy('subcategory_name', 'ASC')->get();

        $subcategory = Subcategory::findorfail($sub_id);

        return view('frontend.products.subcategory_products', compact('products', 'subcategories', 'categories', 'subcategory'));
    }
    // SubCategory wise products Page //


    // SubCategory wise products Page //
    public function subcategoryWiseProduct2($sub_id)
    {
        $products = Product::where([
                                    ['status', '=', 1],
                                    ['subcategory_id', '=', $sub_id] ])->orderBy('id', 'DESC')->paginate(12);

        $categories = Category::orderBy('category_name', 'ASC')->get();

        $subcategories = Subcategory::orderBy('subcategory_name', 'ASC')->get();

        $subcategory = Subcategory::findorfail($sub_id);

        return view('frontend.products.subcategory_products2', compact('products', 'subcategories', 'categories', 'subcategory'));
    }
    // SubCategory wise products Page //


    // Product search //
    public function productSearch(Request $request)
    {
        $request->validate(['search' => 'required']);

        $item = $request->search;
        // echo "$item";

        $category = Category::orderBy('category_name', 'ASC')->get();
        $products = Product::where('product_name', 'LIKE', "%$item%")->paginate(8);
        return view('frontend.products.product_search', compact('products', 'item', 'category'));

    }
    // Product search //


    // Advance Product search //
    public function advanceProductSearch(Request $request)
    {

        $request->validate(['search' => 'required']);

        $item = $request->search;

        $products = Product::where('product_name', 'LIKE', "%$item%")->select('product_name', 'product_thumbnail','selling_price','id','product_slug','discount_price')->limit(5)->get();
        return view('frontend.products.advance_product_search', compact('products'));

    }
    // Advance Product search //






























































}
