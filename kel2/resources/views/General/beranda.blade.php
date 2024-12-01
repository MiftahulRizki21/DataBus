@extends('layouts.app')
@section('content')

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
                width: 100%;
                margin: 0 auto;
                padding: 0px;
                position: relative; /* Make the div a containing block for the overlay */
                background-image: url('../startbootstrap-sb-admin-master/dist/assets/img/pcr.jpg'); /* Path to your image */
                background-size: cover; /* Ensure the image covers the full div */
                background-position: center; /* Keep the image centered */
                height: 450px; /* Adjust height as needed */
                object-fit: cover; /* Ensures the image fully covers the area */
                border-radius: 5px;
            }

            .objek-lp::after {
                content: ""; /* Make the overlay div */
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: rgba(255, 255, 255, 0.4); /* White overlay with 40% opacity */
                border-radius: 5px;
                z-index: 1; /* Overlay is below text */
            }

            h1.selamat {
                color: #212529;
                margin: 10px 0;
                margin-top: 100px;
                position: relative; /* Ensure this respects z-index */
                z-index: 2; /* Place text above the overlay */
            }

            .btn-login {
                background-color: #212529;
                color: #ffffff;
                padding: 10px 20px;
                font-size: 16px;
                cursor: pointer;
                position: relative; /* Ensure this respects z-index */
                z-index: 2; /* Place button above the overlay */
            }
            .link-regis{
                color: #ffffff;
                position: relative; /* Ensure this respects z-index */
                z-index: 2; /* Place button above the overlay */
            }

            .link-regis:hover {
                color: #212529; /* Mengubah warna teks saat hover */
            }

        .garis-horizontal {
            width: 17%;
            border: none;
            border-top: 2px solid #212529; /* Gaya garis */
            margin: 10px 0; /* Jarak vertikal */
        }
        img.ikon-kontak{
            width: auto;
            height: 100px;
        }
        img.ikon-kontak:hover {
            width: 130;
            height: 130px;
        }

        img.ikon-mail{
            width: 200px;
            height: 100px;
        }
        img.ikon-mail:hover {
            width: 230;
            height: 130px
        }

        .kontak-logo {
            display: flex; /* Menggunakan Flexbox untuk tata letak */
            justify-content: center; /* Memusatkan logo secara horizontal */
            align-items: center; /* Memusatkan logo secara vertikal */
            height: 30vh; /* Memastikan elemen berada di tengah layar secara vertikal */
        }
        td{
            text-align: center;
            padding: 100px;
        }
        
        div.rekom{
            width: 250px;
            height: 350px;
            border-radius: 10px;
            box-shadow:  0 0 15px rgba(0, 0, 0, 0.18);
        }
        div.rekom:hover {
            box-shadow:  0 0 15px rgba(0, 0, 0, 0.33);
            }

        td{
            padding: 50px;
        }
        td.kontak{
            width: 250px; /* Adjust the width of each cell */
            height: 250px; /* Adjust the height of each cell */
            text-align: center; /* Center the content inside the cell */
        }

</style>
<div class="objek-lp">
    <h1 class="selamat">Selamat Datang</h1>
    <button class="btn-login">LOGIN</button>
    <u><a href="" class="link-regis">Register</a></u>
</div>

<div class="rekomendasi" style="margin-top: 50px">
    <h2>Rekomendasi</h2>
    <hr class="garis-horizontal">
    <p style="margin-top: 25px">Rekomendasi yang kami tampilkan berupa koleksi buku ISBN dari Kampus Politeknik Caltex Riau secara random.</p>
    
    <div class="container-rekom">
        <center><table class="rekom">
            <tr>
                <td><div class="rekom"> </div></td>
                <td><div class="rekom"> </div></td>
                <td><div class="rekom"> </div></td>
            </tr>
        </table></center>
    </div>
</div>

<div class="contact" style="margin-top: 70px">
    <h2>Kontak Kami</h2>
    <hr class="garis-horizontal">
    <div class="kontak-logo" style="justify-content: center">
        <center><table class="kontak">
            <tr>
                <td class="kontak" style="text-align:center;">
                    <img src="../startbootstrap-sb-admin-master/dist/assets/img/lokasi.png" alt="" class="ikon-kontak">
                    <h4>Alamat</h4>
                    <P>jalan rumbai</P>
                </td>
                <td class="kontak" style="text-align:center;">
                    <img src="../startbootstrap-sb-admin-master/dist/assets/img/telp.png" class="ikon-kontak" alt="">
                    <h4>No Telepon</h4>
                    <p>0883785372</p>
                </td>
                <td class="kontak"  style="text-align:center;">
                    <img src="../startbootstrap-sb-admin-master/dist/assets/img/mail.png" class="ikon-mail" alt="">
                    <h4>Email</h4>
                    <p>isbn@mahasiswa.pcr.ac.id</p>
                </td>
            </tr>
        </table></center>
    </div>
</div>