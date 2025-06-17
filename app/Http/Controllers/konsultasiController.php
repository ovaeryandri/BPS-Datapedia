<?php

namespace App\Http\Controllers;

use App\Models\akunuser;
use App\Models\konsultasiKlik;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class konsultasiController extends Controller
{
    public function store()
{
    $user = akunuser::find(Session::get('user_id'));

    if (!$user) {
        return response()->json(['message' => 'Unauthorized'], 401);
    }

    konsultasiKlik::create([
        'users_id' => $user->id,
        'clicked_at' => now(),
    ]);

    return redirect()->back();
}



    public function jumlah()
{
    $userId = Session::get('user_id');
    $user = akunuser::find($userId);

    $today = $user->jumlahKlik()->whereDate('clicked_at', Carbon::today())->count();
    $month = $user->jumlahKlik()->whereMonth('clicked_at', Carbon::now()->month)->count();
    $total = $user->jumlahKlik()->count();

    return view('user.user', compact('today', 'month', 'total'));
}


}
