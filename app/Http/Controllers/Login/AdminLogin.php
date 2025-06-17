<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Rules\LoginAdminCheck;
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
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', new LoginAdminCheck($request)],
        ]);

        return redirect()->route('admin.index');
    }

    public function logoutAdmin()
    {
        Session::flush();
        return redirect()->route('loginAdmin');
    }
}
