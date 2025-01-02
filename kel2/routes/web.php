<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\DetailBukuController;
use App\Http\Controllers\ListBukuController;
use App\Models\ListBuku;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Tambahkan route autentikasi
Auth::routes();
// Middleware auth untuk proteksi route anggota
// Route::middleware(['auth'])->group(function () {

route::get('/test', [ListBukuController::class,'create']);
route::post('/test/create', [ListBukuController::class,'store']);
// });
Route::get('/list_buku', [ListBukuController::class, 'index'])->name('user.list_buku');
Route::get('/detail_buku/{id}', [DetailBukuController::class, 'index'])->name('listBuku.detailBuku_show');

Auth::routes();

// Route default
Route::get('/', [ListBukuController::class,'index']);

Route::get('/beranda', function () {
    return view('general.beranda');
});

Route::get('/beranda1', function () {
    return view('general.beranda1');
});


Route::get('/user', function () {
    return view('general.user');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/logout', function () {
    Auth::logout();
    return redirect('login');
});
