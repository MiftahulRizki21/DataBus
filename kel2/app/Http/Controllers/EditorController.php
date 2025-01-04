<?php

namespace App\Http\Controllers;

use App\Models\editor;
use App\Http\Requests\StoreeditorRequest;
use App\Http\Requests\UpdateeditorRequest;

class EditorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('general.editor');
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
    public function store(StoreeditorRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(editor $editor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(editor $editor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateeditorRequest $request, editor $editor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(editor $editor)
    {
        //
    }
}
