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
        'tanggal' => 'required|date|after_or_equal:today',
        'jenis' => 'required|in:online,offline',
    ], [
        'alamat.required' => 'Alamat Tidak Boleh Kosong',
        'keperluan.required' => 'Keperluan Tidak Boleh Kosong',
        'tanggal.required' => 'Tanggal Tidak Boleh Kosong',
        'tanggal.after_or_equal' => 'Tanggal Tidak Boleh Jika Sudah Kemarin',
        'jenis.required' => 'Jenis Tidak Boleh Kosong',
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

    return redirect()->route('janjitemu.index')->with('success', 'Janji temu berhasil disimpan.');
}


}
