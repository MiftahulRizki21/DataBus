@extends('layouts.UserApp')
@section('content')

<title>Beranda | User</title>
    <div class="container-fluid fade-in">
        <div class="objek-lp fade-in">
            <h1 class="selamat">Selamat Datang</h1>
            <h2>{{ $user -> name}}</h2>
            
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
                                <tr>
                                    <!-- Tombol Previous -->
                                    @if ($listBuku->onFirstPage())
                                        <td><span class="previous round fade-in disabled"><h2>&#8249;</h2></span></td>
                                    @else
                                        <td>
                                            <a href="{{ $listBuku->previousPageUrl() }}" class="previous round fade-in">
                                                <h2 class="previous" style="color: aliceblue;">&#8249;</h2>
                                            </a>
                                        </td>
                                    @endif
                                
                                    <!-- Buku -->
                                    @foreach ($listBuku as $listbuku)
                                        <td>
                                            <div class="rekom fade-in card" >
                                                <a href="/detail_buku/{{ $listbuku->id }}">
                                                    <img src="{{ asset('storage/'. $listbuku->foto) }}" alt="{{ $listbuku->judul_buku }}" class="card-image">
                                                
                                                </a>
                                                <b><h3><p class="card-title" style="color: black">{{ $listbuku->judul_buku }}</p></h3></b>
                                                
                                            </div>
                                        </td>
                                    @endforeach
                                
                                    <!-- Tombol Next -->
                                    @if ($listBuku->hasMorePages())
                                        <td>
                                            <a href="{{ $listBuku->nextPageUrl() }}" class="next round fade-in">
                                                <h2 class="next" style="color: aliceblue;">&#8250;</h2>
                                            </a>
                                        </td>
                                    @else
                                        <td><span class="next round fade-in disabled"><h2>&#8250;</h2></span></td>
                                    @endif
                                </tr>                                
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
        document.addEventListener("DOMContentLoaded", function () {
            const fadeElements = document.querySelectorAll('.fade-in');
    
            // Mendapatkan posisi scroll dari URL hash
            if (window.location.hash && window.location.hash.includes("scrollPos")) {
                const scrollPosition = parseInt(window.location.hash.replace("#scrollPos=", ""));
                if (!isNaN(scrollPosition)) {
                    window.scrollTo({ top: scrollPosition, behavior: 'smooth' });
                }
            }
    
            // Simpan posisi scroll sebelum berpindah halaman
            document.querySelectorAll('.container-rekom a').forEach(link => {
                link.addEventListener('click', function (e) {
                    e.preventDefault(); // Mencegah reload langsung
                    const currentScrollPos = window.scrollY;
                    const url = new URL(link.href);
                    url.hash = `scrollPos=${currentScrollPos}`;
                    window.location.href = url.toString(); // Navigasi ke URL baru
                });
            });
    
            // Efek animasi scroll untuk elemen dengan kelas fade-in
            function handleScroll() {
                fadeElements.forEach((el) => {
                    const rect = el.getBoundingClientRect();
                    const isVisible = rect.top <= window.innerHeight && rect.bottom >= 0;
    
                    if (isVisible) {
                        el.classList.add('show');
                    }
                });
            }
    
            handleScroll();
            window.addEventListener("scroll", handleScroll);
        });
    </script>    
@endsection
