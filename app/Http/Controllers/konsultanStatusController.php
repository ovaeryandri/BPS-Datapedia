<?php

namespace App\Http\Controllers;

use App\Models\konsultan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class konsultanStatusController extends Controller
{
    public function index()
    {
        $konsultan = konsultan::findOrFail(session('konsultan_id'));
        $konsultanLogin = Session::get('konsultanLogin');
        return view('jadwal.status', compact('konsultan','konsultanLogin'));
    }

    public function store(Request $request)
{
    $konsultan = Konsultan::findOrFail(session('konsultan_id'));

    if ($request->status == 'tidak tersedia') {
        $request->validate([
            'alasan' => 'required|string|max:255',
            'tanggal_mulai_tidak_tersedia' => 'required|date|after_or_equal:today',
            'tanggal_selesai_tidak_tersedia' => 'required|date|after_or_equal:tanggal_mulai_tidak_tersedia',
        ], [
            'alasan.required' => 'Alasan Tidak Boleh Kosong',
            'tanggal_mulai_tidak_tersedia.required' => 'Tanggal Mulai tidak boleh kosong',
            'tanggal_mulai_tidak_tersedia.after_or_equal' => 'Tanggal Mulai Tidak Bisa jika tanggal nya sudah kemarin',
            'tanggal_selesai_tidak_tersedia' => 'Tanggal Selesai tidak boleh kosong',
            'tanggal_selesai_tidak_tersedia' => 'Tanggal Selesai Tidak Bisa Sebelum Tanggal Mulai',
        ]);

        $konsultan->status = 'tidak tersedia';
        $konsultan->alasan = $request->alasan;
        $konsultan->tanggal_mulai_tidak_tersedia = $request->tanggal_mulai_tidak_tersedia;
        $konsultan->tanggal_selesai_tidak_tersedia = $request->tanggal_selesai_tidak_tersedia;

    } else {
        $konsultan->status = 'tersedia';
        $konsultan->alasan = null;
        $konsultan->tanggal_mulai_tidak_tersedia = null;
        $konsultan->tanggal_selesai_tidak_tersedia = null;
    }

    $konsultan->save();

    return redirect()->back()->with('success', 'Status berhasil diperbarui');
}

}
