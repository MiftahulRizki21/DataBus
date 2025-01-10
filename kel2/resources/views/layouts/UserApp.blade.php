<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        
        <link rel="shortcut icon" type="x-icon" href="..\startbootstrap-sb-admin-master\dist\assets\img\logoweb.png">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="../startbootstrap-sb-admin-master/dist/css/styles.css" rel="stylesheet" />
        <link href="../startbootstrap-sb-admin-master/dist/css/beranda.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
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
                background-color: #002855;
                color: white;
                text-align: center;
                padding: 10px 0;
            }

            .logo{
                width: 50%;
                height: 50%;
            }
            b{
                color: white;
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
            div.fas fa-user fa-fw{
                font-size: 100px;
            }
            .card-image {
                margin-top: 19px;
                margin-bottom: 25px;
                width: 80%; /* Gambar sesuai lebar card */
                height: auto; /* Pertahankan rasio aspek */
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
                <p><a href="/user/dashboard" class="navlink">Beranda</a></p>
            </div>
            <div class="container-navlink">
                <p><a href="/pengajuan" class="navlink">Ajukkan</a></p>
            </div>
            
            <div class="container-navlink">
                <p><a href="/list" class="navlink">List Buku</a></p>
            </div>
            <div class="container-navlink">
                <p><a href="/syarat" class="navlink">Syarat Pengajuan</a></p>
            </div>
            <div class="container-navlink">
                <a href="/profile/user" class="navlink"><div class="fas fa-user fa-fw" style="margin-top:5px;"></div></a>
            </div>

            
        </ul>
    </nav>

    <main class="container-fluid py-4">
        {{-- Tempat konten dinamis --}}
        @yield('content')
    </main>

    <!-- Footer -->
    <div class="footer">
        @include('layouts.footer')
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

    


</body>
</html>