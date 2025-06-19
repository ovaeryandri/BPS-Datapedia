<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\layananController;
use App\Http\Controllers\maklumatController;
use App\Http\Controllers\faqController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\janjitemuController;
use App\Http\Controllers\jadwalController;
use App\Http\Controllers\konsultanController;
use App\Http\Controllers\konsultanJadwalController;
use App\Http\Controllers\konsultanStatusController;
use App\Http\Controllers\konsultasiController;
use App\Http\Controllers\standarController;
use App\Http\Controllers\Login\AdminLogin;
use App\Http\Middleware\LoginCheckAdmin;
use App\Http\Middleware\LoggedInAdmin;
use App\Http\Controllers\Login\KonsultanLogin;
use App\Http\Middleware\LoginCheckKonsultan;
use App\Http\Middleware\LoggedInKonsultan;
use App\Http\Controllers\Login\UserLogin;
use App\Http\Middleware\LoginCheckUser;
use App\Http\Middleware\SessionTimeout;

Route::middleware(LoggedInKonsultan::class)->group(function () {
Route::get('/logoutKonsultan', [KonsultanLogin::class, 'logoutKonsultan'])->name('logoutKonsultan');
Route::resource('status', konsultanStatusController::class);
Route::get('/konsultan/jadwal', [konsultanJadwalController::class, 'index'])->name('konsultan.jadwal.index');
});

Route::middleware(LoggedInAdmin::class)->group(function () {
Route::post('/jadwal/batal/{id}', [jadwalController::class, 'batal'])->name('jadwal.batal');
Route::resource('jadwal', jadwalController::class);
Route::resource('faq', faqController::class);
Route::resource('konsultan', konsultanController::class);
Route::resource('admin', AdminController::class);
Route::resource('maklumat', maklumatController::class);
Route::resource('layanan', layananController::class);
Route::resource('standar', standarController::class);
Route::delete('/janjitemu/{id}', [janjitemuController::class, 'hapus'])->name('janjitemu.hapus');
Route::get('/logoutAdmin', [AdminLogin::class, 'logoutAdmin'])->name('logoutAdmin');

});

Route::middleware(LoginCheckAdmin::class)->group(function () {
    Route::get('/loginAdmin', [AdminLogin::class, 'loginAdmin'])->name('loginAdmin');
    Route::post('/prosesloginAdmin', [AdminLogin::class, 'prosesloginAdmin'])->name('prosesloginAdmin');
});

Route::middleware(LoginCheckKonsultan::class)->group(function () {
    Route::get('/loginKonsultan', [KonsultanLogin::class, 'loginKonsultan'])->name('loginKonsultan');
    Route::post('/prosesloginKonsultan', [KonsultanLogin::class, 'prosesloginKonsultan'])->name('prosesloginKonsultan');
});

Route::middleware(LoginCheckUser::class)->group(function () {
    Route::post('/klik-konsultasi', [konsultasiController::class, 'store'])->name('konsultasi.klik');
    Route::get('/user/jumlah', [konsultasiController::class, 'jumlah'])->name('konsultasi.jumlah');
    Route::resource('janjitemu', janjitemuController::class);
});

Route::middleware([SessionTimeout::class])->group(function (){
    Route::resource('/', HomeController::class);
});

    Route::get('/loginUser', [UserLogin::class, 'loginUser'])->name('loginUser');
    Route::post('/prosesloginUser', [UserLogin::class, 'prosesloginUser'])->name('prosesloginUser');
    Route::get('/registerUser', [UserLogin::class, 'registerUser'])->name('registerUser');
    Route::post('/prosesregisterUser', [UserLogin::class, 'daftar'])->name('prosesregisterUser');
    Route::post('/logoutUser', [UserLogin::class, 'logoutUser'])->name('logoutUser');
    Route::get('/user', [UserLogin::class, 'dataUser'])->name('dataUser');

