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

Auth::routes();


// Route default
Route::get('/', function () {
    return view('layouts.app');
});

Route::get('/beranda', [ListBukuController::class, 'index'])->name('listBuku.detailBuku_show');
Route::get('/user', [ListBukuController::class, 'indexUser'])->name('listBuku.detailBuku_show');
Route::get('/list', [ListBukuController::class, 'indexList'])->name('listBuku.detailBuku_show');
Route::get('/listPengunjung', [ListBukuController::class, 'indexListPengunjung'])->name('listBuku.detailBuku_show');

Route::get('/detail_buku/{id}', [ListBukuController::class, 'show'])->name('detailBuku_show');


Route::get('/editor', function () {
    return view('General.editor');
});

Route::get('/staf', function () {
    return view('General.staf');
});

Route::get('/pengajuan', function () {
    return view('listBuku.create');
});
Route::resource('listBuku', ListBukuController::class);
Route::post('/tambah', [ListBukuController::class, 'store']);



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);


Route::get('/logout', function () {
    Auth::logout();
    return redirect('login');
});

// /*<<<<<<< HEAD*/
// Route::controller(SocialiteController::class)->group(function(){
//     Route::get('auth/google', 'googlelogin')->name('auth.google');
//     Route::get('auth/google-callback','googleAuthentication')->name('auth.google-callback');
// });
// /*=======*/
// Route::middleware([RoleBasedAccess::class . ':staff'])->get('/staff/dashboard', [StaffPustakaController::class, 'index'])->name('staff.dashboard');
// Route::middleware([RoleBasedAccess::class . ':user'])->get('/', [ListBukuController::class, 'show'])->name('listBuku');
// Route::middleware([RoleBasedAccess::class . ':editor'])->get('/editor/dashboard', [EditorController::class, 'index'])->name('editor.dashboard');
// /*>>>>>>> 14df0e0278260e9dd92c2cb7c6b5c22123dfb299*/
