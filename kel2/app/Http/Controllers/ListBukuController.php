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
        $listBuku = ListBuku::latest()->paginate(10);
        return view('listBuku.list_buku', compact('listBuku'));
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
    public function store(StoreListBukuRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ListBuku $listBuku)
    {
        //
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
