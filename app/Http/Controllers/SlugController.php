<?php

namespace App\Http\Controllers;

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

class SlugController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug, Request $request)
    {
        $category = Category::where('category_slug', $slug)->first();

        $subcategory = SubCategory::where('subcategory_slug', $slug)->first();

        $product = Product::where('product_slug', $slug)->first();

        if ($category) {

            $cat_id = $category->id;
            $subcategories = Subcategory::where('category_id', $cat_id)->get();

            $products = Product::where([
                                    ['status', '=', 1],
                                    ['category_id', '=', $category->id] ])->orderBy('id', 'DESC')->paginate(8);
        
            return view('frontend.products.category_products', compact('products', 'subcategories', 'category'));
        }elseif($product){

            $products = Product::where('product_slug', $slug)->first();
            $multi_img = MultiImg::where('product_id', $products->id)->get();

            $color = $products->product_color;
            $product_color = explode(',', $color);

            $size = $products->product_size;
            $product_size = explode(',', $size);

            $cat_id = $products->category_id;
            $related_products = Product::where('category_id', $cat_id)->where('id', '!=', $cat_id)->orderBy('id', 'DESC')->get();

            return view('frontend.products.product_details', compact('products', 'multi_img', 'product_color', 'product_size', 'related_products'));
        }elseif($subcategory) {
            echo "sub category";
        }

        

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
