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
        $janjiTemu = janjitemu::with('user', 'jadwal.konsultan')->get();
        $konsultans = konsultan::where('status', 'tersedia')->get();

        return view('admin.jadwalAdmin.index', compact('janjiTemu', 'konsultans'));
    }

   public function store(Request $request)
{
    $request->validate([
        'janjitemu_id' => 'required|exists:janjitemu,id',
        'konsultan_id' => 'required|exists:konsultans,id',
    ]);

    $jadwal = jadwal::where('janjitemu_id', $request->janjitemu_id)->first();

    if ($jadwal) {
        // update konsultan_id
        $jadwal->update([
            'konsultan_id' => $request->konsultan_id,
        ]);
    } else {
        // buat baru
        jadwal::create([
            'janjitemu_id' => $request->janjitemu_id,
            'konsultan_id' => $request->konsultan_id,
        ]);
    }

    return redirect()->back()->with('success', 'Jadwal berhasil diatur ulang.');
}


    public function batal($id)
{
    $jadwal = jadwal::findOrFail($id);
    $jadwal->konsultan_id = null; // kosongkan agar bisa diisi ulang
    $jadwal->save();

    return redirect()->back()->with('success', 'Konsultan berhasil dibatalkan, silakan pilih ulang.');
}

    public function destroy($id)
{
    $jadwal = Jadwal::find($id);

    if (!$jadwal) {
        return redirect()->back()->with('error', 'Jadwal tidak ditemukan.');
    }

    $jadwal->delete();

    return redirect()->back()->with('success', 'Jadwal berhasil dihapus.');
}


}
