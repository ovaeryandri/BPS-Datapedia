<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use App\Models\akunuser;
use Illuminate\Http\Request;
use App\Rules\LoginUserCheck;
use Illuminate\Support\Facades\Session;

class UserLogin extends Controller
{
    public function dataUser(){
        $user = akunuser::all();
        return view('admin.user.index', compact('user'));
    }

    public function loginUser()
    {
        return view('login.User');
    }

    public function prosesloginUser(Request $request)
{
    $request->validate([
        'no_hp' => 'required|regex:/^08[0-9]{8,11}$/',
        'nama' => 'required|string',
    ]);

    $user = akunuser::where('no_hp', $request->no_hp)
                    ->where('nama', $request->nama)
                    ->first();

    if ($user) {
        session([
            'loginStatus' => true,
            'user' => $user,
            'user_id' => $user->id,
            'lastActivityTime' => time(), // Set waktu aktivitas awal
        ]);

        return redirect()->route('index');
    }

    return back()->withErrors([
        'no_hp' => 'nomor handphone salah atau tidak valid.'
    ]);
}



    public function logoutUser()
    {
        Session::flush();
        return redirect()->route('index');
    }

    function registerUser(){
        return view('register.index');
    }

    function daftar(Request $request){
        $request->validate([
            'no_hp' => 'required|regex:/^08[0-9]{8,11}$/|unique:users,no_hp',
            'nama' => 'required|string|min:3',
        ]);

        $data = [
            'no_hp' => $request->no_hp,
            'nama' => $request->nama,
        ];

        akunuser::create($data);
        return redirect()->route('loginUser')->with('success', 'Pendaftaran Berhasil');
    }
}
