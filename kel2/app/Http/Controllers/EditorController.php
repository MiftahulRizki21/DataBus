<?php

namespace App\Http\Controllers;

use App\Models\editor;
use App\Http\Requests\StoreeditorRequest;
use App\Http\Requests\UpdateeditorRequest;
use App\Models\pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;


class EditorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengajuans = Pengajuan::where('status', 'Sedang Direview')
            ->orderBy('created_at', 'desc')
            ->paginate(5);
        $penugasan = pengajuan::where('status', 'Diajukan')
        ->orderBy('created_at', 'desc')
        ->paginate(5);
        $history = Pengajuan::whereIn('status', ['Revisi', 'Diterima', 'Selesai Revisi'])
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        return view('general.editor', compact('pengajuans', 'history', 'penugasan'));
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
        // Validasi status dan file jika statusnya 'Revisi'
        $request->validate([
            'status' => 'required|string',
            'file' => 'nullable|file|mimes:pdf,docx|max:2048', // Validasi file (optional)
            'Alasan_editor' => 'nullable|string',
        ]);

        $pengajuan = Pengajuan::findOrFail($id);

        // Jika status ditolak atau perlu revisi
        if ($request->status == 'Revisi') {
            // Pastikan alasan editor ada
            if (!$request->has('Alasan_editor')) {
                return redirect()->back()->with('error', 'Alasan editor diperlukan.');
            }

            // Debugging: cek apakah file ada di request
            // dd('File ada di request:', $request->hasFile('file'));

            // Jika ada file yang diupload, simpan file tersebut
            if ($request->hasFile('file')) {
                // Hapus file lama jika ada
                if ($pengajuan->file) {
                    Storage::disk('public')->delete($pengajuan->file);
                }
                // Simpan file baru di folder uploads dalam storage/public
                $filePath = $request->file('file')->store('uploads', 'public'); // Menyimpan di storage/app/public/uploads
                $pengajuan->file = $filePath; // Simpan path file edit

                // Debugging: cek path file yang berhasil disimpan
            }

            // Update status revisi dan alasan editor
            $pengajuan->update([
                'status' => 'Revisi',
                'Alasan_editor' => $request->Alasan_editor,
                'editor_id' => Auth::id(),
            ]);
        } else {
            // Jika diterima, update status menjadi diterima
            $pengajuan->update([
                'status' => 'Selesai Revisi',
                'editor_id' => Auth::id(),
            ]);

            // Jika ada file yang diupload, simpan file tersebut
            if ($request->hasFile('file')) {
                // Hapus file lama jika ada
                if ($pengajuan->file) {
                    Storage::disk('public')->delete($pengajuan->file);
                }
                // Simpan file baru di folder uploads dalam storage/public
                $filePath = $request->file('file')->store('uploads', 'public'); // Menyimpan di storage/app/public/uploads
                $pengajuan->file = $filePath; // Simpan path file edit
                $pengajuan->save(); // Simpan perubahan file

                // Debugging: cek path file yang berhasil disimpan
            }
        }

        return redirect()->route('editor.dashboard')->with('success', 'Pengajuan berhasil diperbarui!');
    }

    public function TerimaTugas($id, Request $request) {
        $pengajuan = pengajuan::findOrFail($id);
        $pengajuan->update([
            'status' => 'Sedang Direview'
        ]);
        return redirect()->route('editor.dashboard')->with('success', 'Pengajuan berhasil diperbarui!');
    }

    public function TolakTugas($id, Request $request) {
        $pengajuan = pengajuan::findOrFail($id);
        $pengajuan->update([
            'editor_id' => Null,
            'batas_pengeditan' => Null
        ]);
        return redirect()->route('editor.dashboard')->with('success', 'Pengajuan berhasil diperbarui!');

    }

    public function destroy(editor $editor)
    {
        //
    }
}
