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

    public function indexJadwal(){
         $userId = Session::get('user_id');

    $janjitemu = janjitemu::where('users_id', $userId)
        ->latest()
        ->get();
        return view('janjitemu.jadwal', compact('janjitemu'));
    }

    public function store(Request $request)
{
    $request->validate([
        'alamat' => 'required|min:3|string',
        'keperluan' => 'required|min:3|string',
        'tanggal' => 'required|date|after_or_equal:today',
        'jam' => 'required|date_format:H:i',
        'jenis' => 'required|in:online,offline',
    ], [
        'alamat.required' => 'Alamat Tidak Boleh Kosong',
        'keperluan.required' => 'Keperluan Tidak Boleh Kosong',
        'tanggal.required' => 'Tanggal Tidak Boleh Kosong',
        'tanggal.after_or_equal' => 'Tanggal Tidak Boleh Jika Sudah Kemarin',
        'jam' => 'Jam Tidak Boleh Kosong',
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
        'jam' => $request->jam,
        'jenis' => $request->jenis,
    ]);

    return redirect()->route('janjitemu.index')->with('success', 'Janji temu berhasil disimpan.');
}

public function edit($id){
        $janjitemu = janjitemu::findOrFail($id);
        return view('janjitemu.edit', compact('janjitemu'));
    }

   public function update(Request $request, $id)
{
    $janjitemu = janjitemu::findOrFail($id);

    $data = [
        'alamat' => $request->alamat,
        'keperluan' => $request->keperluan,
        'tanggal' => $request->tanggal,
        'jam' => $request->jam,
        'jenis' => $request->jenis,
    ];

    $janjitemu->update($data);

    return redirect()->route('janjitemu.jadwal')->with('success', 'Data berhasil diperbarui.');
}

    public function destroy($id){
        $janjitemu = janjitemu::findOrFail($id);
        $janjitemu->delete();
        return redirect()->route('janjitemu.index')->with('success', 'janjitemu Berhasil Dihapus');
    }

 /**
  * untuk online
  */

  public function indexOnline(){
       $janjitemu = Janjitemu::where('jenis', 'online')->get();
        return view('janjitemu.indexOnline', compact('janjitemu'));
    }

public function batal(Request $request, $id)
{
    $request->validate([
        'alasan_batal' => 'required|string|max:255',
    ]);

    $janjitemu = janjitemu::findOrFail($id);
    $janjitemu->status = 'batal';
    $janjitemu->alasan_batal = $request->alasan_batal;
    $janjitemu->save();

    return redirect()->back()->with('success', 'Janji temu berhasil dibatalkan.');
}




}
