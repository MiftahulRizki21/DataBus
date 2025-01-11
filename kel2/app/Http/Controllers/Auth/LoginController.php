<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * After login, redirect users to their role-specific pages.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    protected $redirectTo = '/';
    protected function authenticated($request, $user)
{
    if ($user && Hash::check($request->password, $user->password)) {
        // Cek berdasarkan domain email untuk menentukan peran pengguna
        if (str_contains($user->email, '@pcr.ac.id')) {
            return redirect()->route('staff.dashboard');
        }

        if (str_contains($user->email, '@mahasiswa.pcr.ac.id')) {
            return redirect()->route('user.dashboard'); // Redirect ke halaman user
        }

        return redirect()->route('editor.dashboard'); // Untuk editor atau role lainnya
    } else {
        // Login gagal, kembali dengan pesan kesalahan
        return back()->withErrors(['email' => 'Email atau password tidak sesuai.']);
    }

}


    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
// <<<<<<< HEAD
// }
// =======
// }

// >>>>>>> 14df0e0278260e9dd92c2cb7c6b5c22123dfb299
}