@extends('layouts.UserApp')
@section('content')
<title>Profile | History</title>
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
    .logout-container {
        position: fixed;
        top: 80px;
        right: 35px;
        z-index: 9999;
    }

    .btn-logout {
        background-color: #dc3545;
        color: white;
        padding: 10px 20px;
        font-size: 14px;
        font-weight: bold;
        border: none;
        border-radius: 4px;
        text-decoration: none;
        text-align: center;
        cursor: pointer;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: background-color 0.3s, transform 0.2s;
    }

    .btn-logout:hover {
        background-color: #c82333;
        color: rgb(231, 227, 227);
        transform: scale(1.05);
    }
    .history-table-container {
        overflow-y: scroll; /* Aktifkan scroll pada tabel */
        width: 80%;
        max-width: 600px;
        margin: 40px auto;
        padding: 20px;
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        height: 400px;
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

    .history-table tbody tr {
        border-bottom: 1px solid #ddd;
        transition: background-color 0.3s;
    }

    .history-table tbody tr:hover {
        background-color: #f0f8ff;
    }


</style>
<div class="logout-container">
    <a href="/logout" onclick="confirmLogout(event)" class="btn-logout">Logout</a>
</div>

@if(session('success'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.fire({
            title: 'Berhasil!',
            text: '{{ session('success') }}',
            icon: 'success',
            confirmButtonText: 'OK'
        });
    </script>
@endif

<!-- Form Profile -->
    <form action="{{ route('profile.update', $user->id) }}" method="POST"enctype="multipart/form-data" class="form-container">
        @csrf
        @method('PUT')  <!-- Simulate PUT request for update -->
    <h2>Update Profile</h2>
    <br>
    <div class="form-group">
        <label for="name">Nama Lengkap</label>
        <input type="text" name="name" id="name" class="form-input" value="{{ $user -> name}}" required>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-input" value="{{ $user -> email}}"  required>
    </div>

    <div class="form-group">
        <label for="role">Role</label>
        <input type="text" name="role" id="role" class="form-input" placeholder="{{ $user -> role}}" readonly>
    </div>

    <button type="submit" class="btn-submit">Perbarui Profile</button>
</form>

<div class="history-table-container">
    <h2>History Pengajuan</h2>
    <table class="history-table">
        <thead>
            <tr>
                <th>Judul Buku</th>
                <th>Tanggal Pengubahan Status</th>
                <th>Status</th>
                <th>Alasan Editor</th>
                <th>Alasan Staff</th>
                @if (Auth::user()->role === 'user')
                    <th>Aksi</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($history as $data)
                <tr>
                    <td>{{ $data->judul_buku }}</td>
                    <td>{{ $data->updated_at }}</td>
                    <td>{{ $data->status }}</td>
                    <td>{{ $data->Alasan_editor }}</td>
                    <td>{{ $data->Alasan_staff }}</td>
                    @if (Auth::user()->role === 'user')
                    <td>
                        @if ($data->status === 'Revisi')
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#rejectModal{{ $data->id }}">
                                Update
                            </button>                                
                            <div class="modal fade" id="rejectModal{{ $data->id }}" tabindex="-1"
                                    aria-labelledby="rejectModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="{{ route('pengajuan.user.edit', $data->id) }}"
                                                enctype="multipart/form-data" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="rejectModalLabel">Masukkan File Revisi
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" name="status" value="Diajukan">
                                                    <div class="form-group">
                                                        <label for="file">{{ $data->file }}</label>
                                                        <input type="file" name="file" class="form-control"
                                                            placeholder="File buku" required>
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
                            </form>
                        @else
                            <span class="text-muted">Tidak Ada Aksi</span>
                        @endif
                    </td>
                @endif
                
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection