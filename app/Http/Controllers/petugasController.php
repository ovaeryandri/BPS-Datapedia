<?php

namespace App\Http\Controllers;

use App\Models\konsultan;
use App\Models\petugas;
use Carbon\Carbon;
use Illuminate\Http\Request;

class petugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $konsultan = Konsultan::all();
    $petugas = Petugas::with('konsultan')->orderBy('tanggal', 'desc')->get();

    return view('admin.petugas.index', compact('konsultan', 'petugas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request)
{
    $request->validate([
        'konsultan_id' => 'required|exists:konsultans,id',
        'tanggal' => 'required|date',
    ]);

    petugas::updateOrCreate(
        ['tanggal' => $request->tanggal],
        ['konsultan_id' => $request->konsultan_id]
    );

    return redirect()->route('petugas.index')->with('success', 'Petugas Hari Ini berhasil dipilih.');
}


    public function create(Request $request)
{
    $konsultan = Konsultan::where('status', 'tersedia')->get();
    $petugas = Petugas::where('tanggal', Carbon::today())->first();

    return view('admin.petugas.create', compact('konsultan', 'petugas'));
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function edit($id)
{
    $petugas = Petugas::findOrFail($id);
    $konsultan = Konsultan::all();

    return view('admin.petugas.edit', compact('petugas', 'konsultan'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'konsultan_id' => 'required|exists:konsultans,id',
        'tanggal' => 'required|date',
    ]);

    $petugas = Petugas::findOrFail($id);
    $petugas->update([
        'konsultan_id' => $request->konsultan_id,
        'tanggal' => $request->tanggal,
    ]);

    return redirect()->route('petugas.index')->with('success', 'Data petugas berhasil diperbarui.');
}

public function destroy($id)
{
    $petugas = Petugas::findOrFail($id);
    $petugas->delete();

    return redirect()->route('petugas.index')->with('success', 'Data petugas berhasil dihapus.');
}
}
