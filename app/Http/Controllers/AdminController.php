<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;

class AdminController extends Controller
{
    //
    public function admin_login(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $email = $request->email;
        $password = $request->password;

        $admin = DB::table('admins')->where([['email', $email], ['password', $password]])->first();


        if ($admin) {
            $request->session()->put('admin', $admin);
            return redirect('dashboard');
        } else {
            return redirect()->back()->with('error', 'Email Password Not Found');
        }
    }

    public function StorageLink()
    {
      return 'need source code';
    }
}
