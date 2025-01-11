<?php

namespace App\Http\Controllers;

use App\Models\staff_pustaka;
use App\Http\Requests\Storestaff_pustakaRequest;
use App\Http\Requests\Updatestaff_pustakaRequest;
use App\Models\pengajuan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\ListBuku;
use App\Models\pendaftar_editor;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class StaffPustakaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengajuans = Pengajuan::where('status', 'Diterima')->get();
        $history = Pengajuan::whereIn('status', ['Diterima', 'Ditolak'])->get();
        return view('General.staf',compact('pengajuans', 'history'));
    }

    public function review($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        return view('staff.review', compact('pengajuan'));
    }

    public function approve(Request $request, $id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
    
        // Jika status diterima, pastikan ISBN diisi
        if ($request->status == 'Diterima') {
            if (is_null($request->isbn) || empty($request->isbn)) {
                return redirect()->back()->with('error', 'ISBN tidak boleh kosong untuk pengajuan yang diterima.');
            }
    
            // Perbarui pengajuan
            $pengajuan->update([
                'status' => 'Diterima',
                'ISBN' => $request->isbn,
                'staff_id' => Auth::id(),
            ]);
    
            // Masukkan data ke tabel ListBuku
            \App\Models\ListBuku::create([
                'judul_buku' => $pengajuan->judul_buku,  // Ambil data dari pengajuan
                'sipnosis' => $pengajuan->sipnosis,
                'nama_penulis' => $pengajuan->nama_penulis,
                'nama_penerbit' => $pengajuan->nama_penerbit,
                'tgl_rilis' => $pengajuan->tgl_rilis,
                'editor_id' => $pengajuan->editor_id,
                'staff_id' => $pengajuan->staff_id,
                'halaman' => $pengajuan->halaman,
                'ISBN' => $request->isbn,  // Masukkan ISBN yang baru
                'foto' => $pengajuan->foto,  // Jika ada foto, sesuaikan dengan field yang ada
            ]);
    
            // Flash message sukses
            session()->flash('success', 'Pengajuan diterima dan buku berhasil dimasukkan ke List Buku!');
        } else {
            // Jika ditolak, status diubah menjadi ditolak
            $pengajuan->update([
                'status' => 'Ditolak',
            ]);
        }
    
        return redirect()->route('staff.dashboard');
    }
    
    public function DaftarEditor($id){
        
        // Cari data di tabel pendaftarEditors
        $pendaftar = pendaftar_editor::findOrFail($id);
        // Pindahkan data ke tabel `users`
        User::create([
            'name' => $pendaftar->name,
            'email' => $pendaftar->email,
            'role' => $pendaftar->role,
            'password' => Hash::make($pendaftar->password), // Atur password default
        ]);

        // Hapus data dari tabel `pendaftarEditors`
        $pendaftar->delete();

        return redirect()->back()->with('success', 'Akun berhasil disetujui dan dipindahkan ke tabel users.');
    }
    public function TolakEditor($id){
        $pendaftar = pendaftar_editor::findOrFail($id);
        $pendaftar->delete();
        return redirect()->back()->with('success', 'Akun berhasil ditolak dan dihapus');
        
    }

    public function showapprove(){
        $pendaftar = pendaftar_editor::latest()->paginate(10);
        return view('general.test', compact('pendaftar'));
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
    public function store(Storestaff_pustakaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(staff_pustaka $staff_pustaka)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(staff_pustaka $staff_pustaka)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updatestaff_pustakaRequest $request, staff_pustaka $staff_pustaka)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(staff_pustaka $staff_pustaka)
    {
        //
    }
}
