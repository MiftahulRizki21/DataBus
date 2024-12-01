@extends('layouts.app')
@section('content')


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