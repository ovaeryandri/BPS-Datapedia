<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use App\Models\akunuser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
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
        'no_hp' => 'required|regex:/^62[0-9]{9,12}$/',
        'password' => 'required|min:5|string',
    ], [
        'no_hp.required' => 'Nomor Handphone Tidak Boleh Kosong',
        'no_hp.regex' => 'Nomor Handphone Tidak Valid',
        'password.required' => 'Password Tidak Boleh Kosong',
        'password.min' => 'Password Minimal 5 Karakter',
    ]);

    // Buat throttle key berdasarkan nomor HP + IP
    $throttleKey = Str::lower($request->no_hp) . '|' . $request->ip();

    if (RateLimiter::tooManyAttempts($throttleKey, 10)) {
        $seconds = RateLimiter::availableIn($throttleKey);
        return back()->withErrors([
            'no_hp' => "Terlalu banyak percobaan login. Silakan coba lagi dalam $seconds detik."
        ])->withInput();
    }

    $user = akunuser::where('no_hp', $request->no_hp)->first();

    if ($user && Hash::check($request->password, $user->password)) {
        // Reset percobaan jika login berhasil
        RateLimiter::clear($throttleKey);

        session([
            'loginStatus' => true,
            'user' => $user,
            'user_id' => $user->id,
            'lastActivityTime' => time(),
        ]);

        return redirect()->route('index');
    }

    // Tambah percobaan login
    RateLimiter::hit($throttleKey, 120); // 120 detik = 2 menit

    return back()->withErrors([
        'invalid_no_hp' => 'Nomor Salah atau Tidak Valid',
        'invalid_password' => 'Password Salah atau Tidak Valid',
    ])->withInput();
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
            'no_hp' => 'required|regex:/^62[0-9]{9,12}$/',
            'nama' => 'required|string|min:2',
            'password' => 'required|string|min:5',
        ], [
            'no_hp.required' => 'Nomor Handphone Wajib Diisi',
            'no_hp.unique' => 'Nomor Handphone Telah Digunakan',
            'no_hp.regex' => 'Nomor Handphone Salah',
            'nama.required' => 'Username Wajib Diisi',
            'nama.min' => 'Username Harus Lebih Dari 2 karakter',
            'password.required' => 'Password Wajib Diisi',
            'password.min' => 'Password Harus Lebih Dari 5 karakter',
        ]);

        $data = [
            'no_hp' => $request->no_hp,
            'nama' => $request->nama,
            'password' => Hash::make($request->password),
        ];

        akunuser::create($data);
        return redirect()->route('loginUser')->with('success', 'Pendaftaran Berhasil');
    }
}
