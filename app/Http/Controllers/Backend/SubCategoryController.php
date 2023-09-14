<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use Image;
use Illuminate\Support\Str;
use Carbon\Carbon;

class SubCategoryController extends Controller
{
    public function index()
    {
        $subcategories = SubCategory::latest()->get();
        return view('backend.subcategory.index', compact('subcategories'));
    }


    public function create()
    {
        $categories = Category::orderBy('category_name', 'ASC')->get();
        return view('backend.subcategory.create', compact('categories'));
    }


    public function store(Request $request)
    {
        $request->validate([

            'category_id' => 'required',
            'subcategory_name' => 'required',
        ],[
            'category_id.required' => 'Chọn tên danh mục kề!!!',
            'subcategory_name.required' => 'Chọn tên danh mục kề!!!',

        ]);

        if ($request->file('subcategory_image')){

            $image = $request->file('subcategory_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

            Image::make($image)->resize(300,300)->save('upload/subcategories/'.$name_gen);
            $save_url = 'upload/subcategories/'.$name_gen;

            SubCategory::insert([
                'category_id' => $request->category_id,
                'subcategory_name' => $request->subcategory_name,
                'subcategory_slug' => Str::slug($request->subcategory_name),
                'title' => $request->title,
                'description' => $request->description,
                'subcategory_image' => $save_url,
                'created_at' => Carbon::now()
            ]);

            $notification = array(
                'message' => 'SubCategory Create with Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('subcategory.management')->with($notification);
        } else {

            SubCategory::insert([
                'category_id' => $request->category_id,
                'subcategory_name' => $request->subcategory_name,
                'subcategory_slug' => Str::slug($request->subcategory_name),
                'title' => $request->title,
                'description' => $request->description,
                'created_at' => Carbon::now()
            ]);

            $notification = array(
                'message' => 'SubCategory Create Without Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('subcategory.management')->with($notification);
        } // end else

    } // end method


    public function edit($id)
    {
        $categories = Category::orderBy('category_name', 'ASC')->get();
        $subcategory = SubCategory::find($id);
        return view('backend.subcategory.edit', compact('subcategory', 'categories'));
    }


    public function update(Request $request)
    {
        $subcat_id = $request->id;
        $old_image = $request->old_image;

        if ($request->file('subcategory_image')){

            unlink($old_image);

            $image = $request->file('subcategory_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

            Image::make($image)->resize(300,300)->save('upload/subcategories/'.$name_gen);
            $save_url = 'upload/subcategories/'.$name_gen;

            SubCategory::findorfail($subcat_id)->update([
                'category_id' => $request->category_id,
                'subcategory_name' => $request->subcategory_name,
                'subcategory_slug' => Str::slug($request->subcategory_name),
                'title' => $request->title,
                'description' => $request->description,
                'subcategory_image' => $save_url,
                'updated_at' => Carbon::now()
                
            ]);

            $notification = array(
                'message' => 'SubCategory Updated with Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('subcategory.management')->with($notification);
        } else {

            SubCategory::findorfail($subcat_id)->update([
                'category_id' => $request->category_id,
                'subcategory_name' => $request->subcategory_name,
                'subcategory_slug' => Str::slug($request->subcategory_name),
                'title' => $request->title,
                'description' => $request->description,
                'updated_at' => Carbon::now()
                
            ]);

            $notification = array(
                'message' => 'SubCategory Updated Without Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('subcategory.management')->with($notification);
        } // end else 

    } // end method


    public function delete($id)
    {
        $subcategory = SubCategory::findOrFail($id);
        if ($subcategory->subcategory_image){
            $img = $subcategory->subcategory_image;
            unlink($img);
            SubCategory::findOrFail($id)->delete();
        }else{
            SubCategory::findOrFail($id)->delete();
        }
        
        $notification = array(
            'message' => 'SubCategory Has Been Delete Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    public function inActive($id)
    {
        SubCategory::findOrFail($id)->update(['status' => 0]);

        $notification = array(
            'message' => 'SubCategory Inactive Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }


    public function active($id)
    {
        SubCategory::findOrFail($id)->update(['status' => 1]);

        $notification = array(
            'message' => 'SubCategory Active Successfully',
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























































