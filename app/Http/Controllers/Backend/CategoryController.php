<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use Image;
use Illuminate\Support\Str;
use Carbon\Carbon;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();
        return view('backend.category.index', compact('categories'));
    }


    public function create()
    {
        return view('backend.category.create');
    }


    public function store(Request $request)
    {
        $request->validate([

            'category_image' => 'required',
        ],[
            'category_image.required' => 'Please Insert Category Image!!!',

        ]);

        $image = $request->file('category_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('upload/categories/'.$name_gen);
        $save_url = 'upload/categories/'.$name_gen;


        Category::insert([
            'category_name' => $request->category_name,
            'category_slug' => Str::slug($request->category_name),
            'title' => $request->title,
            'description' => $request->description,
            'category_image' => $save_url,
            'created_at' => Carbon::now()

        ]);

        $notification = array(
            'message' => 'Category Created Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('category.management')->with($notification);
    } // end method


    public function edit($id)
    {
        $category = Category::find($id);
        return view('backend.category.edit', compact('category'));
    }


    public function update(Request $request)
    {
        $category_id = $request->id;
        $old_image = $request->old_image;

        if ($request->file('category_image')){

            unlink($old_image);

            $image = $request->file('category_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

            Image::make($image)->resize(300,300)->save('upload/categories/'.$name_gen);
            $save_url = 'upload/categories/'.$name_gen;

            Category::findorfail($category_id)->update([
                'category_name' => $request->category_name,
                'category_slug' => Str::slug($request->category_name),
                'title' => $request->title,
                'description' => $request->description,
                'category_image' => $save_url,
                'updated_at' => Carbon::now()
                
            ]);

            $notification = array(
                'message' => 'Category Updated with Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('category.management')->with($notification);
        } else {

            Category::findorfail($category_id)->update([
                'category_name' => $request->category_name,
                'category_slug' => Str::slug($request->category_name),
                'title' => $request->title,
                'description' => $request->description,
                'updated_at' => Carbon::now()
            ]);

            $notification = array(
                'message' => 'Category Updated Without Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('category.management')->with($notification);
        } // end else
        
    } // end method


    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $img = $category->category_image;
        unlink($img);
        Category::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Category Has Been Delete Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    public function inActive($id)
    {
        Category::findOrFail($id)->update(['status' => 0]);

        $notification = array(
            'message' => 'Category Inactive Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }


    public function active($id)
    {
        Category::findOrFail($id)->update(['status' => 1]);

        $notification = array(
            'message' => 'Category Active Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }


    public function GetSubCategory($category_id)
    {
        $subcat = SubCategory::where('category_id', $category_id)->orderBy('subcategory_name','ASC')->get();
        return json_encode($subcat);
    }




































}
