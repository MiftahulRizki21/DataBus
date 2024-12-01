<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\ListBukuController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Tambahkan route autentikasi
Auth::routes();
// Middleware auth untuk proteksi route anggota
Route::middleware(['auth'])->group(function () {
    Route::resource('anggota', AnggotaController::class);
    Route::get('/anggota/{name}', [AnggotaController::class, 'show']);
    Route::get('/list_buku', [ListBukuController::class, 'index'])->name('user.list_buku');

});

Auth::routes();

// Route default
Route::get('/', function () {
    return view('layouts.app');
});

Route::get('/beranda', function () {
    return view('general.beranda');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/logout', function () {
    Auth::logout();
    return redirect('login');
});
