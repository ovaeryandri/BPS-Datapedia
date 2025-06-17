<?php

namespace App\Http\Controllers;

use App\Models\konsultan;
use Illuminate\Http\Request;

class konsultanStatusController extends Controller
{
    public function index()
    {
        $konsultan = konsultan::findOrFail(session('konsultan_id'));
        return view('jadwal.status', compact('konsultan'));
    }

    public function store(Request $request)
    {
        $konsultan = konsultan::findOrFail(session('konsultan_id'));

        if ($request->status == 'tidak tersedia') {
            $request->validate([
                'alasan' => 'required|string|max:255',
            ]);
            $konsultan->status = 'tidak tersedia';
            $konsultan->alasan = $request->alasan;
        } else {
            $konsultan->status = 'tersedia';
            $konsultan->alasan = null;
        }

        $konsultan->save();

        return redirect()->back()->with('success', 'Status berhasil diperbarui');
    }
}
