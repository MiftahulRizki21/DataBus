<?php

namespace App\Http\Controllers;

use App\Models\pengajuan;
use App\Http\Requests\StorepengajuanRequest;
use App\Http\Requests\UpdatepengajuanRequest;
use Illuminate\Support\Facades\Log;

class PengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StorepengajuanRequest $request)
    {
        Log::info($request->all());
        $requestData = $request->validate([
            'judul_buku' => 'required',
            'sipnosis' => 'required',
            'nama_penulis' => 'required|string',
            'nama_penerbit' => 'required',
            'tgl_rilis' => 'nullable|date',
            'halaman' => 'required|integer',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:5000',
            'file' => 'required|file|mimes:pdf|max:5000',
            'status'=> 'required',
            'ISBN'=> 'nullable'
        ]);

        $listBuku = new \App\Models\pengajuan;
        $listBuku->fill($requestData);
        $listBuku->foto = $request->file('foto')->store('cover');
        $listBuku->file = $request->file('file')->store('uploads', 'public');


        $listBuku->save();

        // Flash message
        session()->flash('success', 'Buku berhasil ditambahkan!');

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(pengajuan $pengajuan)
    {
        //
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
    public function updateEditor(UpdatepengajuanRequest $request, pengajuan $pengajuan)
    {
        // Validasi file yang diupload jika ada
        $validated = $request->validated();
    
        // Cek apakah ada file yang diupload
        if ($request->hasFile('file')) {
            // Hapus file lama jika ada
            if ($pengajuan->file && file_exists(storage_path('app/public/' . $pengajuan->file))) {
                unlink(storage_path('app/public/' . $pengajuan->file));
            }
    
            // Simpan file baru dan ambil path-nya
            $path = $request->file('file')->store('uploads/pengajuan', 'public');
            $pengajuan->file = $path; // Update path file di database
        }
    
        // Update alasan editor
        $pengajuan->alasan_editor = $request->input('alasan_editor');
    
        // Simpan perubahan ke database
        $pengajuan->save();
    
        // Redirect atau return response sesuai kebutuhan
        return redirect()->route('pengajuan.index')->with('success', 'Pengajuan berhasil diperbarui');
    }
    
    public function updateStaff(UpdatepengajuanRequest $request, pengajuan $pengajuan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pengajuan $pengajuan)
    {
        //
    }
}
