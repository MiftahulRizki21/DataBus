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
            flex-direction: column;
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
            margin-top: 20px;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeIn 1s forwards;
        }

        .book-detail img {
            max-width: 280px;
            height: auto;
            border-radius: 5px;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeIn 1s forwards 0.3s;
        }

        .book-title {
            text-align: center;
            font-size: 1.3rem;
            font-weight: bold;
            margin-bottom: 10px;
            opacity: 0;
            animation: fadeIn 1s forwards 0.6s;
        }

        .synopsis {
            text-align: center;
            margin-bottom: 20px;
            opacity: 0;
            animation: fadeIn 1s forwards 0.9s;
        }

        .book-info {
            width: 550px;
            margin-top: 20px;
            opacity: 0;
            animation: fadeIn 1s forwards 1.2s;
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

        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>

    <!-- Book Details -->
    <div class="book-detail">
        <h3 class="text-primary text-center">DETAIL BUKU</h3>
        <img src="https://isbn.lib.pcr.ac.id/storage/8klUDqCN2ajXuYzyLHrL7hBR7pM3W1-metaQ292ZXIgWW9hbmRhIEVtYmVkZGVkLmpwZw==-.jpg"
            alt="Panduan Implementasi Dasar Sistem Embedded berbasis ATMega8535 dan Arduino Uno">
        <div class="book-title">
            Panduan Implementasi Dasar Sistem Embedded berbasis ATMega8535 dan Arduino Uno
        </div>
        <div class="synopsis">
            <h5 class="text-success">Sinopsis:</h5>
            <p>
                Saya menyambut baik penerbitan bahan ajar kuliah ini yang khusus dipakai untuk mahasiswa Politeknik Caltex Riau
                dengan tujuan untuk memudahkan kegiatan belajar mengajar di Politeknik ini. Penerbitan bahan ajar ini merupakan
                salah satu wujud nyata tekad Politeknik Caltex Riau dalam usaha mencerdaskan anak bangsa.
            </p>
        </div>
        <div class="book-info">
            <h5 class="text-success">Informasi Buku:</h5>
            <table class="table">
                <tr>
                    <th>Penulis :</th>
                    <td>Yoanda Alim Syahbana, Egal Hendriyanto</td>
                </tr>
                <tr>
                    <th>Penerbit : </th>
                    <td>PCR</td>
                </tr>
                <tr>
                    <th>Release : </th>
                    <td>2023-05-02</td>
                </tr>
                <tr>
                    <th>Halaman : </th>
                    <td>47</td>
                </tr>
                <tr>
                    <th>Editor : </th>
                    <td>Tianur</td>
                </tr>
                <tr>
                    <th>Media : </th>
                    <td>Buku</td>
                </tr>
                <tr>
                    <th>ISBN : </th>
                    <td>978-979-97179-6-2</td>
                </tr>
                <tr>
                    <th>KDT : </th>
                    <td>Tidak tersedia</td>
                </tr>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
