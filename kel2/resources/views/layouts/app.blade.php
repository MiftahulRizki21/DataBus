<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Beranda Pengunjung</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="../startbootstrap-sb-admin-master/dist/css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

        <style>
            body {
              display: flex;
              justify-content: center;
              align-items: center;
              height: 100vh;
              margin: 0;
              background-color: #f0f0f0; /* Optional: Light background */
            }

            .btn-login {
                width: 100px;
                height: 40px;
                border: 0 solid;
                border-radius: 10px;
                box-shadow: inset 0 0 20px rgba(255, 255, 255, 0);
                outline: 1px solid;
                outline-color: rgba(0, 0, 0, 0.5);
                outline-offset: 0px;
                text-shadow: none;
                transition: all 1250ms cubic-bezier(0.19, 1, 0.22, 1);
              }

              .btn-login:hover {
                border: 1px solid;
                box-shadow: inset 0 0 20px rgba(255, 255, 255, .5), 0 0 20px rgba(255, 255, 255, .2);
                outline-color: rgba(255, 255, 255, 0);
                outline-offset: 15px;
                text-shadow: 1px 1px 2px #427388;
              }


        .objek-lp {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 300px;
            margin: 0 auto;
            margin-bottom: 30px;
        }

        h1.selamat {
            margin: 10px 0;
        }

        .btn-login {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }
        .garis-horizontal {
            width: 17%;
            border: none;
            border-top: 2px solid #212529; /* Gaya garis */
            margin: 10px 0; /* Jarak vertikal */
        }
        img{
            width: 100px;
            height: 100px;
        }
        .kontak-logo {
            display: flex; /* Menggunakan Flexbox untuk tata letak */
            justify-content: center; /* Memusatkan logo secara horizontal */
            align-items: center; /* Memusatkan logo secara vertikal */
            height: 30vh; /* Memastikan elemen berada di tengah layar secara vertikal */
        }
        td{
            text-align: = center;
            padding: 100px;
        }
        </style>
    </head>
<body class="sb-nav-fixed">

        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Start Bootstrap</a>
            <!-- Navbar Search-->
            <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            </div>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/login">Masuk</a></li>
                        <li><a class="dropdown-item" href="/register">Registrasi</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div class="container-fluid">
            <main class="py-4">
                {{-- @include('flash::message') --}}
                <div class="main-container">
                    @yield('content')
                </div>

                <div class="objek-lp">
                    <h1 class="selamat">Selamat Datang</h1>
                    <button class="btn-login">LOGIN</button>
                </div>
            </main>

            <div class="rekomendasi" style="margin-top: 70px">
                <h2>Rekomendasi</h2>
                <hr class="garis-horizontal">
            </div>

            <div class="contact" style="margin-top: 70px">
                <h2>Kontak Kami</h2>
                <hr class="garis-horizontal">
                <div class="kontak-logo" style="justify-content: center">
                    <table style="border-spacing: 20px;">
                        <tr>
                            <td style="text-align:center;">
                                <img src="../startbootstrap-sb-admin-master/dist/assets/img/location.png" alt="">
                                <h4>Alamat</h4>
                                <P>jalan rumbai</P>
                            </td>
                            <td style="text-align:center;">
                                <img src="../startbootstrap-sb-admin-master/dist/assets/img/phone.png" class="phone" alt="">
                                <h4>No Telepon</h4>
                                <p>0883785372</p>
                            </td>
                            <td style="text-align:center;">
                                <img src="../startbootstrap-sb-admin-master/dist/assets/img/mail.png" class="mail" alt="">
                                <h4>Email</h4>
                                <p>isbn@mahasiswa.pcr.ac.id</p>
                            </td>
                        </tr>
                    </table>

                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
