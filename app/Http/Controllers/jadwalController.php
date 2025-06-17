<?php

namespace App\Http\Controllers;

use App\Models\jadwal;
use App\Models\janjitemu;
use App\Models\konsultan;
use Illuminate\Http\Request;

class jadwalController extends Controller
{
    public function index()
    {
        $janjiTemu = janjitemu::with('user', 'jadwal')->get();
        $konsultans = konsultan::where('status', 'tersedia')->get();

        return view('admin.jadwalAdmin.index', compact('janjiTemu', 'konsultans'));
    }

    public function store(Request $request){
        $request->validate([
            'janjitemu_id' => 'required|exists:janjitemu,id',
            'konsultan_id' => 'required|exists:konsultans,id',
        ]);

        jadwal::create([
            'janjitemu_id' => $request->janjitemu_id,
            'konsultan_id' => $request->konsultan_id,
        ]);

        return redirect()->back()->with('success', 'Jadwal berhasil diatur');
    }

}
