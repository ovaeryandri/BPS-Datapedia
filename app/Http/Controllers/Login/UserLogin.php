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
    ], [
        'no_hp.required' => 'Nomor Handphone Tidak Boleh Kosong',
        'no_hp.regex' => 'Nomor Handphone Tidak Valid',
        'nama.required' => 'Username Tidak Boleh Kosong',
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
    } else {

        return back()->withErrors([
            'invalid_no_hp' => 'Nomor Salah atau Tidak Valid',
            'invalid_nama' => 'Username Salah atau Tidak Valid',
        ])->withInput();
    }

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
            'nama' => 'required|string|min:2',
        ], [
            'no_hp.required' => 'Nomor Handphone Wajib Diisi',
            'no_hp.unique' => 'Nomor Handphone Telah Digunakan',
            'no_hp.regex' => 'Nomor Handphone Salah',
            'nama.required' => 'Username Wajib Diisi',
            'nama.min' => 'Username Harus Lebih Dari 2 karakter',
        ]);

        $data = [
            'no_hp' => $request->no_hp,
            'nama' => $request->nama,
        ];

        akunuser::create($data);
        return redirect()->route('loginUser')->with('success', 'Pendaftaran Berhasil');
    }
}
