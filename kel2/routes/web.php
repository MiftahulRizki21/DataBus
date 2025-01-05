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
use App\Models\DetailBuku;

Auth::routes();


// Route default
// Route::get('/', function () {
//     return view('layouts.app');
// });

Route::get('/', [ListBukuController::class, 'index'])->name('detailBuku_show');


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
Route::get('/list', [ListBukuController::class, 'indexList'])->name('listBuku');

// /*<<<<<<< HEAD*/
// Route::controller(SocialiteController::class)->group(function(){
//     Route::get('auth/google', 'googlelogin')->name('auth.google');
//     Route::get('auth/google-callback','googleAuthentication')->name('auth.google-callback');
// });
// /*=======*/
// /*>>>>>>> 14df0e0278260e9dd92c2cb7c6b5c22123dfb299*/
// Rute untuk User

// Route Profile
Route::get('/profile/user', [ProfileController::class, 'user'])->name('profile.profile');
Route::get('/profile/edit', [ProfileController::class, 'user'])->name('profile.edit');
Route::put('/profile/update/{id}', [ProfileController::class, 'UpdateUser'])->name('profile.update');

// Route untuk User
Route::get('/pengajuan', [PengajuanController::class, 'create'])->name('pengajuan.create');
Route::post('/pengajuan/store', [PengajuanController::class, 'store'])->name('pengajuan.store');

// Route untuk Editor
Route::get('/pengajuan/{id}/edit', [EditorController::class, 'edit'])->name('pengajuan.edit');
Route::put('/pengajuan/{id}', [EditorController::class, 'update'])->name('pengajuan.update');
// web.php
Route::get('/pengajuan/download/{id}', [PengajuanController::class, 'download'])->name('pengajuan.download');
// Route untuk Staff
Route::get('/pengajuan/{id}/reject', [StaffPustakaController::class, 'reject'])->name('pengajuan.reject');
Route::put('/pengajuan/{id}/approve', [StaffPustakaController::class, 'approve'])->name('pengajuan.approve');

Route::middleware([RoleBasedAccess::class . ':user'])->group(function () {
    Route::get('/user/dashboard', [PengajuanController::class, 'index'])->name('user.dashboard');
    Route::get('/detail_buku/{id}', [ListBukuController::class, 'show'])->name('buku.detail');
    Route::get('/pengajuan', [PengajuanController::class, 'create'])->name('pengajuan.create');
    
});

// Rute untuk Staff
Route::middleware([RoleBasedAccess::class . ':staff'])->group(function () {
    Route::get('/staff/dashboard', [StaffPustakaController::class, 'index'])->name('staff.dashboard');
    // Route::get('/', [ListBukuController::class, 'show'])->name('listBuku');
    Route::get('editor/detail_buku/{id}', [PengajuanController::class, 'show'])->name('buku.detail');
    Route::get('/list/staff', [ListBukuController::class, 'indexList'])->name('listBuku');

});

// Rute Bersama (Profil untuk Staff dan Editor)
Route::middleware([RoleBasedAccess::class . ':editor'])->group(function () {
    Route::get('/editor/dashboard', [EditorController::class, 'index'])->name('editor.dashboard');
    // Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
});
