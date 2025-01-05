<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Beranda Pengunjung</title>

        <!-- Stylesheets -->
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="../startbootstrap-sb-admin-master/dist/css/styles.css" rel="stylesheet" />
        <link href="../startbootstrap-sb-admin-master/dist/css/beranda.css" rel="stylesheet" />

        <!-- FontAwesome & jQuery -->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        

        <style>
            /* Tambahkan gaya untuk memastikan footer berada di bawah */
            html, body {
                height: 100%;
                margin: 0;
                display: flex;
                flex-direction: column;
            }

            .content {
                flex: 1;
            }

            footer {
                background-color: #343a40;
                color: white;
                text-align: center;
                padding: 10px 0;
            }

        .logo{
                width: 50%;
                height: 50%;
            }

            .card-image {
                margin-top: 19px;
                margin-bottom: 25px;
                width: 80%; /* Gambar sesuai lebar card */
                height: auto; /* Pertahankan rasio aspek */
            }
            /* Gaya untuk navbar */
            .navbar-nav .navlink {
                color: white;
                font-weight: bold;
                text-decoration: none;
                padding: 10px 20px;
                transition: background-color 0.3s ease, color 0.3s ease;
            }

            /* Efek hover */
            .navbar-nav .navlink:hover {
                background-color: #0056b3; /* Ganti dengan warna yang Anda inginkan */
                color: white;
                border-radius: 4px; /* Menambahkan border radius untuk sudut tumpul */
            }

            /* Menambahkan padding dan efek ketika hover pada navbar */
            .navbar-nav .navlink:active {
                background-color: #00408d; /* Ganti dengan warna yang Anda inginkan saat klik */
            }
        </style>
    </head>
<body class="sb-nav-fixed">

    <nav class="sb-topnav navbar navbar-expand navbar-dark" style="background-color: #002855;">
        <!-- Navbar Brand -->
        <a class="navbar-brand ps-3" href="index.html"><img src="..\startbootstrap-sb-admin-master\dist\assets\img\logo.png" alt="" class="logo"></a>

            <!-- Navbar Right -->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4" style="position: absolute; right: 0;">
            <div class="container-navlink">
                <p><a href="/" class="navlink">Beranda</a></p>
            </div>
            <div class="container-navlink">
                <p><a href="/listPengunjung" class="navlink">List Buku</a></p>
            </div>
            <div class="container-navlink">
                <p><a href="/login" class="navlink">Login</a></p>
            </div>
            
        </ul>
        </nav>

        <!-- Main Content -->
        <div class="container-fluid content">
            <main class="py-4">
                {{-- Tempat konten dinamis --}}
                @yield('content')
            </main>
        </div>

        <!-- Footer -->
        <div class="footer" style="width: 100%; height: 100%;">
            @include('layouts.footer')
        </div>
        
        

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>

    </body>

    </html>