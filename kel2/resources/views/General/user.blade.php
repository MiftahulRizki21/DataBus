@extends('layouts.UserApp')
@section('content')

<div class="container-fluid fade-in" style="margin-top: 1200px">
    <div class="objek-lp fade-in">
        <h1 class="selamat">Selamat Datang</h1>
        <h2>Nama Pengguna</h2>
    </div>

    <div class="isi fade-in" style="padding: 30px">
        <div class="rekomendasi fade-in" style="margin-top: 40px">
            <center><h2 class="rekomendasi">Rekomendasi</h2>
            <hr class="garis-horizontal">
            <p class="sample-text" style="margin-top: 25px">Rekomendasi yang kami tampilkan berupa koleksi buku ISBN dari Kampus Politeknik
                Caltex Riau secara random.</p></center>

            <div class="container-rekom fade-in">
                <center>
                    <table class="rekom">
                        <tr>
                            <td><a href="#" class="previous round fade-in"><h2>&#8249;</h2></a></td>
                            <td><div class="rekom fade-in"></div></td>
                            <td><div class="rekom fade-in"></div></td>
                            <td><div class="rekom fade-in"></div></td>
                            <td><a href="#" class="next round fade-in"><h2>&#8250;</h2></a></td>
                        </tr>
                    </table>
                </center>
            </div>
        </div>

        <div class="contact fade-in" style="margin-top: 70px">
            <h2>Kontak Kami</h2>
            <center><hr class="garis-horizontal"></center>
            <div class="contact fade-in" style="margin-top: 20px">
                <p class="sample-text">Sample text. Click to select the text box. Click again or double-click to start editing the text.</p>
                <div class="contact-container">
                    <div class="contact-card">
                        <img src="../startbootstrap-sb-admin-master/dist/assets/img/lokasi.png" alt="Address Icon" class="contact-icon">
                        <h4>ADDRESS</h4>
                        <p>27 13 Lowe Haven</p>
                    </div>
                    <div class="contact-card">
                        <img src="../startbootstrap-sb-admin-master/dist/assets/img/telp.png" alt="Phone Icon" class="contact-icon">
                        <h4>PHONE</h4>
                        <p>111 343 43 43</p>
                    </div>
                    <div class="contact-card">
                        <img src="../startbootstrap-sb-admin-master/dist/assets/img/mail.png" alt="Email Icon" class="contact-icon">
                        <h4>EMAIL</h4>
                        <p>business@info.com</p>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Ambil semua elemen dengan kelas fade-in
        const elements = document.querySelectorAll('.fade-in');

        // Tambahkan kelas "show" dengan delay untuk efek bertahap
        elements.forEach((el, index) => {
            setTimeout(() => {
                el.classList.add('show');
            }, index * 200); // Setiap elemen memiliki delay 200ms
        });
    });
</script>