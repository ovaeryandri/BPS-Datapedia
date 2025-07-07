<?php

namespace App\Http\Controllers;

use App\Models\jadwal;
use App\Models\janjitemu;
use App\Models\konsultan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

 public function hapus($id)
{
    $janjiTemu = janjitemu::with('jadwal')->find($id);

    if (!$janjiTemu) {
        return redirect()->back()->with('error', 'Data janji temu tidak ditemukan.');
    }

    // Hapus jadwal jika ada
    if ($janjiTemu->jadwal) {
        $janjiTemu->jadwal->delete();
    }

    // Hapus janjittemu
    $janjiTemu->delete();

    return redirect()->back()->with('success', 'Data janji temu berhasil dihapus.');
}

public function terima($id)
{
    $janjiTemu = janjitemu::with('user')->findOrFail($id);
    $janjiTemu->status = 'diterima';
    $janjiTemu->save();

    $no_hp = $janjiTemu->user->no_hp;

    // Simpan ke tabel notifikasi atau kirim ke Node.js via file atau Redis
    DB::table('notifikasi_wa')->insert([
        'no_hp' => $no_hp,
        'pesan' => "Halo, janji temu Anda pada tanggal {$janjiTemu->tanggal} pukul {$janjiTemu->jam} telah *DITERIMA*. Terima kasih.",
        'created_at' => now(),
        'updated_at' => now(),
        'status' => 'pending',
    ]);

    return redirect()->back()->with('success', 'Janji temu diterima dan notifikasi akan dikirim.');
}

public function tolak(Request $request, $id)
{
    $janji = janjitemu::with('user')->findOrFail($id);
    $janji->status = 'ditolak';
    $janji->save();

    DB::table('notifikasi_wa')->insert([
        'no_hp' => $janji->user->no_hp,
        'pesan' => "Halo {$janji->user->nama}, mohon maaf, janji temu Anda pada tanggal {$janji->tanggal} *DITOLAK*. ❌",
        'status' => 'pending',
        'created_at' => now(),
        'updated_at' => now()
    ]);

    return redirect()->back()->with('success', 'Janji temu ditolak dan notifikasi dikirim.');
}

public function formZoom($id)
{
    $janjiTemu = janjitemu::with('user')->findOrFail($id);

    if ($janjiTemu->jenis !== 'online' || $janjiTemu->status !== 'diterima') {
        return redirect()->back()->with('error', 'Janji temu ini bukan online atau belum diterima.');
    }

    return view('admin.jadwalAdmin.zomm', compact('janjiTemu'));
}

public function kirimZoom(Request $request, $id)
{
    $request->validate([
        'link_zoom' => 'required|url',
    ]);

    $janjiTemu = janjitemu::with('user')->findOrFail($id);

    // Kirim ke notifikasi_wa
    DB::table('notifikasi_wa')->insert([
        'no_hp' => $janjiTemu->user->no_hp,
        'pesan' => "Halo {$janjiTemu->user->nama}, ini adalah Link Zoom untuk janji temu Anda:\n\n📅 {$janjiTemu->tanggal}, ⏰ {$janjiTemu->jam}\n🔗 Link: {$request->link_zoom}",
        'status' => 'pending',
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return redirect()->route('jadwal.index')->with('success', 'Link Zoom berhasil dikirim.');
}


}
