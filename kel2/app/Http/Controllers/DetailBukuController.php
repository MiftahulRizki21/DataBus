<?php

namespace App\Http\Controllers;

use App\Models\DetailBuku;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateDetailBukuRequest;
use Illuminate\Support\Facades\Auth;

class DetailBukuController extends Controller
{
    public function index()
        {
        $detailBuku = DetailBuku::latest()->paginate(10);
        return view('listBuku.detail_buku', $detailBuku);
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(DetailBuku $id)
    {
        $user = Auth::user();
        $detailBuku = DetailBuku::findOrFail($id);

        // Kirim data detail buku ke view
        return view('listBuku.detailBuku_show', compact('detailBuku', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DetailBuku $detailBuku)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( $request, DetailBuku $id)
    {
        $requestData = $request->validate([
            'judul_buku' => 'required|string|max:255',
            'sinopsis' => 'required|string|max:255',
            'nama_penulis' => 'required|string|max:255',
            'nama_penerbit' => 'required|string|max:255',
            'tgl_rilis' => 'required|date',
            'halaman' => 'required|string|max:255',
            'foto' => 'image|mimes:jpeg,png,jpg|max:5000',
            'editor' => 'required|string|max:255',
            'media' => 'required|string|max:255',
            'isbn' => 'required|string|max:255'
        ]);
        $detailBuku = \App\Models\ListBuku::findOrFail($id);
        $detailBuku->fill($requestData);
        $detailBuku->foto = $request->file('foto')->store('images', 'public');
        $detailBuku->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DetailBuku $detailBuku)
    {
        //
    }
}
