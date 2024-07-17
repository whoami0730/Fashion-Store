<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\Password_forgot_otp;


class UserController extends Controller
{

    public function index()
    {
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|min:10|max:10',
            'password' => 'required|min:8',

        ]);

        $userEmail = User::where('email', $request->email)->first();

        if ($userEmail) {
            return redirect()->back()->with('registered', 'you are already regisatered');
        } else {


            $data = new User;
            $data->user_id = Str::uuid();
            $data->name = $request->name;
            $data->email = $request->email;
            $data->phone = $request->phone;
            $data->password = $request->password;
            $result = $data->save();

            if ($result) {
                return redirect('login')->with('success', 'Account Created Successfully');
            } else {
                return redirect()->back()->with('error', 'Account Not Created');
            }
        }
    }


    public function show($id)
    {
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function UserLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $email = $request->email;
        $password = $request->password;

        $user = DB::table('users')->where([['email', $email], ['password', $password]])->first();


        if ($user) {
            $request->session()->put('user', $user);
            return redirect('/')->with('login', 'Account Sign In Successfuly');
        } else {
            return redirect()->back()->with('error', 'Email Password Not Found');
        }
    }

    // <!----------- Website Start---------->

    public function userInfo()
    {
        $user = Session()->get('user');

        $user_id = $user->user_id;

        $count = Cart::where('user_id', $user_id)->count();

        $data = User::where('user_id', $user_id)->first();

        return view('website.profile', compact('data', 'count'));
    }

    public function userUpdate(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|min:10|max:10',
            'image' => 'nullable',
        ]);

        $user = Session()->get('user');

        $user_id = $user->user_id;

        $count = Cart::where('user_id', $user_id)->count();

        $data = User::where('id', $id)->first();

        if (isset($request->image)) {

            $old_image = public_path('storage/UserImage/') . $data->image;
            if (file_exists($old_image)) {
                @unlink($old_image);
            }

            //upload image
            $imageName = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/UserImage', $imageName);
            $data->image = $imageName;
        }
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $result = $data->save();

        if ($result) {

            return redirect()->back()->with('success', 'Data Updated');
        } else {
            return redirect()->back()->with('error', 'Data Not Added.......!');
        }
    }

    public function VerifyEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $verifyEmail = User::where('email', $request->email)->first();

        if ($verifyEmail) {

            $otp = rand('111111', '999999');
            DB::table('users')->where('email', $request->email)->update([
                'otp' =>  $otp
            ]);

            $mailOtp = [
                'subject' => 'Password Forgot One-Time Password (OTP)',
                'otp' => $otp
            ];

            Mail::to($request->email)->send(new Password_forgot_otp($mailOtp));


            return redirect()->back()->with('success', 'Otp Send To Email');
        } else {
            return redirect()->back()->with('error', 'Email Not Found');
        }
    }

    public function UpdatePassword(Request $request)
    {
        $request->validate([
            'otp' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        $VerifyUser = User::where([['email', $request->email], ['otp', $request->otp]])->first();

        if ($VerifyUser) {
            DB::table('users')->where('email', $request->email)->update([
                'password' => $request->password,
                'otp' => 'NULL',
            ]);
            return redirect()->route('login')->with('update', 'New Password Created Successfully');
        } else {
            return redirect()->back()->with('error', 'Something Went Wrong!');
        }
    }
}
