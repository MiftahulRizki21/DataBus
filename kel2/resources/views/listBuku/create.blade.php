@extends('layouts.UserApp')
@section('content')
<link rel="shortcut icon" type="x-icon" href="..\startbootstrap-sb-admin-master\dist\assets\img\logoweb.png">

<title>Pengajuan | User</title>
<!-- CSS -->
<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f7fc;
        margin: 0;
        padding: 0;
        overflow-x: hidden; /* Mencegah scroll horizontal */
    }

    .form-container {
        width: 100%;
        max-width: 800px;
        margin: 40px auto;
        padding: 20px;
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        margin-top: 200px;
    }

    h2 {
        text-align: center;
        margin-bottom: 30px;
        color: rgb(107 114 128 / var(--tw-text-opacity, 1));
    }

    .form-row {
        display: flex;
        gap: 10px; /* Jarak horizontal antar elemen */
        margin-bottom: 20px; /* Jarak vertikal antar baris */
    }

    .form-group {
        flex: 1; /* Membuat elemen di sisi kiri dan kanan memiliki ukuran yang sama */
    }

    .form-group label {
        font-size: 14px;
        color: #555;
        margin-bottom: 8px;
    }

    .form-input {
        width: 100%;
        padding: 12px;
        font-size: 16px;
        border: 1px solid #ddd;
        border-radius: 4px;
        margin-top: 5px;
        background-color: #f9f9f9;
        color: #555;
    }

    .form-input:focus {
        outline: none;
        border-color: #0056b3;
        background-color: #fff;
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
        transition: background-color 0.3s;
    }

    .btn-submit:hover {
        background-color: #004c99;
    }

    @media (max-width: 768px) {
        .form-container {
            width: 90%;
        }

        .form-row {
            flex-direction: column;
        }

        .btn-submit {
            padding: 12px;
            font-size: 14px;
        }
    }

    .form-container {
        position: relative;
        top: 25%;
    }
</style>

<form action="{{ route('pengajuan.store') }}" method="POST" enctype="multipart/form-data" class="form-container">
    @csrf
    <h2>Form Pengajuan Buku</h2>
    <br>
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
            <input type="text" name="nama_penerbit" id="nama_penerbit" class="form-input" placeholder="Masukkan nama penerbit" required>
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
            <label for="foto">Foto Buku "Maksimal 5MB"</label>
            <input type="file" name="foto" id="foto" class="form-input" required>
        </div>
        <div class="form-group">
            <label for="file">File Buku "Pdf"</label>
            <input type="file" name="file" id="file" class="form-input" required>
        </div>
    </div>

    <input type="hidden" name="status" value="Diajukan">
    <input type="hidden" name="ISBN" value=''>

    <button type="submit" class="btn-submit">Submit</button>
</form>
