<?php

namespace App\Http\Controllers;

use App\Models\DetailBuku;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDetailBukuRequest;
use App\Http\Requests\UpdateDetailBukuRequest;

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
    public function store(StoreDetailBukuRequest $request)
    {
        $requestData = $request->validate([
            'judul_buku' => 'required|string|max:255',
            'sipnosis' => 'required|string|max:255',
            'nama_penulis' => 'required|string|max:255',
            'nama_penerbit' => 'required|string|max:255',
            'tgl_rilis' => 'required|string|max:255',
            'halaman' => 'required|string|max:255',
            'foto' => 'required|image|mimes:png,jpg,jpeg',
            'editor' => 'required|string|max:255',
            'media' => 'required|string|max:255',
            'isbn' => 'required|string|max:255',
        ]);

        // Simpan data ke database
        $listBuku = new DetailBuku();
        $listBuku->fill($requestData);
        $listBuku->foto = $request->file('foto')->store('images', 'public');
        $listBuku->save();

        // Redirect ke halaman List Buku dengan pesan sukses
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(DetailBuku $detailBuku)
    {
        //
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
    public function update(UpdateDetailBukuRequest $request, DetailBuku $detailBuku)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DetailBuku $detailBuku)
    {
        //
    }
}
