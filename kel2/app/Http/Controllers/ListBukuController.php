<?php

namespace App\Http\Controllers;

use App\Models\ListBuku;
use App\Http\Requests\StoreListBukuRequest;
use App\Http\Requests\UpdateListBukuRequest;
use App\Support\Facedes\Storage;

class ListBukuController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listBuku = ListBuku::inRandomOrder()->take(9)->get();        
        return view('general.beranda', compact('listBuku'));
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
        if ($request->wantsJson()) {
            return response()->json($listBuku);
        }
    
        return back()->with('success', 'Buku berhasil ditambahkan!');
    }
    

    /**
     * Display the specified resource.
     */
    public function show($id)
    { 
        $buku = ListBuku::findOrFail($id); // Ambil data buku berdasarkan ID
        return view('listBuku.detail_buku', compact('buku'));
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
