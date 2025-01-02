@extends('layouts.app')
@section('content')
    <div class="container-fluid fade-in">
        <div class="objek-lp fade-in">
            <h1 class="selamat">Selamat Datang</h1>
            <button class="btn-login zoom-in">LOGIN</button>
            <u><a href="" class="link-regis slide-in-left">Register</a></u>
        </div>

        <div class="isi fade-in" style="padding: 30px">
            <div class="rekomendasi fade-in" style="margin-top: 40px">
                <center>
                    <h2 class="rekomendasi">Rekomendasi</h2>
                    <hr class="garis-horizontal">
                    <p class="sample-text" style="margin-top: 25px">Rekomendasi yang kami tampilkan berupa koleksi buku ISBN
                        dari Kampus Politeknik
                        Caltex Riau secara random.</p>
                </center>

                <div class="container-rekom fade-in">
                    <center>
                        <table class="rekom">
                            <tr>
                                <td><a href="#" class="previous round fade-in">
                                        <h2>&#8249;</h2>
                                    </a></td>
                                    @foreach ($listBuku as $listbuku)
                                    <td>
                                        <div class="rekom fade-in">
                                            <a href="{{ route('detailBuku_show', $listbuku->id) }}" style="width: 100%; height: 100%;">
                                                <img src="{{ Storage::url($listbuku->foto) }}"
                                                     alt="{{ $listbuku->judul_buku }}"
                                                     style="width: 100%; height: 100%;">
                                            </a>
                                        </div>
                                    </td>
                                @endforeach
                                

                                <td><a href="#" class="next round fade-in">
                                        <h2>&#8250;</h2>
                                    </a></td>
                            </tr>
                        </table>
                    </center>
                </div>
            </div>

            <div class="contact fade-in" style="margin-top: 70px">
                <h2>Kontak Kami</h2>
                <center>
                    <hr class="garis-horizontal">
                </center>
                <div class="contact fade-in" style="margin-top: 20px">
                    <p class="sample-text">Sample text. Click to select the text box. Click again or double-click to start
                        editing the text.</p>
                    <div class="contact-container">
                        <div class="contact-card">
                            <img src="../startbootstrap-sb-admin-master/dist/assets/img/lokasi.png" alt="Address Icon"
                                class="contact-icon">
                            <h4>ADDRESS</h4>
                            <p>27 13 Lowe Haven</p>
                        </div>
                        <div class="contact-card">
                            <img src="../startbootstrap-sb-admin-master/dist/assets/img/telp.png" alt="Phone Icon"
                                class="contact-icon">
                            <h4>PHONE</h4>
                            <p>111 343 43 43</p>
                        </div>
                        <div class="contact-card">
                            <img src="../startbootstrap-sb-admin-master/dist/assets/img/mail.png" alt="Email Icon"
                                class="contact-icon">
                            <h4>EMAIL</h4>
                            <p>business@info.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Add fade-in effect for elements already in view
            const fadeElements = document.querySelectorAll('.fade-in');

            function handleScroll() {
                fadeElements.forEach((el) => {
                    const rect = el.getBoundingClientRect();
                    const isVisible = rect.top <= window.innerHeight && rect.bottom >= 0;

                    // When the element is in view, add the "show" class
                    if (isVisible) {
                        el.classList.add('show');
                    }
                });
            }

            // Apply fade-in when the page is loaded and on scroll
            handleScroll();
            window.addEventListener("scroll", handleScroll);
        });
    </script>
@endsection
