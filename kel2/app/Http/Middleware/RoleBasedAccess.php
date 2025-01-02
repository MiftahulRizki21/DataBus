<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;  // Gunakan Log untuk debugging

class RoleBasedAccess
{
    public function handle($request, Closure $next, $role)
    {
        if (!Auth::check()) {
            Log::warning('Akses ditolak: Pengguna belum login. URL: ' . $request->url());
            return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu untuk mengakses halaman ini.');
        }
        $user = Auth::user();
        $email = $user->email;

        // Logika peran berdasarkan email
        if ($role == 'staff' && !str_contains($email, '@pcr.ac.id')) {
            abort(403, 'Unauthorized');
        }

        if ($role == 'user' && !str_contains($email, '@mahasiswa.pcr.ac.id')) {
            abort(403, 'Unauthorized');
        }

        if ($role == 'editor' ) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}


