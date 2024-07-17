<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // <------------ Admin Panel ---------->

    //Show Category 
    public function index()
    {

        $categories = Category::orderBy('created_at','desc')->paginate(10);
        return view('admin.category', compact('categories'));
    }

    public function create()
    {
        //
    }

    //Store Category
    public function store(Request $request)
    {


        $request->validate([
            'category_name' => 'required|unique:categories,category_name',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        $imageName = time() . '.' . $request->image->extension();

        $request->image->storeAs('public/CategoryImage', $imageName);

        $category = new Category();
        $category->category_id = Str::uuid();
        $category->category_name = $request->category_name;
        $category->image = $imageName;
        $result = $category->save();

        if ($result) {
            return redirect()->back()->with('success', 'Category Added successfully');
        } else {
            return redirect()->back()->with('error', 'Category Not Added.......');
        }
    }


    public function show($id)
    {
        //


    }

    // Edit Category
    public function edit($id)
    {

        $category = Category::findOrFail($id);
        return view('admin.edit_category', compact('category'));
    }

    // Update Category
    public function update(Request $request, $id)
    {

        $request->validate([
            'category_name' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        $category = Category::where('id', $id)->first();

        if (isset($request->image)) {
            //Delete image
            $old_image = public_path('storage/CategoryImage/').$category->image;
            if(file_exists($old_image)){
             @unlink($old_image);
            }
            //upload image
            $imageName = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/CategoryImage', $imageName);
            $category->image = $imageName;

        }
        $category->category_name = $request->category_name;
        $result = $category->save();

        if ($result) {
            return redirect('category')->with('success', 'Data Updated successfully');
        } else {
            return redirect()->back()->with('error', 'Data Not Added.......!');
        }
    }

    //Delete Category
    public function delete($id)
    {

        $category = Category::findOrFail($id);

        if ($category) {
              //Delete image
            $old_image = public_path('storage/CategoryImage/').$category->image;
            if(file_exists($old_image)){
             @unlink($old_image);
            }
            $category->delete();

            
            return redirect()->back()->with('success', 'Data Deleted Successfully');
        } else {

            return redirect()->back()->with('error', 'Data Not Found........!');
        }
    }
}
