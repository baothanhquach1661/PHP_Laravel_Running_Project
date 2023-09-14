<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\MultiImg;
use Image;
use Carbon\Carbon;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();
        $products = Product::latest()->get();
        return view('backend.product.index', compact('products', 'categories'));
    }


    public function create()
    {
        $categories = Category::orderBy('category_name', 'ASC')->get();
        return view('backend.product.create', compact('categories'));
    }


    public function store(Request $request)
    {
        $image = $request->file('product_thumbnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(630,630)->save('upload/products/thumbnail/'.$name_gen);
        $save_url = 'upload/products/thumbnail/'.$name_gen;

        $product_id = Product::insertGetId([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'product_name' => $request->product_name,
            'product_slug' =>  Str::slug($request->product_name),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags' => $request->product_tags,
            'product_size' => $request->product_size,
            'product_color' => $request->product_color,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,

            'short_description' => $request->short_description,
            'longs_description' => $request->longs_description,

            'flash_deals' => $request->flash_deals,
            'features' => $request->features,
            'best_sellers' => $request->best_sellers,
            'new_arrivals' => $request->new_arrivals,

            'product_thumbnail' => $save_url,
            'created_at' => Carbon::now(),

        ]);


        ////////// Multiple Image Upload Start ///////////

        $images = $request->file('multi_img');

        foreach ($images as $img) {

            $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(630,630)->save('upload/products/multi-img/'.$make_name);
            $uploadPath = 'upload/products/multi-img/'.$make_name;

            MultiImg::insert([

                'product_id' => $product_id,
                'photo_name' => $uploadPath,
                'image' => $uploadPath,
                'created_at' => Carbon::now(), 

            ]);

      }

      ////////// End Multiple Image Upload ///////////

        $notification = array(
            'message' => 'Product Created Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('product.management')->with($notification);

    } // end store method


    public function edit($id)
    {
        $multiImgs = MultiImg::where('product_id',$id)->get();
        $categories = Category::latest()->get();
        $subcategory = SubCategory::latest()->get();
        $products = Product::findOrFail($id);
        return view('backend.product.edit',compact('categories', 'subcategory', 'products', 'multiImgs'));
    }


    public function inActive($id)
    {
        Product::findOrFail($id)->update(['status' => 0]);
        $notification = array(
            'message' => 'Product Inactive',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }


    public function active($id)
    {
        Product::findOrFail($id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Product Active',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }


    public function delete($id)
    {
        $product = Product::findOrFail($id);
        unlink($product->product_thumbnail);
        Product::findOrFail($id)->delete();

        $images = MultiImg::where('product_id',$id)->get();
        foreach ($images as $img) {
            unlink($img->photo_name);
            MultiImg::where('product_id',$id)->delete();
        }

        $notification = array(
            'message' => 'Product Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    public function updateWithoutImage(Request $request)
    {
        $product_id = $request->id;

        Product::findOrFail($product_id)->update([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'product_name' => $request->product_name,
            'product_slug' => Str::slug($request->product_name),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,

            'product_tags' => $request->product_tags,
            'product_size' => $request->product_size,
            'product_color' => $request->product_color,

            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,

            'short_description' => $request->short_description,
            'longs_description' => $request->longs_description,

            'flash_deals' => $request->flash_deals,
            'features' => $request->features,
            'best_sellers' => $request->best_sellers,
            'new_arrivals' => $request->new_arrivals,

            'updated_at' => Carbon::now(),   

        ]);

          $notification = array(
            'message' => 'Product Updated Without Image Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('product.management')->with($notification);
    }


    public function updateThumbnail(Request $request)
    {
        $product_id = $request->id;
        $oldImage = $request->old_img;
        unlink($oldImage);

        $image = $request->file('product_thumbnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(630,630)->save('upload/products/thumbnail/'.$name_gen);
        $save_url = 'upload/products/thumbnail/'.$name_gen;

        Product::findOrFail($product_id)->update([
            'product_thumbnail' => $save_url,
            'updated_at' => Carbon::now(),

        ]);

         $notification = array(
            'message' => 'Hình nền sản phẩm đã được đổi mới',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    public function updateWithImage(Request $request)
    {
        $imgs = $request->multi_img;

        foreach ($imgs as $id => $img) {
            $imgDel = MultiImg::findOrFail($id);
            unlink($imgDel->photo_name);

            $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(630,630)->save('upload/products/multi-img/'.$make_name);
            $uploadPath = 'upload/products/multi-img/'.$make_name;

            MultiImg::where('id',$id)->update([
                'photo_name' => $uploadPath,
                'updated_at' => Carbon::now(),

        ]);

     } // end foreach

       $notification = array(
            'message' => 'Hình nền con sản phẩm đã thay đổi',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function multiImgDelete($id)
    {
        $oldimg = MultiImg::findOrFail($id);
        unlink($oldimg->photo_name);

        MultiImg::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Hình nền con đã được xóa thành công',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    public function createMultiImage($id)
    {
        $products = Product::findOrFail($id);
        return view('backend.product.create_multiImg', compact('products'));
    }


    public function storeMultiImage(Request $request)
    {
        $images = $request->file('multi_img');
        $product_id = $request->id;

        foreach ($images as $img) {

            $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(630,630)->save('upload/products/multi-img/'.$make_name);
            $uploadPath = 'upload/products/multi-img/'.$make_name;

            MultiImg::where('product_id', $product_id)->insert([
                'product_id' => $product_id,
                'photo_name' => $uploadPath,
                'created_at' => Carbon::now(), 
            ]);

      }

        $notification = array(
            'message' => 'Product MultiImage Created Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('product.management')->with($notification);
    }


    public function stockManagement()
    {
        $products = Product::where([
                                ['status', '=', 1],
                                ['product_qty', '<=', 10] ])->orderBy('id', 'ASC')->get();
        return view('backend.product.stock_management', compact('products'));
    }































}



























