<?php

namespace App\Http\Controllers;

use App\Models\janjitemu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class janjitemuController extends Controller
{

    public function index(){
        $janjitemu = janjitemu::all();
        return view('janjitemu.index', compact('janjitemu'));
    }

    public function store(Request $request)
{
    $request->validate([
        'alamat' => 'required|min:3|string',
        'keperluan' => 'required|min:3|string',
        'tanggal' => 'required|date',
        'jenis' => 'required|in:online,offline',
    ]);

    $userId = Session::get('user_id'); // ✅ pastikan sudah terset saat login

    if (!$userId) {
        return redirect()->route('loginUser')->withErrors('Silakan login terlebih dahulu.');
    }

    janjitemu::create([
        'users_id' => $userId,
        'alamat' => $request->alamat,
        'keperluan' => $request->keperluan,
        'tanggal' => $request->tanggal,
        'jenis' => $request->jenis,
    ]);

    return redirect()->route('index')->with('success', 'Janji temu berhasil disimpan.');
}

   public function hapus($id)
{
    $janjiTemu = \App\Models\janjitemu::with('jadwal')->find($id);

    if (!$janjiTemu) {
        return redirect()->back()->with('error', 'Data janji temu tidak ditemukan.');
    }

    // Hapus jadwal jika ada
    if ($janjiTemu->jadwal) {
        $janjiTemu->jadwal->delete();
    }

    // Hapus janji temu
    $janjiTemu->delete();

    return redirect()->back()->with('success', 'Data janji temu berhasil dihapus.');
}



}
