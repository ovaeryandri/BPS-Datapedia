<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use App\Models\konsultan;
use Illuminate\Http\Request;
use App\Rules\LoginKonsultanCheck;
use Illuminate\Support\Facades\Session;

class KonsultanLogin extends Controller
{

    public function loginKonsultan()
    {
        return view('login.Konsultan');
    }

    public function prosesloginKonsultan(Request $request)
{
    $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required', new LoginKonsultanCheck($request)],
    ]);

    // Ambil data konsultan berdasarkan email
    $konsultan = konsultan::where('email', $request->email)->first();

    // Simpan ID konsultan ke session
    session(['konsultan_id' => $konsultan->id]);

    // Redirect ke halaman status atau jadwal
    return redirect()->route('status.index');
}


    public function logoutKonsultan()
    {
        Session::flush();
        return redirect()->route('loginKonsultan');
    }
}
