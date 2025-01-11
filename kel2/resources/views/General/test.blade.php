@extends('layouts.UserApp')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
<title>Pendaftar Editor</title>
    <style>
        .table-container {
            margin: 20px auto;
            max-width: 90%;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            animation: fadeIn 1s ease-in-out;
            height: 360px; /* Set a fixed height for the scrollable table */
            position: relative;
            top: 120px;
            width: 1200px;
        }

        .table {
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
            position: relative;
            top: 80px;
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
    </style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<h1>Table Pendaftar Editor</h1>
<div class="table-container">
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Password</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pendaftar as $pendaftars)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pendaftars->name }}</td>
                    <td>{{ $pendaftars->email }}</td>
                    <td>{{ $pendaftars->role }}</td>
                    <td>{{ $pendaftars->password }}</td>
                    <td>
                        <a href="{{ route('approve', $pendaftars->id) }}" class="btn btn-success">Setujui</a>
                        <a href="{{ route('reject', $pendaftars->id) }}" class="btn btn-danger">Tolak</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="pagination">
        {{ $pendaftar->links('pagination::bootstrap-5') }}
    </div>
</div>


<script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</script>

