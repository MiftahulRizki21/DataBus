<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

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
    protected function authenticated($request, $user)
{
    // Redirect based on role after login
    if (str_contains($user->email, '@pcr.ac.id')) {
        return redirect()->route('staff.dashboard');
    }

    if (str_contains($user->email, '@mahasiswa.pcr.ac.id')) {
        return redirect()->route('listBuku'); // Redirect to user homepage
    }

    return redirect()->route('editor.dashboard'); // For editor or other roles
}


    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
<<<<<<< HEAD
}
=======
}

>>>>>>> 14df0e0278260e9dd92c2cb7c6b5c22123dfb299
