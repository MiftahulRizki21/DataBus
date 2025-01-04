<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DetailBukuController;
use App\Http\Controllers\ListBukuController;
use App\Http\Controllers\SocialiteController;
use App\Models\ListBuku;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\RoleBasedAccess;
use App\Http\Controllers\StaffPustakaController;
use App\Http\Controllers\EditorController;
// use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;

Auth::routes();


// Route default
// Route::get('/', function () {
//     return view('layouts.app');
// });

Route::get('/beranda', [ListBukuController::class, 'index'])->name('detailBuku_show');


// Route::get('/detail_buku/{id}', [ListBukuController::class, 'show'])->name('detailBuku_show');


// Route::get('/editor', function () {
//     return view('General.editor');
// });

// Route::get('/staf', function () {
//     return view('General.staf');
// });



Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);


Route::get('/logout', function () {
    Auth::logout();
    return redirect('login');
});


Route::get('/listPengunjung', [ListBukuController::class, 'indexListPengunjung'])->name('listBukuPengunjung');

// /*<<<<<<< HEAD*/
// Route::controller(SocialiteController::class)->group(function(){
//     Route::get('auth/google', 'googlelogin')->name('auth.google');
//     Route::get('auth/google-callback','googleAuthentication')->name('auth.google-callback');
// });
// /*=======*/
// /*>>>>>>> 14df0e0278260e9dd92c2cb7c6b5c22123dfb299*/
// Rute untuk User

// Route untuk User
Route::get('/pengajuan', [PengajuanController::class, 'create'])->name('pengajuan.create');
Route::post('/pengajuan/store', [PengajuanController::class, 'store'])->name('pengajuan.store');

// Route untuk Editor
Route::get('/pengajuan/{id}/edit', [EditorController::class, 'edit'])->name('pengajuan.edit');
Route::put('/pengajuan/{id}', [EditorController::class, 'update'])->name('pengajuan.update');

// Route untuk Staff
Route::get('/pengajuan/{id}/review', [StaffPustakaController::class, 'review'])->name('pengajuan.review');
Route::put('/pengajuan/{id}/approve', [StaffPustakaController::class, 'approve'])->name('pengajuan.approve');
// Route::middleware([RoleBasedAccess::class . ':user'])->group(function () {
    
//     Route::get('/buku/{id}', [ListBukuController::class, 'detail'])->name('buku.detail');
//     Route::get('/pengajuan', [PengajuanController::class, 'create'])->name('pengajuan.create');
//     Route::get('/profile/user', [ProfileController::class, 'user'])->name('profile.profile');
//     Route::put('/profile/user/edit', [ProfileController::class, 'UpdateUser'])->name('profile.edit');
//     Route::get('/list', [ListBukuController::class, 'indexList'])->name('listBuku');
    
    
    
// });

// Rute untuk Staff
Route::middleware([RoleBasedAccess::class . ':staff'])->group(function () {
    Route::get('/staff/dashboard', [StaffPustakaController::class, 'index'])->name('staff.dashboard');
    // Route::get('/', [ListBukuController::class, 'show'])->name('listBuku');
    Route::get('/buku/{id}', [ListBukuController::class, 'detail'])->name('buku.detail');
});

// Rute Bersama (Profil untuk Staff dan Editor)
Route::middleware([RoleBasedAccess::class . ':editor'])->group(function () {
    Route::get('/editor/dashboard', [EditorController::class, 'index'])->name('editor.dashboard');
    // Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
});
