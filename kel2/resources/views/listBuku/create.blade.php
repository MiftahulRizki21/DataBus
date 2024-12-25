<form action="/test/create" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="judul_buku" id="">judul buku
    <input type="text" name="sipnosis" id="">sipnosis
    <input type="text" name="nama_penulis" id="">nama_penulis
    <input type="text" name="nama_penerbit" id="">nama_penerbit
    <input type="date" name="tgl_rilis" id="">tgl_rilis
    <input type="number" name="halaman" id=""> halaman
    <input type="file" name="foto" id=""> foto
    <button type="submit" class="btn btn-primary">
        Submit</button>
</form>
