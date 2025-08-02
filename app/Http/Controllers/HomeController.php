<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Http\Request;
use App\Models\konsultasiKlik;
use Carbon\Carbon;
use App\Models\faq;
use App\Models\layanan;
use App\Models\JamOperasional;
use App\Models\janjitemu;
use App\Models\konsultan;
use App\Models\standar;
use App\Models\maklumat;
use App\Models\petugas;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
   public function index()
{
    $faq = faq::all();
    $maklumat = maklumat::all();
    $standar = standar::all();
    $layanan = layanan::all();
    $konsultan = konsultan::all();
    $jamOperasional = JamOperasional::all();
    $userId = Session::get('user_id');
    $janjiTemu = Janjitemu::where('users_id', $userId)
        ->whereIn('jenis', ['online', 'offline'])
        ->latest()
        ->first();
    $petugas = petugas::where('tanggal', Carbon::today())->with('konsultan')->first();

    // Data jumlah klik SEMUA USER (bukan per user)
    $today = konsultasiKlik::whereDate('clicked_at', Carbon::today())->count();
    $month = konsultasiKlik::whereMonth('clicked_at', Carbon::now()->month)->count();
    $total = konsultasiKlik::count();

    return view('user.user', compact('faq', 'janjiTemu', 'maklumat', 'standar', 'layanan', 'petugas', 'konsultan', 'today', 'month', 'total', 'jamOperasional'));
}

}
