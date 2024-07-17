<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    public function index()
    {
        //Show Product
        $categories = Category::all();
        $products = DB::table('products')->join('categories', 'categories.category_id', '=', 'products.category_id')
            ->select('categories.category_name', 'products.*')->orderByDesc('products.created_at')->paginate(10);

        return view('admin.product', compact('categories', 'products'));
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {

        $request->validate([
            'category_id' => 'required',
            'product_name' => 'required',
            'image.*' => 'required|image|mimes:jpeg,png,jpg,gif',
            'price' => 'required',
            'quantity' => 'required',
            'description' => 'required',
        ]);

        $Images = $request->file('image');
        $ImageData = [];

        foreach ($Images as $Image) {

            $imageName = $Image->getClientOriginalName();
            $Image->storeAs('public/ProductImage', $imageName);
            $ImageData[] = $imageName;
        }

        $product = new Product();
        $product->product_id = Str::uuid();
        $product->category_id = $request->category_id;
        $product->product_name = $request->product_name;
        $product->image = json_encode($ImageData);
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->description = $request->description;


        $result = $product->save();

        if ($result) {
            return redirect()->back()->with('success', 'Product Added successfully');
        } else {
            return redirect()->back()->with('error', 'Product Not Added.......');
        }
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        // // Edit Category
        $product = Product::findOrFail($id);
        return view('admin.edit_product', compact('product'));
    }


    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'product_name' => 'nullable',
            'image.*' => 'nullable',
            'price' => 'nullable',
            'quantity' => 'nullable',
            'description' => 'nullable',
        ]);

        $product = Product::where('id', $id)->first();

        if (isset($request->image)) {
            //Delete image

            $images = json_decode($product->image);

            if (is_array($images)) {
                foreach ($images as $image) {

                    $old_image = public_path('storage/ProductImage/') . $image;
                    if (file_exists($old_image)) {
                        @unlink($old_image);
                    }
                }
            } else {

                $old_image = public_path('storage/ProductImage/') . $product->image;
                if (file_exists($old_image)) {
                    @unlink($old_image);
                }
            }

            $Images = $request->file('image');
            $ImageData = [];

            foreach ($Images as $Image) {

                $imageName = $Image->getClientOriginalName();
                $Image->storeAs('public/ProductImage', $imageName);
                $ImageData[] = $imageName;
            }
            $product->image = json_encode($ImageData);

            //upload image
            // $imageName = time() . '.' . $request->image->extension();
            // $request->image->storeAs('public/ProductImage', $imageName);
            // $product->image = $imageName;
        };
        $product->product_name = $request->product_name;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->description = $request->description;
        $result = $product->save();


        if ($result) {
            return redirect('product')->with('success', 'Data Updated successfully');
        } else {
            return redirect()->back()->with('error', 'Data Not Added.......!');
        }
    }


    public function delete($id)
    {
        //Delete Product
        $product = Product::findOrFail($id);

        if ($product) {
            $images = json_decode($product->image);
            if (is_array($images)) {
                foreach ($images as $image) {

                    $old_image = public_path('storage/ProductImage/') . $image;
                    if (file_exists($old_image)) {
                        @unlink($old_image);
                    }
                }
            } else {
                //Delete image
                $old_image = public_path('storage/ProductImage/') . $product->image;
                if (file_exists($old_image)) {
                    @unlink($old_image);
                }
            }
            $product->delete();
            return redirect()->back()->with('success', 'Data Deleted Successfully');
        } else {

            return redirect()->back()->with('error', 'Data Not Found........!');
        }
    }

    public function Search(Request $request)
    {
        $query = $request->input('query');

        $products = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.category_id')
            ->select('categories.category_name', 'products.*')
            ->where('product_name', 'LIKE', "%$query%")
            ->orWhere('category_name', 'LIKE', "%$query%")
            ->orderBy('products.created_at', 'desc')
            ->paginate(8);

        return view('admin.search', compact('products', 'query'));
    }



    // Website Controller Start Here


    public function ProductHome()
    {
        if (session()->has('user')) {

            $user = Session()->get('user');

            $user_id = $user->user_id;

            $count = Cart::where('user_id', $user_id)->count();
        } else {


            $count = 0;
        }

        $categories = Category::orderBy('created_at', 'desc')->get();

        $data = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.category_id')
            ->select('categories.category_name', 'products.*')
            ->orderBy('products.created_at', 'desc')
            ->get();

        // Organize Product by Category
        $productByCategory = [];
        foreach ($data as $item) {
            $productByCategory[$item->category_name][] = $item;
        }

        return view('website.home', compact('productByCategory', 'categories', 'count'));
    }

    public function ProductShop()
    {
        if (session()->has('user')) {

            $user = Session()->get('user');

            $user_id = $user->user_id;

            $count = Cart::where('user_id', $user_id)->count();
        } else {


            $count = 0;
        }

        $categories = Category::orderBy('created_at', 'desc')->get();
        $products = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.category_id')
            ->select('categories.category_name', 'products.*')
            ->orderBy('products.created_at', 'desc')
            ->paginate(8);


        return view('website.shop', compact('products', 'categories', 'count'));
    }

    public function productbycategory($category_id)
    {
        if (session()->has('user')) {

            $user = Session()->get('user');

            $user_id = $user->user_id;

            $count = Cart::where('user_id', $user_id)->count();
        } else {


            $count = 0;
        }

        $category = $category_id;

        $categoryName = DB::table('categories')->select('categories.category_name')->where('category_id', $category)->first();
        $productbycategory = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.category_id')
            ->select('categories.category_name', 'products.*')
            ->where('categories.category_id', $category)
            ->orderBy('products.created_at', 'desc')
            ->paginate(8);

        return view('website.productbycategory', compact('productbycategory', 'categoryName', 'count'));
    }

    public function ProductDetail($id)
    {
        if (session()->has('user')) {

            $user = Session()->get('user');

            $user_id = $user->user_id;

            $count = Cart::where('user_id', $user_id)->count();
        } else {


            $count = 0;
        }
        $categories = Category::orderBy('created_at', 'desc')->get();
        $related_product = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.category_id')
            ->select('categories.category_name', 'products.*')
            ->get();

        $productdetail = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.category_id')
            ->select('categories.category_name', 'products.*')
            ->where('products.id', $id)
            ->first();

        return view('website.product_detail', compact('productdetail', 'related_product', 'categories', 'count'));
    }

    public function ProductSearch(Request $request)
    {
        $query = $request->input('query');

        if (session()->has('user')) {

            $user = Session()->get('user');

            $user_id = $user->user_id;

            $count = Cart::where('user_id', $user_id)->count();
        } else {


            $count = 0;
        }


        $products = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.category_id')
            ->select('categories.category_name', 'products.*')
            ->where('product_name', 'LIKE', "%$query%")
            ->orWhere('category_name', 'LIKE', "%$query%")
            ->orderBy('products.created_at', 'desc')
            ->paginate(8);

        return view('website.search_product', compact('products', 'count', 'query'));
    }
}
