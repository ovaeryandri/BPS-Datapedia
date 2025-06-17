<?php

namespace App\Http\Controllers;

use App\Models\jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class konsultanJadwalController extends Controller
{
     public function index()
    {
        $konsultanId = Session::get('konsultan_id');
        $jadwals = jadwal::with('janjitemu.user')
                    ->where('konsultan_id', $konsultanId)
                    ->get();

        return view('jadwal.index', compact('jadwals'));
    }
}
