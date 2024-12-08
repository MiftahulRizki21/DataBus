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
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
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
            display: flex;
            flex-direction: row;
            align-items: center;
            margin: 15px;
            padding: 20px;
            width: 100%;
            max-width: 500px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.18);
            transition: 0.3s;
            height: 100%;
        }

        .card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.33);
        }

        .card img {
            max-width: 150px;
            height: auto;
            border-radius: 5px;
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
    </style>
</head>

<body>
    <h1>List Buku</h1>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <img src="https://isbn.lib.pcr.ac.id/storage/8klUDqCN2ajXuYzyLHrL7hBR7pM3W1-metaQ292ZXIgWW9hbmRhIEVtYmVkZGVkLmpwZw==-.jpg"
                        alt="Panduan Implementasi Dasar">
                    <div class="book-info">
                        <h4>Panduan Implementasi Dasar Sistem Embedded Berbasis ATMega8535 dan Arduino Uno</h4>
                        <table>
                            <tr>
                                <td>Penulis: Yoanda Alim Syahbana, Egal Hendriyanto</td>
                            </tr>
                            <tr>
                                <td>Penerbit: PCR</td>
                            </tr>
                            <tr>
                                <td>Release: 2023-05-02</td>
                            </tr>
                            <tr>
                                <td>Hal: 47</td>
                            </tr>
                        </table>
                        <a href="/detail_buku">Detail</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <img src="https://isbn.lib.pcr.ac.id/storage/kKCTOnx2UkFr52kyykupup2jTkZsFD-metaQ292ZXIgQW5nZ2kgV29ya3MgV0VCIExhbmp1dC5wbmc=-.png"
                        alt="Workshop Web Lanjut">
                    <div class="book-info">
                        <h4>Workshop Pengembangan Web Lanjut</h4>
                        <table>
                            <tr>
                                <td>Penulis: Anggy Trisnadoli, Muhammad Ihsan Zul</td>
                            </tr>
                            <tr>
                                <td>Penerbit: PCR</td>
                            </tr>
                            <tr>
                                <td>Release: 2023-05-02</td>
                            </tr>
                            <tr>
                                <td>Hal: 56</td>
                            </tr>
                        </table>
                        <a href="/detail_buku">Detail</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <img src="https://isbn.lib.pcr.ac.id/storage/VFdrhLDRAPfL99N1fi517YO2aM3iS6-metaQ292ZXIgTUROIFBCTC5qcGc=-.jpg"
                        alt="Pengukuran Besaran Listrik">
                    <div class="book-info">
                        <h4>Pengukuran Besaran Listrik</h4>
                        <table>
                            <tr>
                                <td>Penulis: Putri Madona, Retno Tri Wahyuni</td>
                            </tr>
                            <tr>
                                <td>Penerbit: PCR</td>
                            </tr>
                            <tr>
                                <td>Release: 2023-05-02</td>
                            </tr>
                            <tr>
                                <td>Hal: 103</td>
                            </tr>
                        </table>
                        <a href="/detail_buku">Detail</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <img src="https://isbn.lib.pcr.ac.id/storage/Yllq8kwQW3VHThwDLwmTL0NdavFxhP-metaQ292ZXIgUk1UIEFKSy5wbmc=-.png"
                        alt="Praktikum Administrasi Jaringan Komputer">
                    <div class="book-info">
                        <h4>Praktikum Administrasi Jaringan Komputer</h4>
                        <table>
                            <tr>
                                <td>Penulis: Rahmat Suhatman, Muhammad Arif Fadhly Ridha</td>
                            </tr>
                            <tr>
                                <td>Penerbit: PCR</td>
                            </tr>
                            <tr>
                                <td>Release: 2023-05-02</td>
                            </tr>
                            <tr>
                                <td>Hal: 217</td>
                            </tr>
                        </table>
                        <a href="/detail_buku">Detail</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
