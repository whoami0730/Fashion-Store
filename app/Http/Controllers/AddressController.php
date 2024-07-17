<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Address;
use App\Models\Shipping;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddressController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {

        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'phone' => 'required|min:10|max:10',
            'address' => 'required',
            'landmark' => 'required',
            'city' => 'required',
            'state' => 'required',
            'pincode' => 'required|integer',

        ]);

        if (session()->has('user')) {

            $user = Session()->get('user');

            $user_id = $user->user_id;

            $address = new Address();
            $address->address_id = Str::uuid();
            $address->user_id = $user_id;
            $address->fname = $request->fname;
            $address->lname = $request->lname;
            $address->phone = $request->phone;
            $address->address = $request->address;
            $address->landmark = $request->landmark;
            $address->city = $request->city;
            $address->state = $request->state;
            $address->pincode = $request->pincode;

            $result = $address->save();
        }

        if ($result) {
            return redirect()->back()->with('success', 'Address Added successfully');
        } else {
            return redirect()->back()->with('error', 'Address Not Added.......');
        }
    }

    public function storeNewAddress(Request $request)
    {

        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'phone' => 'required|min:10|max:10',
            'address' => 'required',
            'landmark' => 'required',
            'city' => 'required',
            'state' => 'required',
            'pincode' => 'required|integer',

        ]);

        if (session()->has('user')) {

            $user = Session()->get('user');

            $user_id = $user->user_id;

            $address = new Address();
            $address->address_id = Str::uuid();
            $address->user_id = $user_id;
            $address->fname = $request->fname;
            $address->lname = $request->lname;
            $address->phone = $request->phone;
            $address->address = $request->address;
            $address->landmark = $request->landmark;
            $address->city = $request->city;
            $address->state = $request->state;
            $address->pincode = $request->pincode;

            $result = $address->save();
        }

        if ($result) {
            return redirect()->route('address')->with('added', 'Address Not Added.......');
        } else {
            return redirect()->back()->with('error', 'Address Not Added.......');
        }
    }


    public function addressWebsite()
    {
        if (session()->has('user')) {

            $user = Session()->get('user');

            $user_id = $user->user_id;

            $count = Cart::where('user_id', $user_id)->count();
            $address = Address::where('user_id', $user_id)->count();
            $addresses = Address::where('user_id', $user_id)->orderBy('created_at', 'desc')->get();
        } else {


            $count = 0;
        }

        return view('website.address', compact('addresses', 'count', 'address'));
    }

    public function count()
    {
        if (session()->has('user')) {

            $user = Session()->get('user');

            $user_id = $user->user_id;

            $count = Cart::where('user_id', $user_id)->count();
            $address = Address::where('user_id', $user_id)->count();
            $addresses = Address::where('user_id', $user_id)->orderBy('created_at', 'desc')->get();
        } else {


            $count = 0;
        }

        return view('website.add_address', compact('count'));
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }

    //<------------ Website Panel ------------>

    public function AddressCheckout()
    {
        $subTotal = 0;
        $netTotal = 0;

        if (session()->has('user')) {

            $user = Session()->get('user');

            $user_id = $user->user_id;

            $count = Cart::where('user_id', $user_id)->count();
            $addresses = Address::where('user_id', $user_id)->get();
        } else {


            $count = 0;
        }


        $cart_detail = $products = DB::table('products')
            ->join('carts', 'products.product_id', '=', 'carts.product_id')
            ->select('carts.*', 'products.*')
            ->where('carts.user_id', $user_id)
            ->orderBy('products.created_at', 'desc')
            ->get();

        $cartProduct = Cart::where('user_id', $user_id)->get();
        $shipping = Shipping::all();

        foreach ($cartProduct as $product) {
            $subTotal += $product->price * $product->qty;
            $netTotal += $product->price * $product->qty;
        }

        foreach ($shipping as $charge) {
            if ($subTotal > $charge->from && $subTotal < $charge->to) {
                $netTotal += $charge->price;
                $delivery = $charge->price;
            }
        }

        $address_count = Address::where('user_id', $user_id)->count();
        return view('website.checkout', compact('addresses', 'cart_detail', 'count', 'netTotal', 'address_count'));
    }


    public function AddressDelete($id)
    {


        $address = Address::where('id', $id)->first();

        if ($address) {
            $address->delete();
            return redirect()->back()->with('delete', 'Address Deleted Successfully');
        } else {

            return redirect()->back()->with('error', 'Data Not Found........!');
        }
    }

    public function addressEdit($id)
    {

        $user = Session()->get('user');

        $user_id = $user->user_id;

        $count = Cart::where('user_id', $user_id)->count();

        $address = Address::where('id', $id)->first();

        return view('website.edit_address', compact('address', 'count'));
    }

    public function addressUpdate(Request $request, $id)
    {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'phone' => 'required|min:10|max:10',
            'address' => 'required',
            'landmark' => 'required',
            'city' => 'required',
            'state' => 'required',
            'pincode' => 'required|integer',

        ]);

        $user = Session()->get('user');

        $user_id = $user->user_id;

        $count = Cart::where('user_id', $user_id)->count();

        $address = Address::where('id', $id)->first();

        $address->fname = $request->fname;
        $address->lname = $request->lname;
        $address->phone = $request->phone;
        $address->address = $request->address;
        $address->landmark = $request->landmark;
        $address->city = $request->city;
        $address->state = $request->state;
        $address->pincode = $request->pincode;

        $result = $address->save();


        if ($result) {
            return redirect('address')->with('success', 'Address Update successfully');
        } else {
            return redirect()->back()->with('error', 'Address Not Update');
        }
    }
}
