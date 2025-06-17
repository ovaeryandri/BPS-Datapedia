<?php

namespace App\Http\Controllers;
use App\Models\faq;
use Illuminate\Http\Request;

class faqController extends Controller
{
    public function index(){
        $faq = faq::all();
        return view('admin.faq.index', compact('faq'));
    }

    public function create(){
        $faq = faq::all();
        return view('admin.faq.create', compact('faq'));
    }

    public function store(Request $request){
        $request->validate([
            'judul' => 'required|min:5|string',
            'deskripsi' => 'required|min:5|string',
        ]);

        faq::create([
            "judul" => $request->judul,
            "deskripsi" => $request->deskripsi,
        ]);
        return redirect()->route('faq.index')->with('success', 'Admin Berhasil Ditambah');
    }

    public function edit($id){
        $faq = faq::findOrFail($id);
        return view('admin.faq.edit', compact('faq'));
    }

    public function update(Request $request, $faq){
        $request->validate([
            'judul' => 'min:5|string',
            'deskripsi' => 'min:5|string',
        ]);
        $data = [
            "judul" => $request->judul,
            "deskripsi" => $request->deskripsi,
        ];

        $faq->update($data);

        return redirect()->route('faq.index')->with('success', 'FAQ Berhasil Diubah');
    }

    public function destroy($id){
        $faq = faq::findOrFail($id);
        $faq->delete();
        return redirect()->route('faq.index')->with('success', 'FAQ Berhasil Dihapus');
    }
}
