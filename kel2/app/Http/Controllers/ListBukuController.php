<?php

namespace App\Http\Controllers;

use App\Models\ListBuku;
use App\Http\Requests\StoreListBukuRequest;
use App\Http\Requests\UpdateListBukuRequest;
use App\Support\Facedes\Storage;
use Illuminate\Http\Request;
use App\Models\pengajuan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\DetailBuku;

class ListBukuController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Ambil data buku secara acak dan paginate
        $listBuku = ListBuku::inRandomOrder()->paginate(3);
    
    
        // Jika permintaan berasal dari AJAX, kirimkan konten dalam bentuk JSON
        if ($request->ajax()) {
            return response()->json([
                'html' => view('general.beranda', compact('listBuku'))->render(),
                'next_page' => $listBuku->nextPageUrl(),
                'previous_page' => $listBuku->previousPageUrl(),
            ]);
        }
    
        // Jika bukan permintaan AJAX, tampilkan view biasa
        return view('general.beranda', compact('listBuku'));
    }
    
    public function detailBuku(Request $request, $id)
    {
        // Ambil data buku berdasarkan ID
        $detailBuku = ListBuku::findOrFail($id);
    
        // Kirim data buku ke view
        return view('listBuku.detailBuku_show', compact('detailBuku'));
    }
    
    public function indexUser()
    {
        // Query untuk data pengajuans
        $pengajuans = DB::select("
            SELECT * 
            FROM pengajuans 
            WHERE status IN ('Tidak Diterima', 'Revisi')
        ");
    
        // Query untuk data history
        $history = DB::select("
            SELECT * 
            FROM pengajuans 
            WHERE status IN ('ditolak', 'Diterima')
            AND id NOT IN (
                SELECT id 
                FROM pengajuans 
                WHERE status IN ('Tidak Diterima', 'Revisi')
            )
        ");
        dd([
            'pengajuans' => $pengajuans,
            'history' => $history,
        ]);
        
        // Kirim data ke view
        return view('general.user', [
            'pengajuans' => collect($pengajuans), // Ubah ke koleksi agar kompatibel dengan Blade
            'history' => collect($history),      // Ubah ke koleksi agar kompatibel dengan Blade
        ]);
    }
    

    public function beranda(Request $request)
    {
        
        $listBuku = ListBuku::inRandomOrder()->paginate(8);        
        return view('General.beranda', compact('listBuku'));
    }
    
    public function indexList()
    {
        $user = Auth::user();

        $listBuku = ListBuku::inRandomOrder()->paginate(8);        
        return view('ListBuku.list_buku', compact('listBuku', 'user'));
    }


    public function indexListPengunjung()
    {
        $listBuku = ListBuku::inRandomOrder()->paginate(8);        
        return view('ListBuku.list_bukuPengunjung', compact('listBuku'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('listBuku.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreListBukuRequest $request)
    {
        $requestData = $request->validate([
            'judul_buku' => 'required',
            'sipnosis' => 'required',
            'nama_penulis' => 'required|string',
            'nama_penerbit' => 'required',
            'tgl_rilis' => 'nullable|date',
            'halaman' => 'required|integer',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:5000',
        ]);

        $listBuku = new \App\Models\ListBuku;
        $listBuku->fill($requestData);
        $listBuku->foto = $request->file('foto')->store('cover');

        $listBuku->save();

        // Flash message
        session()->flash('success', 'Buku berhasil ditambahkan!');

        return back();
    }

 

    /**
     * Display the specified resource.
     */
    public function show($id)
    { 
        $listbuku = ListBuku::findOrFail($id); // Ambil data buku berdasarkan ID
        return view('listBuku.detailBuku_show', compact('listbuku'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ListBuku $listBuku)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateListBukuRequest $request, ListBuku $listBuku)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ListBuku $listBuku)
    {
        //
    }
}
