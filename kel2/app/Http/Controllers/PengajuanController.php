<?php

namespace App\Http\Controllers;

use App\Models\pengajuan;
use App\Http\Requests\StorepengajuanRequest;
use App\Http\Requests\UpdatepengajuanRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil data pengguna yang sedang login
        $user = Auth::user();
        
        $pengajuans = Pengajuan::latest()->paginate(10);
        $history = Pengajuan::whereIn('status', ['Revisi', 'Diterima', 'ditolak'])->orderBy('updated_at', 'desc')
        ->get();
        return view('General.user', compact('pengajuans', 'history'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Ambil data pengguna yang sedang login
        $user = Auth::user();

        return view('listBuku.create', compact( 'user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorepengajuanRequest $request)
{
    // Log awal untuk memastikan request diterima
    Log::info('Memulai proses penyimpanan pengajuan...');
    Log::info('Data request diterima:', $request->all());

    // Validasi input
    try {
        $requestData = $request->validate([
            'judul_buku' => 'required',
            'sipnosis' => 'required',
            'nama_penulis' => 'required|string',
            'nama_penerbit' => 'required',
            'tgl_rilis' => 'nullable|date',
            'halaman' => 'required|integer',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:5000',
            'file' => 'required|file|mimes:pdf|max:5000',
            'status' => 'required',
            'ISBN' => 'nullable',
        ]);

        Log::info('Validasi berhasil:', $requestData);
    } catch (\Illuminate\Validation\ValidationException $e) {
        Log::error('Validasi gagal:', $e->errors());
        return redirect()->back()->withErrors($e->errors())->withInput();
    }

    // Menambahkan user_id ke request data
    $requestData['user_id'] = Auth::id();
    Log::info('User ID ditambahkan:', ['user_id' => $requestData['user_id']]);

    // Membuat pengajuan baru
    $pengajuan = new \App\Models\Pengajuan();
    $pengajuan->fill($requestData);

    // Log data sebelum menyimpan
    Log::info('Data yang akan disimpan ke database:', $pengajuan->toArray());

    try {
        // Menyimpan file yang diupload
        $pengajuan->foto = $request->file('foto')->store('cover');
        $pengajuan->file = $request->file('file')->store('uploads');

        Log::info('File berhasil disimpan:', [
            'foto' => $pengajuan->foto,
            'file' => $pengajuan->file,
        ]);

        // Simpan data pengajuan
        $pengajuan->save();
        Log::info('Data pengajuan berhasil disimpan ke database:', $pengajuan->toArray());

        // Flash message
        session()->flash('success', 'Buku berhasil diajukan! Silahkan tunggu notifikasi lanjut...');
    } catch (\Exception $e) {
        Log::error('Gagal menyimpan pengajuan:', ['error' => $e->getMessage()]);
        return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data.')->withInput();
    }

    // Redirect kembali ke halaman sebelumnya
    return redirect()->route('pengajuan.create')->with('success', 'Buku berhasil diajukan! Silahkan tunggu notifikasi lanjut...');
}


public function updatePengajuanStatus(Request $request, $id)
{
    // Validasi data yang dikirim
    $request->validate([
        'status' => 'required|in:Diterima,Revisi,Ditolak',
    ]);

    // Cari pengajuan berdasarkan ID
    $pengajuan = \App\Models\Pengajuan::findOrFail($id);

    // Perbarui status pengajuan
    $pengajuan->status = $request->input('status');
    $pengajuan->save();

    // Jika status diterima, pindahkan ke ListBuku
    if ($pengajuan->status === 'Diterima') {
        // Buat entri baru di ListBuku
        $listBuku = new \App\Models\ListBuku([
            'judul_buku' => $pengajuan->judul, // Sesuaikan nama kolom
            'sipnosis' => $pengajuan->sipnosis,
            'nama_penulis' => $pengajuan->nama_penulis,
            'nama_penerbit' => $pengajuan->nama_penerbit,
            'tgl_rilis' => $pengajuan->tgl_rilis,
            'halaman' => $pengajuan->halaman,
            'foto' => $pengajuan->file_buku, // Asumsikan `file_buku` adalah nama kolom file
            'isbn' => $request->input('isbn'), // Data ISBN dari request
        ]);

        // Simpan data ke tabel ListBuku
        $listBuku->save();
    }

    // Berikan pesan sukses
    session()->flash('success', 'Status pengajuan berhasil diperbarui!');

    return back();
}
    public function indexEditor()
    {
        $pengajuans = Pengajuan::where('status', 'Tidak Diterima')->get();
        $history = Pengajuan::whereIn('status', ['Revisi', 'Diterima'])->get();
        return route('pengajuan.edit', compact('pengajuans', 'history'));
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    { 
        $pengajuan = \App\Models\pengajuan::findOrFail($id); // Ambil data buku berdasarkan ID
        return view('listBuku.detail_buku', compact('pengajuan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pengajuan $pengajuan)
    {
        //
    }

    public function update(Request $request, $id)
    {
        // Validasi status dan file jika statusnya 'Revisi'
        $request->validate([
            'status' => 'required|string',
            'file' => 'nullable|file|mimes:pdf,docx|max:2048', // Validasi file (optional)
        ]);
        // dd($request->all());

        $pengajuan = Pengajuan::findOrFail($id);
    
        // Jika status adalah 'Revisi', lakukan update status menjadi 'Tidak Diterima', hapus alasan editor, dan update file
        if ($request->status === 'Diajukan') {
            // Jika ada file yang diupload, simpan file tersebut
            if ($request->hasFile('file')) {
                // Hapus file lama jika ada
                if ($pengajuan->file) {
                    Storage::disk('public')->delete($pengajuan->file);
                }
                // Simpan file baru di folder uploads dalam storage/public
                $filePath = $request->file('file')->store('uploads', 'public'); // Menyimpan di storage/app/public/uploads
                $pengajuan->file = $filePath; // Simpan path file edit
            }
    
            // Update status menjadi 'Tidak Diterima' dan hapus alasan editor
            $pengajuan->update([
                'status' => 'Diajukan', // Mengubah status menjadi 'Tidak Diterima'
                'Alasan_editor' => null, // Menghapus alasan editor
                'batas_pengeditan' => null, // Menghapus alasan editor
                'editor_id' => null, // Menghapus alasan editor
            ]);
        }else{
            $pengajuan->update([
                'status' => 'Ditolak',
            ]);
        }
    
        return redirect()->route('profile.profile')->with('success', 'Pengajuan berhasil diperbarui!');
    }
    
    public function destroy(pengajuan $pengajuan)
    {
        //
    }
}
