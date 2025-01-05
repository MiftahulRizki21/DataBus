@extends('layouts.app')
@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Buku</title>
    <style>
        b{
            color: black;
        }
        body {
            background-color: #f8f9fa;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
        }

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
            }

        .card {
            display: flex;
            flex-direction: row;
            align-items: center;
            margin: 25px;
            padding: 20px;
            width: 100%;
            min-height: 400px;
            max-width: 500px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.18);
            transition: 0.3s;
            height: 100%;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.6s forwards;
            animation-delay: calc(var(--index) * 0.1s);
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.33);
        }

        .card img {
            min-height: 100px;
            max-width: 150px;
            height: auto;
            border-radius: 5px;
            transition: transform 0.3s;
        }

        .card:hover img {
            transform: scale(1.05);
        }

        .col-md-6 {
            margin-bottom: 30px;
        }

        .book-info {
            padding-left: 20px;
            flex: 1;
        }

        .book-info h4 {
            font-size: 1.2rem;
            font-weight: bold;
        }

        .book-info table {
            width: 100%;
        }

        .book-info td {
            font-size: 0.9rem;
            padding: 5px 0;
        }

        .book-info a {
            text-decoration: none;
            color: #0d6efd;
        }

        .book-info a:hover {
            text-decoration: underline;
        }

        .container{
            position: relative;
            top: 950px;
        }

        /* Fade-in and Slide-up animation */
        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
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

    <div class="container" style="margin-top: 200px;">
        <center><h1 >List Buku</h1></center>
        <div class="row" style="margin-top: 150px;">
            @foreach ($listBuku as $listbuku )
            <div class="col-md-6">
                <div class="card">
                    <img src="{{ asset('storage/'. $listbuku->foto) }}" alt="{{ $listbuku->judul_buku }}">
                    
                    <div class="book-info">
                        <center><h4>{{ $listbuku->judul_buku }}</h4>
                        <table>
                            <tr>
                                <td><b>Penulis:</b> {{ $listbuku->nama_penulis }}</td>
                            </tr>
                            <tr>
                                <td><b>Penerbit:</b> {{ $listbuku->nama_penerbit }}</td>
                            </tr>
                            <tr>
                                <td><b>Release:</b>{{ $listbuku->tgl_rilis }}</td>
                            </tr>
                            <tr>
                                <td><b>Hal:</b> {{ $listbuku->halaman }}</td>
                            </tr>
                        </table>
                        <a href="/detail_buku/{{ $listbuku->id }}">Detail</a>
                    </div></center>
                </div>

            </div>
            @endforeach

            

                <div class="pagination">
                    {{ $listBuku->links('pagination::bootstrap-5') }}
                </div>
                


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
