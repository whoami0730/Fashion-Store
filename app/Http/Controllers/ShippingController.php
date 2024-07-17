<?php

namespace App\Http\Controllers;

use App\Models\Shipping;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    // Show Data On Admin Page 
    public function index()
    {
        $data = Shipping::paginate(10);
        return view('admin.shipping', compact('data'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'from' => 'required',
            'to' => 'required',
            'price' => 'required'
        ]);

        $data = new Shipping();
        $data->shipping_id = Str::uuid();
        $data->from = $request->from;
        $data->to = $request->to;
        $data->price = $request->price;


        $result = $data->save();
        if ($result) {
            return redirect()->back()->with('success', 'Shipping Added Successfully');
        } else {
            return redirect()->back()->with('error', 'Shipping Not Added');
        }
    }




    public function show(Shipping $shipping)
    {
        //

    }


    public function edit($id)
    {
        $data = Shipping::findOrFail($id);
        return view('admin.edit_shipping ', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'from' => 'required',
            'to' => 'required',
            'price' => 'required'
        ]);

        $data = Shipping::where('id', $id)->first();
        $data->from = $request->from;
        $data->to = $request->to;
        $data->price = $request->price;

        $result = $data->save();
        if ($result) {
            return redirect()->route('shipping')->with('success', 'Shipping Updated Successfully');
        } else {
            return redirect()->back()->with('error', 'Shipping Not Updated');
        }
    }

    //Delete Shipping 
    public function delete($id)
    {
        $data = Shipping::findOrFail($id);

        if ($data) {

            $data->delete();


            return redirect()->back()->with('success', 'Data Deleted Successfully');
        } else {

            return redirect()->back()->with('error', 'Data Not Found........!');
        }
    }
}
