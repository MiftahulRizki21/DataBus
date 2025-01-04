<?php

namespace App\Http\Controllers;

use App\Models\editor;
use App\Http\Requests\StoreeditorRequest;
use App\Http\Requests\UpdateeditorRequest;
use App\Models\pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EditorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengajuans = Pengajuan::where('status', 'Tidak Diterima')->get();
        return view('general.editor', compact('pengajuans'));
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
    public function edit($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        return view('editor.edit', compact('pengajuan'));
    }

    public function update(Request $request, $id)
    {
        $pengajuan = Pengajuan::findOrFail($id);

        // Jika status ditolak, masukkan alasan
        if ($request->status == 'Revisi') {
            $pengajuan->update([
                'status' => 'Revisi',
                'alasan' => $request->alasan,
                'editor_id' => Auth::id(),
            ]);
        } else {
            // Jika diterima, status diubah menjadi diterima dan dikirim ke staff
            $pengajuan->update([
                'status' => 'diterima',
                'editor_id' => Auth::id(),
            ]);
        }

        return redirect()->route('editor.dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(editor $editor)
    {
        //
    }
}
