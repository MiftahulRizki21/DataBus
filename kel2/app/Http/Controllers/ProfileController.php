<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\pengajuan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Auth\SessionGuard;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }
    public function user()
    {
            // Ambil data pengguna yang sedang login
            $user = Auth::user();
            $history = Pengajuan::where('user_id', $user->id)->get();

            // Jika tidak ada pengajuan, pastikan $history tetap array kosong
            if (!$history) {
                $history = [];
            }
            return view('profile.profile', compact('user', 'history'));
    }

            
    
        /**
         * Show the form for creating a new resource.
         */
    public function UpdateUser(Request $request, $id)
    {
    // Validasi status dan file jika statusnya 'Revisi'
    $request->validate([
        'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
        ]);

    $user = User::findOrFail($id);
        // Jika diterima, update status menjadi diterima
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
            $user->save(); // Simpan perubahan file
            // Debugging: cek path file yang berhasil disimpan
            return redirect()->route('profile.profile')->with('success', 'Pengajuan berhasil diperbarui!');
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
    public function store(StoreProfileRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProfileRequest $request, Profile $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
