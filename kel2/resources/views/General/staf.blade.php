@extends('layouts.UserApp')
@section('content')
    <style>
        .table-container {
            margin: 20px auto;
            max-width: 90%;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            animation: fadeIn 1s ease-in-out;
            height: 300px; /* Set a fixed height for the scrollable table */
            overflow-y: scroll; /* Make the table scrollable */
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
        }

        .table thead {
            background-color: #002855;
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

        /* Other styles remain the same */

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

        h1 {
            text-align: center;
            font-size: 36px;
            font-weight: bold;
            color: #002855;
            background-color: #f0f8ff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-transform: uppercase;
            margin-top: 290px;
            width: 86%;
        }

        h5 {
            color: #002855;
            margin-left: 60px;
        }

        /* Scrollable History Table Styles */
        .history-table-container {
            margin-top: 30px;
            max-width: 90%;
            height: 200px;
            overflow-y: scroll;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .history-table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
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
            border-radius: 4px;
            cursor: pointer;
            transition: transform 0.3s;
        }

        .download:hover {
            background-color: RoyalBlue;
        }
    </style>

    <center><h1>Halaman Staff</h1></center>
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
                        <th>Alasan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pengajuans as $data)
                    @if ($data->status === 'Diterima' && $data->ISBN === null)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->judul_buku }}</td>
                        <td>
                            <a href="{{ asset('storage/' . $data->file) }}" target="_blank" class="download">Download File</a>
                        </td>
                        <td>
                            <a href="/staff/buku/{{ $data->id }}">
                                <button type="button" class="btn btn-primary">Detail Buku</button>
                            </a>
                        </td>
                        <td>
                            <textarea name="alasan" form="rejectForm{{ $data->id }}" placeholder="Masukkan alasan..." rows="3"></textarea>
                        </td>
                        <td>
                            <!-- Action Buttons -->
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#acceptModal{{ $data->id }}">
                                Terima
                            </button>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#rejectModal{{ $data->id }}">
                                Tolak
                            </button>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>


        <h5>Table History</h5>
        <center>
            <div class="history-table-container">
                <table class="history-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($history as $data)
                            @if ($data->status === 'Ditolak' || $data->ISBN != null)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->judul_buku }}</td>
                                    <td>{{ $data->status }}</td>
                                    <td>{{ $data->updated_at }}</td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </center>
    </div>
@endsection

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
