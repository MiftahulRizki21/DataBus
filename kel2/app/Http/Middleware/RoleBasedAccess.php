<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class RoleBasedAccess
{
    public function handle($request, Closure $next, $roles, $allowedRoutes = null)
    {
        if (!Auth::check()) {
            Log::info("Pengguna belum login. Redirect ke login.");
            return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        $user = Auth::user();
        $rolesArray = explode(',', $roles);

        if (!in_array($user->role, $rolesArray)) {
            Log::info("Role pengguna {$user->role} tidak diizinkan.");
            return abort(403, 'Unauthorized');
        }

        // Ambil rute yang diizinkan dari konfigurasi
        $allowedRoutesArray = config("roles.roles.{$user->role}", []);
        $routeName = $request->route()->getName();

        if (!in_array($routeName, $allowedRoutesArray)) {
            Log::info("Rute {$routeName} tidak diizinkan untuk role {$user->role}");
            return abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
