<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="shortcut icon" type="x-icon" href="..\startbootstrap-sb-admin-master\dist\assets\img\logoweb.png">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FAQ Accordion</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 20px;
      background-color: #f0f0f0;
    }
    .accordion-item {
      border: 1px solid #ddd;
      border-radius: 8px;
      margin-bottom: 10px;
      width: 1450px;
      height: 51.6;
      overflow: hidden;
    }
    .accordion-header {
      background-color: #f9f9f9;
      padding: 15px;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
      display: flex;
      justify-content: space-between;
      align-items: center;
      transition: background-color 0.3s ease;
    }
    .accordion-header:hover {
      background-color: #e9e9e9;
    }
    .accordion-header.active {
      background-color: #e0f3ff;
      color: #007bff;
    }
    .accordion-header::after {
      content: '\25B6'; /* Right arrow */
      font-size: 16px;
      transition: transform 0.3s ease;
    }
    .accordion-header.active::after {
      transform: rotate(90deg); /* Down arrow */
    }
    .accordion-content {
      display: none;
      padding: 15px;
      font-size: 14px;
      line-height: 1.5;
      background-color: #ffffff;
      border-top: 1px solid #ddd;
    }
    h1 {
      margin-top: 50px;
      margin-bottom: 30px;
      color: #002855;
    }
    p{
        font-size: 20px;
        color: #002855;
        text-align: left;
    }
    .li{
        font-size: 18px;
    }
    body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .step {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .step-icon {
            width: 40px;
            height: 40px;
            background-color: #002855;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            font-weight: bold;
            margin-right: 15px;
        }

        .step-content {
            flex: 1;
        }

        .step-title {
            font-size: 18px;
            font-weight: bold;
            margin: 0;
            margin-bottom: 5px;
        }

        .step-description {
            font-size: 14px;
            margin: 0;
        }

        .line {
            width: 2px;
            height: 40px;
            background-color: #002855;
            margin: 0 auto;
        }
        h2{
            color: #002855;
            margin-left: 50px;
            margin-top: 70px;
        }
        .accordion-header{
            color: #002855;
        }
        h1.banner {
            text-align: center;
            font-size: 36px;
            font-weight: bold;
            color: #002855;
            background-color: #f0f8ff;
            /* Latar belakang yang lebih terang */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-transform: uppercase;
            /* Huruf kapital semua untuk efek profesional */
            margin-top: 130px;
            margin-bottom: 100px;
            width: 86%;
        }
        .btn-back {
            position: fixed; /* Membuat tombol tetap di pojok kiri */
            top: 40px; /* Jarak dari atas */
            left: 70px; /* Jarak dari kiri */
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            color: white;
            background-color: #007bff; /* Warna biru */
            border: none;
            border-radius: 5px;
            text-decoration: none; /* Hilangkan garis bawah */
            text-align: center;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-back:hover {
            background-color: #0056b3; /* Warna lebih gelap saat hover */
        }

        .btn-back:focus {
            outline: 2px solid #0056b3;
            outline-offset: 2px;
        }
  </style>
</head>
<body>
    <a href="javascript:history.back()" class="btn-back">Back</a>
    <center><h1 class="banner">Syarat Pengajuan</h1></center>

  <h2>Alur Pendaftaran ISBN Online?</h2>
  <div class="card">
    <div class="container">
        <h1 class="alur" style="text-align: center;">Alur Pendaftaran ISBN Online</h1>
        <div class="step">
            <div class="step-icon">1</div>
            <div class="step-content">
                <p class="step-title">Daftar Online ISBN</p>
                <p class="step-description">Mulai dengan unggah berkas yang akan dimintakan nomornya.</p>
            </div>
        </div>
        <div class="line"></div>
        <div class="step">
            <div class="step-icon">2</div>
            <div class="step-content">
                <p class="step-title">Verifikasi Berkas</p>
                <p class="step-description">Berkas akan diverifikasi dan diinput sesuai dengan permintaan penerbit.</p>
            </div>
        </div>
        <div class="line"></div>
        <div class="step">
            <div class="step-icon">3</div>
            <div class="step-content">
                <p class="step-title">Nomor ISBN Selesai</p>
                <p class="step-description">Nomor ISBN yang diminta akan keluar dan bisa diunduh mandiri di akun penerbit.</p>
            </div>
        </div>
    </div>
  </div>
  <h2>Pertanyaan yang sering di ajukan</h2>
  <center><div class="accordion-item">
    <div class="accordion-header">Bagaimana prosedur pengajuan ISBN?</div>
    <div class="accordion-content">
      <p>Pengajuan ISBN dilakukan secara online pada laman <a href="https://isbn.perpusnas.go.id">isbn.perpusnas.go.id</a>.</p>

      <p>Penerbit yang belum tergabung dalam sistem ISBN harus melakukan dua tahapan registrasi, yaitu:</p>
      
      <p><strong>a. Registrasi Penerbit</strong></p>
      <p>Siapkan persyaratan dengan lengkap. Kategorikan jenis penerbit sesuai kebutuhan. Penerbit Swasta harus mengisi <strong>SURAT PERNYATAAN</strong> dan melampirkan <strong>LEGALITAS Pembentukan Badan Usaha</strong> (PT, CV, UD) dengan mencantumkan KBLI 58110 (Penerbitan Buku) serta wajib memiliki <strong>Nomor Induk Berusaha (NIB)</strong> atas nama entitasnya. Sedangkan untuk Yayasan/Perhimpunan/Perkumpulan atau badan sejenisnya harus melampirkan legalitas pembentukan badan hukum serta memiliki Nomor Induk Berusaha (NIB) atas nama entitasnya. Penerbit Pemerintah/Lembaga Pemerintah cukup mengisi <strong>SURAT PERNYATAAN</strong>.</p>
      <p>Unit Penerbitan di lingkungan pendidikan tinggi harus melampirkan <strong>SURAT PERNYATAAN</strong> ditambah <strong>SK Rektor Pembentukan unit penerbitan</strong> tersebut sekaligus penetapannya sebagai identitas single account untuk urusan ISBN di lingkungan kampus yang bersangkutan serta dilengkapi lampiran tim pengelola atau kepengurusan yang telah ditunjuk dan disahkan oleh pejabat yang berwenang. Semua penerbit yang bergabung dalam sistem ISBN harus memiliki website resmi yang aktif dan dapat diakses secara berkelanjutan.</p>

      <p><strong>b. Registrasi ISBN/Registrasi Judul</strong></p>
      <p>Siapkan berkas persyaratan untuk mengisi ruas lampiran, ruas dummy, dan ruas link. (Baca lebih lanjut pada Prosedur di Beranda web ISBN dan Petunjuk Teknis Layanan ISBN)</p>
    </div>
  </div>

  <div class="accordion-item">
    <div class="accordion-header">Apakah lini penerbitan dapat memiliki akun sendiri? Bagaimana mekanismenya?</div>
    <div class="accordion-content">
      <p>Penerbit yang memiliki lini penerbitan atau imprint dapat didaftarkan masing-masing, namun harus memiliki <strong>Nomor Induk Berusaha (NIB)</strong> atas nama entitasnya. Penggunaan website bersama oleh penerbit yang memiliki lini penerbitan sangat dimungkinkan asal mencantumkan profil lengkap perusahaan pada bagian web tersebut serta menyebutkan nama lini yang dimilikinya. Penggunaan menu penyimpanan link buku pada website tersebut harus dikelompokkan berdasarkan terbitan dari masing-masing lini agar pengelolaan link tersebut rapi dan terklaster.</p>
    </div>
  </div>

  <div class="accordion-item">
    <div class="accordion-header">Apakah ISBN yang sudah ditetapkan terhadap sebuah judul buku dapat dibatalkan?</div>
    <div class="accordion-content">
      <p>Dengan adanya pengisian <strong>SURAT PERNYATAAN KEASLIAN KARYA</strong>, lampiran <strong>DUMMY BUKU</strong> dan pencantuman <strong>LINK BUKU</strong> pada saat pengajuan ISBN, sudah dipastikan buku tersebut siap naik cetak. Jadi sangat tidak dimungkinkan untuk melakukan pembatalan terhadap ISBN yang sudah divalidasi untuk sebuah judul.</p>
    </div>
  </div>

  <div class="accordion-item">
    <div class="accordion-header">Siapa yang berhak mengisi Surat Pernyataan Keaslian Karya (SPKK)?</div>
    <div class="accordion-content" style="justify-content: left;">
      <p><strong>a. Untuk karya perorangan</strong>, SPKK diisi oleh penulis karya tersebut.</p>
      <p><strong>b. Untuk karya perorangan</strong>, namun penulis sudah wafat, SPKK dibuat oleh ahli warisnya.</p>
      <p><strong>c. Untuk karya berkelompok</strong>, SPKK diisi oleh penulis pertama yang tercantum pada buku.</p>
      <p><strong>d. Untuk karya kumpulan materi</strong> dengan pembahasan subjek yang sama atau berbeda, SPKK diisi oleh editor atau penyuntingnya.</p>
      <p><strong>e. Untuk karya kumpulan book chapter</strong> (bunga rampai/edited book), SPKK diisi oleh editor atau penyuntingnya.</p>
      <p><strong>f. Untuk antologi karya sastra</strong> yang diterbitkan secara luas, SPKK diisi oleh penulis pertama dari susunan penulis yang tercantum pada buku.</p>
      <p><strong>g. Untuk karya prosiding hasil sebuah pertemuan</strong>, SPKK diisi oleh ketua penyelenggara pertemuan tersebut.</p>
      <p><strong>h. Untuk karya hasil tulisan anak di bawah 17 tahun</strong>, SPKK diisi oleh orangtua/wali anak tersebut dengan memberi keterangan di dalam kurung setelah nama tersebut.</p>
      <p><strong>i. Untuk karya yang dihasilkan oleh sebuah satuan kerja</strong>, SPKK diisi oleh pimpinan satuan kerja yang bersangkutan.</p>
      <p><strong>j. Untuk karya yang menggunakan nama pena</strong>, SPKK diisi dengan nama diri sesuai KTP dengan memberikan keterangan dalam tanda kurung pada belakang nama tersebut nama penanya.</p>
      <p><strong>k. Untuk buku terjemahan</strong>, tidak ada SPKK, penggantinya adalah <strong>SURAT IZIN PENERJEMAHAN</strong>.</p>
      <p>Format surat ini tidak ditetapkan karena bisa berlaku fleksibel berdasarkan siapa yang memberi izin atas penerjemahan buku tersebut:</p>
      <ul>
        <li><p class="li">1. Penulis asli, jika penulis asli masih hidup dan dimungkinkan untuk dimintakan memberi pernyataan izin penerjemahan.</p></li>
        <li><p class="li">2. Penerbit pertama yang menerbitkan buku tersebut, jika perjanjian awal antara penulis pertama dengan penerbit tersebut <strong>JUAL PUTUS</strong>, sehingga penerbit pertama berhak memberikan izin jika buku hendak diterjemahkan.</p></li>
        <li><p class="li">3. Penerbit kedua (penerbit yang akan menerjemahkan). Kasus ini terjadi ketika izin disampaikan melalui lisan atau melalui pesan singkat yang tidak bisa diulang lagi menjadi sebuah surat resmi.</p></li>
      </ul>
    </div>
  </div></center>

  <script>
    const headers = document.querySelectorAll('.accordion-header');
    headers.forEach(header => {
      header.addEventListener('click', () => {
        // Toggle active class
        header.classList.toggle('active');
        // Toggle content visibility
        const content = header.nextElementSibling;
        content.style.display = content.style.display === 'block' ? 'none' : 'block';
      });
    });
  </script>
</body>
</html>
