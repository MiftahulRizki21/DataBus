@extends('layouts.UserApp')
@section('content')

<!-- CSS -->
<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f7fc;
        margin: 0;
        padding: 0;
    }

    .form-container {
        width: 80%;
        max-width: 600px;
        margin: 40px auto;
        padding: 20px;
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
        color: rgb(107 114 128 / var(--tw-text-opacity, 1));
        margin-bottom: 30px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        font-size: 14px;
        color: #555;
        margin-bottom: 8px;
        display: block;
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

    .form-input[readonly] {
        background-color: #e9ecef;
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

        .btn-submit {
            padding: 12px;
            font-size: 14px;
        }
    }

    .form-container{
        position: relative;
        top: 0%;
    }

    table {
        width: 100%;
        margin-top: 30px;
        border-collapse: collapse;
    }

    table th, table td {
        padding: 12px;
        text-align: left;
        border: 1px solid #ddd;
    }

    table th {
        background-color: #f2f2f2;
        color: #333;
    }

    table tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .loading {
        text-align: center;
        padding: 20px;
    }

</style>

<!-- Form Profile -->
<form action="#" method="POST" enctype="multipart/form-data" class="form-container">
    @csrf
    <h2>Update Profile</h2>
    <br>
    <div class="form-group">
        <label for="name">Nama Lengkap</label>
        <input type="text" name="name" id="name" class="form-input" placeholder="Masukkan nama lengkap" value="{{ old('name') }}" required>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-input" placeholder="Masukkan email" value="{{ old('email') }}" required>
    </div>

    <div class="form-group">
        <label for="role">Role</label>
        <input type="text" name="role" id="role" class="form-input" value="User" readonly>
    </div>

    <button type="submit" class="btn-submit">Perbarui Profile</button>
</form>

<!-- Table History Pengajuan -->
<div class="form-container">
    <h2>History Pengajuan</h2>
    <table id="historyTable">
        <thead>
            <tr>
                <th>Judul Buku</th>
                <th>Tanggal Pengajuan</th>
                <th>Status</th>
                
            </tr>
        </thead>
        <tbody>
            <!-- Loop untuk menampilkan history pengajuan -->
            {{-- @foreach ($historyPengajuan as $pengajuan)
            <tr>
                <td>{{ $pengajuan->judul_buku }}</td>
                <td>{{ $pengajuan->status }}</td>
                <td>{{ $pengajuan->tanggal_pengajuan }}</td>
            </tr>
            @endforeach --}}
            <tr>
                <td>test</td>
                <td>test</td>
                <td>test</td>
            </tr>
        </tbody>
    </table>
    <div class="loading" id="loadingMore" style="display: none;">Memuat lebih banyak...</div>
</div>

<!-- JS -->
<script>
    let page = 2; // Mulai dari halaman ke-2, karena data pertama sudah dimuat
    const loadingElement = document.getElementById('loadingMore');

    // Fungsi untuk memuat lebih banyak data
    function loadMoreData() {
        // Deteksi apakah sudah mencapai bagian bawah tabel
        if (window.innerHeight + window.scrollY >= document.body.scrollHeight) {
            loadingElement.style.display = 'block'; // Tampilkan indikator loading
            fetch(/history-pengajuan?page=${page})
                .then(response => response.json())
                .then(data => {
                    // Jika ada data, tambahkan ke tabel
                    if (data.length > 0) {
                        let tableBody = document.querySelector('#historyTable tbody');
                        data.forEach(item => {
                            let row = document.createElement('tr');
                            row.innerHTML = 
                                <td>${item.judul_buku}</td>
                                <td>${item.status}</td>
                                <td>${item.tanggal_pengajuan}</td>
                            ;
                            tableBody.appendChild(row);
                        });
                        page++; // Naikkan nomor halaman
                    }
                    loadingElement.style.display = 'none'; // Sembunyikan indikator loading
                })
                .catch(() => {
                    loadingElement.style.display = 'none'; // Sembunyikan indikator loading jika gagal
                });
        }
    }

    // Event listener untuk scroll
    window.addEventListener('scroll', loadMoreData);

    // Fungsi untuk memulai pemuatan data saat halaman pertama kali dibuka
    loadMoreData();
</script>

@endsection