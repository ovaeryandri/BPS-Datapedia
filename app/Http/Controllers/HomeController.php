<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Http\Request;
use App\Models\konsultasiKlik;
use Carbon\Carbon;
use App\Models\faq;
use App\Models\layanan;
use App\Models\akunuser;
use App\Models\standar;
use App\Models\maklumat;
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

    // Data jumlah klik SEMUA USER (bukan per user)
    $today = konsultasiKlik::whereDate('clicked_at', Carbon::today())->count();
    $month = konsultasiKlik::whereMonth('clicked_at', Carbon::now()->month)->count();
    $total = konsultasiKlik::count();

    return view('user.user', compact('faq', 'maklumat', 'standar', 'layanan', 'today', 'month', 'total'));
}

}
