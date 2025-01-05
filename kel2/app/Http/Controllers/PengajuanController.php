<?php

namespace App\Http\Controllers;

use App\Models\pengajuan;
use App\Http\Requests\StorepengajuanRequest;
use App\Http\Requests\UpdatepengajuanRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
        $history = Pengajuan::whereIn('status', ['Revisi', 'Diterima', 'ditolak'])->get();
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
        session()->flash('success', 'Buku berhasil ditambahkan!');
    } catch (\Exception $e) {
        Log::error('Gagal menyimpan pengajuan:', ['error' => $e->getMessage()]);
        return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data.')->withInput();
    }

    // Redirect kembali ke halaman sebelumnya
    return redirect()->route('pengajuan.create')->with('success', 'Buku berhasil ditambahkan!');
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
        $pengajuan= \App\Models\pengajuan::findOrFail($id); // Ambil data buku berdasarkan ID
        return view('listBuku.detail_buku', compact('pengajuan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pengajuan $pengajuan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateEditor(UpdatepengajuanRequest $request, $id)
{
    // Debug: Melihat data request dan ID
    dd($request->all(), $id);

    $request->validate([
        'file' => 'required|file|mimes:pdf,docx|max:2048',
        'status' => 'required|string',
    ]);

    // Cari pengajuan berdasarkan ID
    $pengajuan = Pengajuan::findOrFail($id);

    // Debug: Melihat pengajuan yang ditemukan
    dd($pengajuan);

    // Cek apakah ada file lama, dan hapus jika ada
    if ($pengajuan->file_edit) {
        // Hapus file lama
        $oldFilePath = storage_path('app/public/' . $pengajuan->file_edit);
        Log::info('Mencoba menghapus file lama: ' . $oldFilePath);
        if (file_exists($oldFilePath)) {
            unlink($oldFilePath); // Menghapus file lama
            Log::info('File lama berhasil dihapus.');
        }
    }

    // Simpan file edit jika ada
    if ($request->hasFile('file')) {
        // Debug: Melihat file yang diupload
        dd($request->file('file'));
        
        $filePath = $request->file('file')->store('uploads', 'public');
        $pengajuan->file_edit = $filePath; // Simpan path file edit baru
    }

    // Perbarui status pengajuan
    $pengajuan->status = $request->input('status');

    // Simpan perubahan
    $pengajuan->save();

    // Debug: Menampilkan status yang telah diset
    dd($pengajuan->status);

    // Redirect dengan pesan berhasil
    return redirect()->back()->with('success', 'Pengajuan berhasil diperbarui!');
}





    
    
    public function updateStaff(UpdatepengajuanRequest $request, pengajuan $pengajuan)
    {
         // Validasi file yang diupload jika ada
         $validated = $request->validated();
    
         // Cek apakah ada file yang diupload
         if ($request->hasFile('file')) {
             // Hapus file lama jika ada
             if ($pengajuan->file && file_exists(asset('storage/' . $pengajuan->file))) {
                 unlink(asset('storage/' . $pengajuan->file));
             }
     
             // Simpan file baru dan ambil path-nya
             $path = $request->file('file')->store('uploads/pengajuan', 'public');
             $pengajuan->file = $path; // Update path file di database
         }
     
         // Update alasan editor
         $pengajuan->alasan_editor = $request->input('alasan_staff');
     
         // Simpan perubahan ke database
         $pengajuan->save();
     
         // Redirect atau return response sesuai kebutuhan
         return redirect()->route('staff.dashboard')->with('success', 'Pengajuan berhasil diperbarui');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pengajuan $pengajuan)
    {
        //
    }
}
