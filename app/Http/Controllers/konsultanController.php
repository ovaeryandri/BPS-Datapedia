<?php

namespace App\Http\Controllers;
use App\Models\konsultan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class konsultanController extends Controller
{
    public function index(){
        $konsultan = konsultan::all();
        return view('admin.konsultan.index', compact('konsultan'));
    }

    public function create(){
        $konsultan = konsultan::all();
        return view('admin.konsultan.create', compact('konsultan'));
    }

    public function store(Request $request){
        $request->validate([
            'email' => 'required|unique:konsultans|string',
            'nama' => 'required|min:5|string',
            'password' => 'required|min:5|string',
            'no_hp' => 'required|string',
        ]);

        konsultan::create([
            "email" => $request->email,
            "nama" => $request->nama,
            "password" => Hash::make($request->password),
            "no_hp" => $request->no_hp,
        ]);
        return redirect()->route('konsultan.index')->with('success', 'konsultan Berhasil Ditambah');
    }

    public function edit($id){
        $konsultan = konsultan::findOrFail($id);
        return view('admin.konsultan.edit', compact('konsultan'));
    }

    public function update(Request $request, konsultan $konsultan){
        $request->validate([
            'email' => 'unique:konsultans|string',
            'nama' => 'min:5|string',
            'password' => 'nullable|min:5|string',
            'no_hp' => 'string',
        ]);

        $konsultan->email = $request->email;

        if ($request->filled('password')) {
            $konsultan->password = Hash::make($request->password);
        }

        $konsultan->save();

        return redirect()->route('konsultan.index')->with('success', 'Admin Berhasil Diubah');
    }

    public function destroy($id){
        $konsultan = konsultan::findOrFail($id);
        $konsultan->delete();
        return redirect()->route('konsultan.index')->with('success', 'Admin Berhasil Dihapus');
    }
}
