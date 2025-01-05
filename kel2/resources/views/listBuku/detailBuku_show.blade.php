<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Buku</title>
    <style>
        body {
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .book-detail {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 20px;
            max-width: 700px;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
        }

        .book-detail img {
            max-width: 280px;
            height: auto;
            border-radius: 5px;
        }

        .book-title {
            text-align: center;
            font-size: 1.3rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .synopsis {
            text-align: center;
            margin-bottom: 20px;
        }

        .book-info {
            width: 550px;
            margin-top: 20px;
        }

        .book-info table {
            width: 100%;
        }

        .book-info th {
            width: 30%;
            padding-right: 10px;
            text-align: left;
        }

        .text-success {
            font-size: 1.2rem;
        }
    </style>
</head>

<body>
    <div class="book-detail">
        <h3 class="text-primary text-center">DETAIL BUKU</h3>

        <!-- Menampilkan gambar cover buku -->
        <img src="{{ asset('storage/'.$detailBuku->foto) }}" alt="{{ $detailBuku->judul_buku }}">

        <!-- Menampilkan judul buku -->
        <div class="book-title">
            {{ $detailBuku->judul_buku}}
        </div>

        <!-- Menampilkan sinopsis buku -->
        <div class="synopsis">
            <h5 class="text-success">Sinopsis:</h5>
            <p>
                {{ $detailBuku->sinopsis }}
            </p>
        </div>

        <!-- Menampilkan informasi buku -->
        <div class="book-info">
            <h5 class="text-success">Informasi Buku:</h5>
            <table class="table">
                <tr>
                    <th>Penulis :</th>
                    <td>{{ $detailBuku->nama_penulis }}</td>
                </tr>
                <tr>
                    <th>Penerbit : </th>
                    <td>{{ $detailBuku->nama_penerbit }}</td>
                </tr>
                <tr>
                    <th>Release : </th>
                    <td>{{ $detailBuku->tgl_rilis }}</td>
                </tr>
                <tr>
                    <th>Halaman : </th>
                    <td>{{ $detailBuku->halaman }}</td>
                </tr>
                <tr>
                    <th>Editor : </th>
                    <td>{{ $detailBuku->editor->name }}</td>
                </tr>
                <tr>
                    <th>ISBN : </th>
                    <td>{{ $detailBuku->ISBN }}</td>
                </tr>

            </table>
        </div>
    </div>
</body>

</html>
