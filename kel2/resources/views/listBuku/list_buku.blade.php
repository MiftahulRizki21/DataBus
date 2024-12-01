<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Buku</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">

    <style>
        .icon {
            justify-content: center;
            align-items: center;
            display: flex;
        }

        body {
            background-color: #f8f9fa;
            /* Warna latar belakang */
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
        }

        .card {
            position: relative;
            margin: 15px;
            padding: 10px;
            width: 300px;
            text-align: center;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: 0.3s;
            background-color: white;
        }

        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        }

        .card-img-top {
            width: 100%;
            height: 300px;
            object-fit: cover;
        }

        h1 {
            margin-bottom: 30px;
            font-size: 2rem;
        }
    </style>
</head>
<style>
    .row {
        display: flex;
        gap: 20px;
        justify-content: center;
        flex-wrap: wrap;
    }

    .col-sm-6 {
        border: 3px solid black;
        border-radius: 2px;
        width: 300px;
        margin: 15px;
    }
</style>

<body>
    <section id="testimonials">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
                <div class="container mt-5">
                    <h1 class="text-center">List Buku</h1>
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="box col-sm-12">
                                    <div class="icon">
                                        <img src="https://isbn.lib.pcr.ac.id/storage/8klUDqCN2ajXuYzyLHrL7hBR7pM3W1-metaQ292ZXIgWW9hbmRhIEVtYmVkZGVkLmpwZw==-.jpg"
                                            alt="" style="width:200px">
                                    </div>
                                    <div style="margin-left: %">
                                        <h4 style="text-transform: capitalize" class="title">Panduan Implementasi Dasar
                                            Sistem Embedded berbasis ATMega8535 dan Arduino Uno</a></h4>
                                        <table style="margin-left: 0%">
                                            <tr>
                                                <td>Penulis : Yoanda Alim Syahbana,
                                                    Egal Hendriyanto</td>
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
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="box col-sm-10">
                                    <div class="icon">
                                        <img src="https://isbn.lib.pcr.ac.id/storage/VFdrhLDRAPfL99N1fi517YO2aM3iS6-metaQ292ZXIgTUROIFBCTC5qcGc=-.jpg"
                                            alt="" style="width:200px">
                                    </div>
                                    <div style="margin-left: 0%">
                                        <h4 style="text-transform: capitalize" class="title">Pengukuran Besaran
                                            Listrik</a></h4>
                                        <table style="margin-left: 0%">
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="js/datatables-simple-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"></script>
</body>

</html>
