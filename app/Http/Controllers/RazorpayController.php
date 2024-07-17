<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Cart;
use App\Models\Order;
use Razorpay\Api\Api;
use App\Models\Payment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RazorpayController extends Controller

{
    public $api;

    public function __construct($foo = null)
    {
        $this->api = new Api("rzp_test_UChtUdks4NuG7j", "GcDBCkl4f9J9Xee4boPqLkQ1");
    }

    public function index()
    {
    }

    public function store(Request $request)
    {

        $status = $this->api->payment->fetch($request->get('payment_id'));

        if (session()->has('user')) {

            $user = Session()->get('user');

            $user_id = $user->user_id;

            $payment = new Payment();
            $payment->payment_id = Str::uuid();
            $payment->user_id = $user_id;
            $payment->orderId = $request->orderId;
            $payment->razorpay_payment_id = $status->id;
            $payment->razorpay_order_id = $status->order_id;
            $payment->payment_method = $status->method;
            $payment->amount = ($status->amount / 100);
            $payment->payment_status = $status->status;
            $result = $payment->save();

            $order = DB::table('orders')
            ->where([['user_id',$user_id],['orderId',$request->orderId]])
            ->update([
                'payment_status' => 'Received',
                'razorpay_order_id' => $status->order_id,
                'razorpay_payment_id' => $status->id,
               
            ]);

            $cartItems = Cart::where('user_id', $user_id)->get();
            
            if ($cartItems) {
            foreach($cartItems as $cart) {
                $cart->delete();
         
            }
                return redirect('order')->with('success', 'Data Deleted Successfully');
            } 
            
            else {

                return redirect('404');
            }
        }
    }

    public function makeOrder(Request $request)
    {
        $request->validate([
            'address_id' => 'required',
        ]);

        if (session()->has('user')) {

            $user = Session()->get('user');

            $user_id = $user->user_id;
            $orderId = rand('111111', '999999');
            $cart = Cart::where('user_id', $user_id)->get();
            $i = 1;
            $order_id_uuid_id= Str::uuid();
            // $multipleProductId = [];
            // $multipleQty =[];
            // $multiplePrice=[];

            // foreach($cart as $item){
            //     $productId = $item->product_id;
            //     $Qty = $item->qty;
            //     $Price =$item->price;
            //     $multipleProductId[]= $productId;
            //     $multipleQty[]=$Qty;
            //     $multiplePrice[]=$Price;
            foreach ($cart as $data) {

                $order = new Order;
                $order->order_id =$order_id_uuid_id;
                $order->user_id = $user_id;
                $order->address_id = $request->address_id;
                $order->product_id = $data->product_id;
                $order->price = $data->price;
                $order->qty = $data->qty;
                $order->orderId =$orderId;
                $result = $order->save();
            }

           

            $orderData = [
                'receipt'  => 'rectid_11',
                'amount'    => ($request->get('price') * 100), // Amount In Paise
                'currency'  => 'INR',
                'notes'     => [
                    'orderId' => $orderId
                ],
            ];

            $razorpayOrder = $this->api->order->create($orderData);
            return view('website.payment', compact('orderId', 'razorpayOrder'));
        }
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
}
