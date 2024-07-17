<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Mail\Dispatch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{

    public function index()
    {
        $orders = DB::table('payments')
            ->join('orders', 'payments.orderId', '=', 'orders.orderId')
            ->select('orders.orderId', 'orders.order_id', 'payments.*')
            ->where('orders.payment_status', 'Received')
            ->distinct()
            ->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.order_info', compact('orders'));
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
    }

    public function ShowSingleOrder($order_id)
    {
        $OrderDetail = DB::table('orders')
            ->join('products', 'products.product_id', '=', 'orders.product_id')
            ->select('products.product_name', 'products.product_name', 'products.image', 'products.description', 'orders.*')
            ->where('orders.order_id', $order_id)
            ->get();

        $addressdetail = DB::table('orders')
            ->join('addresses', 'addresses.address_id', '=', 'orders.address_id')
            ->join('users', 'users.user_id', '=', 'orders.user_id')
            ->select('users.name', 'users.image', 'users.image', 'addresses.*')
            ->where('orders.order_id', $order_id)
            ->first();

        return view('admin.single_order_info', compact('OrderDetail', 'addressdetail'));
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


    //<!-------- Website Start here------>

    public function orderWebsite()
    {
        if (session()->has('user')) {

            $user = Session()->get('user');

            $user_id = $user->user_id;

            $count = Cart::where('user_id', $user_id)->count();

            $Orders = Order::where('user_id', $user_id)->count();

            // $order_detail = DB::table('orders')
            //     ->select('orders.*')
            //     ->where('user_id', $user_id)
            //     ->orderBy('orders.created_at', 'desc')
            //     ->get();

            $order_detail = DB::table('payments')
                ->join('orders', 'payments.orderId', '=', 'orders.orderId')
                ->select('orders.order_id', 'orders.payment_status', 'orders.created_at')
                ->where('payments.user_id', $user_id)
                ->distinct()
                ->orderBy('created_at', 'desc')->get();
        } else {


            $count = 0;
        }



        return view('website.order', compact('count', 'order_detail', 'Orders'));
    }

    public function TrackOrder($order_id)
    {
        if (session()->has('user')) {

            $user = Session()->get('user');

            $user_id = $user->user_id;

            $count = Cart::where('user_id', $user_id)->count();

            $TrackOrder = DB::table('orders')
                ->join('products', 'products.product_id', '=', 'orders.product_id')
                ->select('products.image', 'products.product_name', 'products.description', 'orders.*',)
                ->where('orders.order_id', $order_id)
                // ->where([['orders.payment_status', '=', 'Received'], ['orders.product_id', $product_id]])
                ->orderBy('products.created_at', 'desc')
                ->get();
        } else {


            $count = 0;
        }



        return view('website.track_order', compact('count', 'TrackOrder'));
    }

    public function DispatchOrder(Request $request)
    {

        $orderId = $request->order_id;

        $userDetails = DB::table('orders')->where('order_id', $orderId)
            ->join('users', 'orders.user_id', '=', 'users.user_id')
            ->join('products', 'orders.product_id', '=', 'products.product_id')
            ->select('orders.*', 'users.*', 'products.*')
            ->first();

        $email = $userDetails->email;

        $mailData = [
            'subject' => 'Thanks For Your Order',
            'order' => $userDetails
        ];

        Mail::to($email)->send(new Dispatch($mailData));

        return redirect()->back()->with('success', 'Order Dispatch Message Send.');
    }

    public function OverviewCount()
    {

        $users = User::count();
        $orders = Order::where('payment_status', 'Received')->count();
        $SuccessOrder = Order::where('payment_status', 'Received')->get();
        $totalEarn = 0;
        foreach ($SuccessOrder as $item) {
            $price = $item->price;
            $qty = $item->qty;
            $totalEarn += $price * $qty;
        }

        return view('admin.dashboard', compact('users', 'orders', 'totalEarn'));
    }
}
