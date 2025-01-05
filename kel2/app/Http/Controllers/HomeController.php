<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListBuku;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function beranda(Request $request)
    {
        $user = Auth::user();
        $listBuku = ListBuku::inRandomOrder()->paginate(3);  
        return view('General.user', compact('listBuku', 'user'));
    }
    public function show(string $id)
    {
        $data['user'] = \App\Models\user::findOrFail($id);
        return view('profile.profile', $data);    

    }
    
}