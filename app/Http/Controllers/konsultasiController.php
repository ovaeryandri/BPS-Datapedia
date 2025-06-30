<?php

namespace App\Http\Controllers;

use App\Models\akunuser;
use App\Models\konsultasiKlik;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class konsultasiController extends Controller
{
    public function index(){
        return view('konsultasi.index');
    }

    public function store(Request $request)
{
    // Ambil user dari sesi login
    $user = akunuser::find(Session::get('user_id'));

    if (!$user) {
        return response()->json(['message' => 'Unauthorized'], 401);
    }

    // Validasi form input
    $validated = $request->validate([
        'nama'           => 'required|string|max:100',
        'jenis_kelamin'  => 'required|string',
        'email'          => 'required|email',
        'instansi'       => 'required|string',
        'keperluan'      => 'required|string',
        'data_diminta'   => 'required|string',
        'lainnya'        => 'nullable|string',
    ]);

    // Simpan ke database
    konsultasiKlik::create([
        'users_id'       => $user->id,
        'clicked_at'     => now(),
        'nama'           => $validated['nama'],
        'jenis_kelamin'  => $validated['jenis_kelamin'],
        'email'          => $validated['email'],
        'instansi'       => $validated['instansi'],
        'keperluan'      => $validated['keperluan'],
        'data_diminta'   => $validated['data_diminta'],
        'lainnya'        => $validated['lainnya'] ?? null,
    ]);

    // Format pesan WA
    $pesan = "*Permintaan Konsultasi Baru*\n\n";
    $pesan .= "📌 Nama: {$validated['nama']}\n";
    $pesan .= "📌 Jenis Kelamin: {$validated['jenis_kelamin']}\n";
    $pesan .= "📌 Email: {$validated['email']}\n";
    $pesan .= "📌 Instansi: {$validated['instansi']}\n";
    $pesan .= "📌 Keperluan Penggunaan Data: {$validated['keperluan']}\n";
    $pesan .= "📌 Data yang Diminta: {$validated['data_diminta']}\n";
    if (!empty($validated['lainnya'])) {
        $pesan .= "📌 Keperluan Lainnya: {$validated['lainnya']}\n";
    }

    // Nomor bot WhatsApp
    $botPhoneNumber = '6285788063284';

    // Redirect ke WA Web dengan pesan
    $url = "https://web.whatsapp.com/send?phone=$botPhoneNumber&text=" . urlencode($pesan);
    return redirect()->away($url);
}
    public function jumlah()
{
    $userId = Session::get('user_id');
    $user = akunuser::find($userId);

    $today = $user->jumlahKlik()->whereDate('clicked_at', Carbon::today())->count();
    $month = $user->jumlahKlik()->whereMonth('clicked_at', Carbon::now()->month)->count();
    $total = $user->jumlahKlik()->count();

    return view('user.user', compact('today', 'month', 'total'));
}


}
