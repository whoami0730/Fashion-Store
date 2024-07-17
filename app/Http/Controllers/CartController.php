<?php

namespace App\Http\Controllers;


use App\Models\Cart;
use App\Models\Shipping;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class CartController extends Controller
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

        $request->validate([
            'product_id' => 'required',
            'price' => 'required',
            'qty' => 'required'
        ]);

        $newPrice = $request->price;
        $newQty = $request->qty;
        $cartProduct_id = $request->product_id;

        if (session()->has('user')) {

            $user = Session()->get('user');

            $user_id = $user->user_id;

            $updateCart = DB::table('carts')->where([['product_id', $cartProduct_id], ['user_id', $user_id]])->first();

            if ($updateCart) {
                // Update the quantity and price
                $latestqty = $updateCart->qty += $newQty;
                $latestprice = $updateCart->total += $newPrice;
                $result = Cart::where('product_id', $cartProduct_id)->update([

                    'qty' => $latestqty,
                    'total' => $latestprice,

                ]);
            } else {

                $addtocart = new Cart();
                $addtocart->cart_id = Str::uuid();
                $addtocart->user_id = $user_id;
                $addtocart->product_id = $request->product_id;
                $addtocart->price = $request->price;
                $addtocart->qty = $request->qty;
                $addtocart->total = $request->price;
                $result = $addtocart->save();
            }

            if ($result) {
                return redirect()->back()->with('success', ' Added to Cart Successfully');
            } else {
                return redirect()->back()->with('error', 'Not Added to Cart');
            }
        }
    }

    public function cartIncrease(Request $request, $cart_id)
    {
        //dd($request->all());
        $action = $request->action;
        $price = $request->price;

        $cart = Cart::where('cart_id', $cart_id)->first();

        if ($action === '+') {
            $cart->qty++;
            $cart->total += $price;
        } elseif ($action === '-') {
            if ($cart->qty > 1) {
                $cart->qty--;
                $cart->total -= $price;
            } else {
                return redirect()->back()->with('error', 'Cart Item Cannot Less');
            }
        }

        $cart->save();

        return redirect()->back()->with('success', 'Cart updated!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    public function ProductCart()
    {
        $subTotal = 0;
        $netTotal = 0;
        $delivery = 0;

        if (session()->has('user')) {

            $user = Session()->get('user');

            $user_id = $user->user_id;

            $count = Cart::where('user_id', $user_id)->count();

            $products = DB::table('products')
                ->join('carts', 'products.product_id', '=', 'carts.product_id')
                ->select('carts.*', 'products.*')
                ->where('carts.user_id', $user_id)
                ->orderBy('carts.created_at', 'desc')
                ->get();

            $cartProduct = Cart::where('user_id', $user_id)->get();
            $shipping = Shipping::all();


            foreach ($cartProduct as $product) {
                $subTotal += $product->price * $product->qty;
                $netTotal += $product->price * $product->qty;
            }

            // foreach ($shipping as $charge) {
            //     switch ($subTotal) {
            //         case ($subTotal > $charge->from && $subTotal < $charge->to):
            //             $netTotal += $charge->price;
            //             $delivery = $charge->price;
            //             break;
            //     }
            // }

            foreach ($shipping as $charge) {
                if ($subTotal > $charge->from && $subTotal < $charge->to) {
                    $netTotal += $charge->price;
                    $delivery = $charge->price;
                }
            }

            return view('website.cart', compact('products', 'count', 'subTotal', 'netTotal', 'delivery'));
        }
    }

    public function DeleteCart($product_id)
    {

        $product = Cart::where('product_id', $product_id)->first();

        if ($product) {
            $product->delete();
            return redirect()->back()->with('remove', 'Data Deleted Successfully');
        } else {

            return redirect()->back()->with('error', 'Data Not Found........!');
        }
    }
}
