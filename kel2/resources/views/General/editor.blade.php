@extends('layouts.UserApp')
@section('content')
    <title>Beranda | Editor</title>
    <style>
        .table-container {
            margin: 20px auto;
            max-width: 90%;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            animation: fadeIn 1s ease-in-out;
            height: 358px; /* Tentukan tinggi maksimum untuk scroll */
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            overflow: hidden;
        }

        .table thead {
            background-color: #002855;
            /* Sesuaikan warna header tabel dengan navbar */
            color: white;
            text-align: left;
        }

        .table thead th {
            padding: 12px 15px;
            font-size: 16px;
            font-weight: bold;
        }

        .table tbody tr {
            border-bottom: 1px solid #ddd;
            transition: background-color 0.3s;
        }

        .table tbody tr:hover {
            background-color: #f0f8ff;
        }

        .table tbody td {
            padding: 12px 15px;
            text-align: left;
        }

        .btn {
            padding: 8px 12px;
            font-size: 14px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: transform 0.3s;
        }

        .btn:hover {
            transform: scale(1.1);
        }

        .btn-primary {
            background-color: #002855;
            /* Sesuaikan dengan warna navbar */
            color: white;
        }

        .btn-success {
            background-color: #198754;
            color: white;
        }

        .btn-danger {
            background-color: #c82333;
            color: white;
        }

        textarea {
            width: 100%;
            padding: 8px;
            font-size: 14px;
            border: 1px solid #ddd;
            border-radius: 4px;
            resize: vertical;
        }

        .pagination {
            display: flex;
            justify-content: center;
            padding: 20px 0;
        }

        .pagination .page-item.active .page-link {
            background-color: #002855;
            border-color: #002855;
            color: white;
        }

        .pagination .page-link {
            color: #002855;
            background-color: white;
            border: 1px solid #ddd;
            padding: 8px 12px;
            margin: 0 5px;
            border-radius: 4px;
        }

        .pagination .page-link:hover {
            background-color: #f0f8ff;
            border-color: #ddd;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .container-fluid {
            position: relative;
            top: 140px;
        }

        /* Gaya untuk judul h1 */
        h1 {
            text-align: center;
            font-size: 36px;
            font-weight: bold;
            color: #002855;
            background-color: #f0f8ff;
            /* Latar belakang yang lebih terang */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-transform: uppercase;
            /* Huruf kapital semua untuk efek profesional */
            margin-top: 290px;
            width: 86%;
        }

        h5 {
            color: #002855;
            margin-left: 60px;
        }

        .history-table-container {
            margin-top: 10px;
            max-width: 90%;
            height: 270px;
            /* Lebih pendek dari tabel pengajuan */
            /* Mengaktifkan scroll vertikal */
            border-radius: 10px; /* Memberikan border radius pada container tabel */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden; /* Menjaga agar border-radius terlihat pada scroll */
        }

        .history-table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            border-radius: 10px; /* Tambahkan border-radius pada tabel */
            overflow: hidden; /* Pastikan efek border-radius terlihat */
        }


        .history-table thead {
            background-color: #002855;
            color: white;
            text-align: left;
            
        }

        .history-table thead th {
            padding: 12px 15px;
            font-size: 16px;
            font-weight: bold;
        }

        .history-table tbody td {
            padding: 12px 15px;
            text-align: left;
        }

        .download {
            background-color: DodgerBlue;
            border: none;
            color: white;
            padding: 8px 12px;
            font-size: 14px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: transform 0.3s;
        }

        /* Darker background on mouse-over */
        .download:hover {
            background-color: RoyalBlue;
        }
    </style>

    <!-- Judul Halaman Editor -->
    <center>
        <h1>Halaman Editor</h1>
    </center>
    <div class="container-fluid">
        <h5>Table Pengajuan</h5>
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>File Buku</th>
                        <th>Detail Buku</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pengajuans as $data)
                        @if ($data->editor_id == Auth::user()->id)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <!-- Kolom untuk unggah file -->
                                {{-- <td>
                            <form action="{{ route('editor.pengajuan.accept', $data->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <input type="file" name="file_edit" id="file_edit" class="form-input" required>
                                </div>
                            </form>
                        </td> --}}
                                <td>
                                    <p>{{ $data->judul_buku }}</p>
                                </td>
                                <td>
                                    <a href="{{ asset('storage/' . $data->file) }}" target="_blank" class="download">Download
                                        File</a>
                                </td>

                                <!-- Tombol detail -->
                                <td>
                                    <a href="/editor/buku/{{ $data->id }}">
                                        <button type="button" class="btn btn-primary">Detail Buku</button>
                                    </a>
                                </td>

                                <!-- Tombol aksi -->
                                <td>
                                    <!-- Form Terima -->
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                        data-bs-target="#acceptModal{{ $data->id }}">
                                        Terima
                                    </button>
                                    <div class="modal fade" id="acceptModal{{ $data->id }}" tabindex="-1"
                                        aria-labelledby="acceptModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form action="{{ route('pengajuan.update', $data->id) }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="acceptModalLabel">Masukkan File yang
                                                            diedit</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <input type="hidden" name="status" value="diterima">
                                                        <div class="form-group">
                                                            <label for="file">{{ $data->file }}</label>
                                                            <input type="file" name="file" class="form-control"
                                                                placeholder="File buku" required>
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-success">Terima</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Form Tolak dengan Modal -->
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#rejectModal{{ $data->id }}">
                                        Revisi
                                    </button>

                                    <!-- Modal Revisi -->
                                    <div class="modal fade" id="rejectModal{{ $data->id }}" tabindex="-1"
                                        aria-labelledby="rejectModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form action="{{ route('pengajuan.update', $data->id) }}"
                                                    enctype="multipart/form-data" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="rejectModalLabel">Masukkan Alasan Revisi
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <input type="hidden" name="status" value="Revisi">
                                                        <div class="form-group">
                                                            <textarea name="Alasan_editor" class="form-control" placeholder="Masukkan alasan..." required></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-danger">Kirim Revisi</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Tabel History -->
        <h5 style="margin-top: 100px;">Table History</h5>
        <center>
            <div class="history-table-container " >
                <table class="history-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    @foreach ($history as $data)
                        <tr>
                            <td>
                                {{ $loop->iteration }}
                            </td>
                            <td>
                                {{ $data->judul_buku }}
                            </td>
                            <td>
                                {{ $data->status }}
                            </td>
                            <td>
                                {{ $data->updated_at }}
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </center>
    </div>
@endsection

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
