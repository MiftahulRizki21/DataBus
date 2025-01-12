@extends('layout.app') <!-- Menggunakan template layout utama -->

@section('content')
<title>Pengajuan</title>
<link rel="shortcut icon" type="x-icon" href="..\startbootstrap-sb-admin-master\dist\assets\img\logoweb.png">

<div class="container-fluid px-4">
    <h1 class="mt-4">List Buku</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Tambah Buku</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-user-plus me-1"></i>
            Form List Buku
        </div>
        <div class="card-body">
            <form action="{{ route('anggota.store') }}" method="POST" enctype="multipart/form-data">
                @csrf <!-- Token CSRF untuk keamanan -->
                <div class="form-group mt-1 mb-3">
                    <label for="nama">Judul Buku</label>
                    <input type="text" class="form-control @error('judul_buku') is-invalid @enderror" id="judul_buku" name="judul_buku"
                        value="{{ old('judul_buku') }}">
                    <span class="text-danger">{{ $errors->first('judul_buku') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="kelas">Sinopsis</label>
                    <input type="text" class="form-control @error('sinopsis') is-invalid @enderror" id="sinopsis" name="sinopsis"
                        value="{{ old('sinopsis') }}">
                    <span class="text-danger">{{ $errors->first('sinopsis') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="nim">Nama Penulis</label>
                    <input type="text" class="form-control @error('nama_penulis') is-invalid @enderror" id="nama_penulis" name="nama_penulis"
                        value="{{ old('nama_penulis') }}">
                    <span class="text-danger">{{ $errors->first('nama_penulis') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="nim">Nama Penerbit</label>
                    <input type="text" class="form-control @error('nama_penerbit') is-invalid @enderror" id="nama_penerbit" name="nama_penerbit"
                        value="{{ old('nama_penerbit') }}">
                    <span class="text-danger">{{ $errors->first('nama_penerbit') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="nim">Tanggal Rilis</label>
                    <input type="text" class="form-control @error('tgl_rilis') is-invalid @enderror" id="tgl_rilis" name="tgl_rilis"
                        value="{{ old('tgl_rilis') }}">
                    <span class="text-danger">{{ $errors->first('tgl_rilis') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="nim">Halaman</label>
                    <input type="text" class="form-control @error('halaman') is-invalid @enderror" id="halaman" name="halaman"
                        value="{{ old('halaman') }}">
                    <span class="text-danger">{{ $errors->first('halaman') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="foto">Foto Sampul Buku</label>
                    <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto"
                        name="foto" value="{{ old('foto') }}">
                    <span class="text-danger">{{ $errors->first('foto') }}</span>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ url('/anggota') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
