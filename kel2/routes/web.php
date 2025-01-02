<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\DetailBukuController;
use App\Http\Controllers\ListBukuController;
use App\Models\ListBuku;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\RoleBasedAccess;
use App\Http\Controllers\StaffPustakaController;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Auth::routes();


// Route default
Route::get('/', function () {
    return view('layouts.app');
});

Route::get('/beranda', function () {
    return view('General.beranda');
});

Route::get('/editor', function () {
    return view('General.editor');
});

Route::get('/staf', function () {
    return view('General.staf');
});

Route::get('/user', function () {
    return view('General.user');
});

Route::get('/pengajuan', function () {
    return view('listBuku.create');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);


Route::get('/logout', function () {
    Auth::logout();
    return redirect('login');
});

Route::middleware([RoleBasedAccess::class . ':staff'])->get('/staff/dashboard', [StaffPustakaController::class, 'index'])->name('staff.dashboard');
Route::middleware([RoleBasedAccess::class . ':user'])->get('/', [ListBukuController::class, 'show'])->name('listBuku');
Route::middleware([RoleBasedAccess::class . ':editor'])->get('/editor/dashboard', [EditorController::class, 'index'])->name('editor.dashboard');