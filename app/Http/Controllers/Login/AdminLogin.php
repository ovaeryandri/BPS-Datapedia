<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use App\Models\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class AdminLogin extends Controller
{
    public function dashboard()
    {
        return view('admin.layout');
    }

    public function loginAdmin()
    {
        return view('login.Admin');
    }

   public function prosesloginAdmin(Request $request)
{
     $email = $request->input('email');
    $password = $request->input('password');

    $admin = admin::where('email', $email)->first();

    if ($admin && Hash::check($password, $admin->password)) {
        Session::put('loginStatus', true);
        Session::put('adminLogin', $admin);
        return redirect()->route('admin.index');
    }

    return back()->withErrors(['email' => 'Email atau password salah']);
}

    public function logoutAdmin()
    {
        Session::flush();
        return redirect()->route('loginAdmin');
    }
}
