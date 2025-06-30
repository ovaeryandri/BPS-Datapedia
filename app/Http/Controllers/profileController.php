<?php

namespace App\Http\Controllers;

use App\Models\akunuser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class profileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
{
    $userId = session('user_id');
    $user = akunuser::find($userId); // hanya ambil user yang login
    return view('user.profile', compact('user'));
}

// ProfilController.php
public function updateUsername(Request $request) {
    $user = akunuser::find(session('user')->id);
    $user->nama = $request->username;
    $user->save();

    // Update session
    session(['user' => $user]);

    return response()->json(['status' => 'success']);
}


public function updatePhone(Request $request) {
    $user = akunuser::find(session('user')->id);
    $user->no_hp = $request->no_hp;
    $user->save();

    // Update session
    session(['user' => $user]);

    return response()->json(['status' => 'success']);
}

public function updatePassword(Request $request)
{
    $request->validate([
        'old_password' => 'required',
        'new_password' => 'required|min:6|confirmed',
    ]);

    $user = akunuser::find(session('user')->id);

    if (!Hash::check($request->old_password, $user->password)) {
        return response()->json(['status' => 'error', 'message' => 'Password lama salah'], 422);
    }

    $user->password = Hash::make($request->new_password);
    $user->save();

    // Update session
    session(['user' => $user]);

    return response()->json(['status' => 'success']);
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
