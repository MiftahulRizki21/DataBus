<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\pendaftar_editor;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login'; // Pastikan ini diarahkan ke login

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function register(Request $request)
    {
        // Validasi input
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:pendaftar_editors',
            'role' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Simpan data ke tabel `pendaftarEditors`
        pendaftar_editor::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'role' => $data['role'],
            'password' => Hash::make($data['password']),
        ]);

        // Set session flash message
        session()->flash('success', 'Registrasi berhasil diajukan, menunggu persetujuan staf.');

        // Redirect to login page
        return redirect('/login');
    }

    /**
     * Handle a registered user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return \Illuminate\Http\Response
     */
    protected function registered(Request $request, $user)
    {
        // Logout user immediately after registration
        $this->guard()->logout();

        // Set session flash message
        session()->flash('success', 'Registrasi berhasil diajukan, menunggu persetujuan staf.');

        // Redirect to login page
        return redirect('/login');
    }
}
