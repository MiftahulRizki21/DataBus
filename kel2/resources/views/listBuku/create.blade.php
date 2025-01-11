@extends('layouts.UserApp')

@section('title', 'Pengajuan Buku')

@section('content')
<style>
    #form-pengajuan {
        max-width: 800px;
        margin: 40px auto;
        padding: 20px;
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    #form-pengajuan h2 {
        text-align: center;
        margin-bottom: 30px;
        color: #6b7280;
    }

    .form-row {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 20px;
    }

    .form-group {
        flex: 1;
    }

    .form-group label {
        font-size: 14px;
        margin-bottom: 8px;
        display: block;
    }

    .form-input {
        width: 100%;
        padding: 12px;
        font-size: 16px;
        border: 1px solid #ddd;
        border-radius: 4px;
        background-color: #f9f9f9;
    }

    .form-input:focus {
        outline: none;
        border-color: #0056b3;
        background-color: white;
    }

    .btn-submit {
        width: 100%;
        padding: 14px;
        font-size: 16px;
        background-color: #002855;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .btn-submit:hover {
        background-color: #004c99;
    }
</style>

<div id="form-pengajuan">
    @if(session()->has('success'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        </script>
    @elseif(session()->has('error'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                title: 'Gagal!',
                text: '{{ session('error') }}',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        </script>
    @endif

    <h2>Form Pengajuan Buku</h2>
    <form action="{{ route('pengajuan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-row">
            <div class="form-group">
                <label for="judul_buku">Judul Buku</label>
                <input type="text" name="judul_buku" id="judul_buku" class="form-input" placeholder="Masukkan judul buku" required>
            </div>
            <div class="form-group">
                <label for="sipnosis">Sipnosis</label>
                <input type="text" name="sipnosis" id="sipnosis" class="form-input" placeholder="Masukkan sipnosis" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="nama_penulis">Nama Penulis</label>
                <input type="text" name="nama_penulis" id="nama_penulis" class="form-input" placeholder="Masukkan nama penulis" required>
            </div>
            <div class="form-group">
                <label for="nama_penerbit">Nama Penerbit</label>
                <input type="text" name="nama_penerbit" id="nama_penerbit" class="form-input" value="Politeknik Caltex Riau" readonly>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="tgl_rilis">Tanggal Rilis</label>
                <input type="date" name="tgl_rilis" id="tgl_rilis" class="form-input" required>
            </div>
            <div class="form-group">
                <label for="halaman">Jumlah Halaman</label>
                <input type="number" name="halaman" id="halaman" class="form-input" placeholder="Masukkan jumlah halaman" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="foto">Foto Cover Buku "Maksimal 5MB"</label>
                <input type="file" name="foto" id="foto" class="form-input" required>
            </div>
            <div class="form-group">
                <label for="file">File Isi Buku "PDF"</label>
                <input type="file" name="file" id="file" class="form-input" required>
            </div>
        </div>

        <input type="hidden" name="status" value="Tidak Diterima">
        <input type="hidden" name="ISBN" value="">
        <button type="submit" class="btn-submit">Submit</button>
    </form>
</div>
@endsection
