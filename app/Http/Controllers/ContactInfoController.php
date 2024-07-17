<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\ContactInfo;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ContactInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $contact_info = ContactInfo::orderBy('contact_infos.created_at','desc')->paginate(10);
         
        return view('admin.contact_info',compact('contact_info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        if (session()->has('user')) {

            $user = Session()->get('user');

            $user_id = $user->user_id;

            $count = Cart::where('user_id', $user_id)->count();
        } else {


            $count = 0;
        }

        return view('website.contact',compact('count'));
        
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
       
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message'=> 'required',
        ]);

        $contact = new ContactInfo();
        $contact->contact_id=Str::uuid();
        $contact->name=$request->name;
        $contact->email=$request->email;
        $contact->phone=$request->phone;
        $contact->message=$request->message;
        $result=$contact->save();
        

        if($result){
            return redirect()->back()->with('success', 'Message Send Successfully');

        }else{
            return redirect()->back()->with('error','Message Not Send');
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
    public function delete($id)
    {
      
        $contact=ContactInfo::findOrFail($id);
        
        if($contact)
        {
            $contact->delete();
            return redirect()->back()->with('success','Data Deleted Successfully');
        }else{
      
            return redirect()->back()->with('error','Data Not Found........!');
        }
    }
}
