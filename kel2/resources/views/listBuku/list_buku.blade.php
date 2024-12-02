<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Buku</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            /* Warna latar belakang */
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
        }

        h1 {
            margin-bottom: 30px;
            font-size: 2rem;
            text-align: center;
        }

        .card {
            margin: 15px;
            padding: 20px;
            width: 550px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.18);
            transition: 0.3s;
        }

        .card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.33);
        }

        .card img {
            max-width: 150px;
            height: auto;
            border-radius: 5px;
        }

        .book-info {
            padding-left: 20px;
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
    </style>
</head>

<body>
    <div class="container">
        <h1>List Buku</h1>
        <div class="card d-flex flex-row align-items-center">
            <img src="https://isbn.lib.pcr.ac.id/storage/8klUDqCN2ajXuYzyLHrL7hBR7pM3W1-metaQ292ZXIgWW9hbmRhIEVtYmVkZGVkLmpwZw==-.jpg" alt="Panduan Implementasi Dasar">
            <div class="book-info">
                <h4>Panduan Implementasi Dasar Sistem Embedded Berbasis ATMega8535 dan Arduino Uno</h4>
                <table>
                    <tr>
                        <td>Penulis : Yoanda Alim Syahbana, Egal Hendriyanto</td>
                    </tr>
                    <tr>
                        <td>Penerbit : PCR</td>
                    </tr>
                    <tr>
                        <td>Release : 2023-05-02</td>
                    </tr>
                    <tr>
                        <td>Hal : 47</td>
                    </tr>
                </table>
                <a href="/detail_buku">Detail</a>
            </div>
        </div>
        <div class="card d-flex flex-row align-items-center">
            <img src="https://isbn.lib.pcr.ac.id/storage/VFdrhLDRAPfL99N1fi517YO2aM3iS6-metaQ292ZXIgTUROIFBCTC5qcGc=-.jpg" alt="Pengukuran Besaran Listrik">
            <div class="book-info">
                <h4>Pengukuran Besaran Listrik</h4>
                <table>
                    <tr>
                        <td>Penulis : Putri Madona, Retno Tri Wahyuni</td>
                    </tr>
                    <tr>
                        <td>Penerbit : PCR</td>
                    </tr>
                    <tr>
                        <td>Release : 2023-05-02</td>
                    </tr>
                    <tr>
                        <td>Hal : 103</td>
                    </tr>
                </table>
                <a href="/detail_buku">Detail</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
