<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use App\Models\konsultan;
use Illuminate\Http\Request;
use App\Rules\LoginKonsultanCheck;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class KonsultanLogin extends Controller
{

    public function loginKonsultan()
    {
        return view('login.Konsultan');
    }

    public function prosesloginKonsultan(Request $request)
{
    $email = $request->input('email');
    $password = $request->input('password');

    $konsultan = konsultan::where('email', $email)->first();

    if ($konsultan && Hash::check($password, $konsultan->password)) {
        Session::put('loginStatus', true);
        Session::put('konsultanLogin', $konsultan);
        session(['konsultan_id' => $konsultan->id]);
        return redirect()->route('status.index');
    }

}


    public function logoutKonsultan()
    {
        Session::flush();
        return redirect()->route('loginKonsultan');
    }
}
