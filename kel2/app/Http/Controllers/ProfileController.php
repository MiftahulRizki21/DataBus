<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

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

            // Kirimkan data pengguna ke view
            return view('profile.profile', compact('user'));
        }

        /**
         * Show the form for creating a new resource.
         */
        public function UpdateUser(Request $request)
        {
            // Validasi data input
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            ]);

            // Ambil pengguna yang sedang login
            $user = Auth::user();

            // Update data pada model User
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            
            // Simpan perubahan pada model User
            $user->save();

            // Periksa apakah pengguna memiliki profil yang terkait
            if ($user->profile) {
                // Update data pada model Profile jika ada
                $user->profile->name = $request->input('name');
                $user->profile->save();
            }

            // Redirect kembali ke halaman edit profile dengan pesan sukses
            return redirect()->route('profile.edit')->with('success', 'Profil berhasil diperbarui!');
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
