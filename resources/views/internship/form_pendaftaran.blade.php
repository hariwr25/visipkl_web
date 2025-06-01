<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Formulir Pendaftaran PKL</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #667eea, #764ba2);
      margin: 0;
      padding: 20px;
      display: flex;
      justify-content: center;
      min-height: 100vh;
      color: #333;
    }

    .form-container {
      background: white;
      border-radius: 12px;
      padding: 30px 40px;
      max-width: 900px;
      width: 100%;
      box-shadow: 0 12px 25px rgba(0, 0, 0, 0.15);
      animation: fadeIn 0.7s ease forwards;
    }

    h2 {
      text-align: center;
      color: #4b3f72;
      margin-bottom: 30px;
      font-weight: 700;
      letter-spacing: 1.2px;
    }

    form {
      display: grid;
      grid-template-columns: 1fr 1fr;
      grid-gap: 25px 40px;
    }

    /* Kiri 4 input */
    .left-col {
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    /* Kanan 2 input + penjelasan */
    .right-col {
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    label {
      font-weight: 600;
      margin-bottom: 6px;
      color: #4b3f72;
    }

    input[type="text"],
    input[type="email"],
    input[type="date"],
    select {
      padding: 12px 15px;
      border: 2px solid #ccc;
      border-radius: 8px;
      font-size: 16px;
      transition: border-color 0.3s ease;
      width: 100%;
    }

    input[type="text"]:focus,
    input[type="email"]:focus,
    input[type="date"]:focus,
    select:focus {
      border-color: #667eea;
      outline: none;
      box-shadow: 0 0 8px rgba(102, 126, 234, 0.5);
    }

    button {
      grid-column: 1 / -1; /* tombol full lebar */
      padding: 15px;
      border: none;
      border-radius: 10px;
      background: #667eea;
      color: white;
      font-size: 18px;
      font-weight: 700;
      cursor: pointer;
      transition: background-color 0.3s ease;
      box-shadow: 0 6px 12px rgba(102, 126, 234, 0.5);
      margin-top: 10px;
    }
    button:hover {
      background-color: #5a67d8;
      box-shadow: 0 8px 18px rgba(90, 103, 216, 0.7);
    }

    /* Penjelasan divisi di bawah kanan */
    .divisi-info {
      background-color: #f0f4ff;
      border-radius: 12px;
      padding: 20px 25px;
      box-shadow: inset 0 0 15px rgba(102, 126, 234, 0.2);
      color: #2a2a72;
      font-size: 16px;
      line-height: 1.5;
      margin-top: 10px;
      max-height: 220px;
      overflow-y: auto;
      white-space: pre-line;
      flex-grow: 1;
    }

    /* Notifikasi sukses */
    .success-msg {
      background-color: #d4edda;
      color: #155724;
      padding: 12px 15px;
      border-radius: 8px;
      margin-bottom: 18px;
      border: 1px solid #c3e6cb;
      font-weight: 600;
      text-align: center;
    }

    /* List error */
    .error-list {
      background-color: #f8d7da;
      color: #721c24;
      padding: 12px 15px;
      border-radius: 8px;
      margin-bottom: 18px;
      border: 1px solid #f5c6cb;
      font-weight: 600;
      max-height: 150px;
      overflow-y: auto;
      list-style: inside disc;
    }
    .error-list li {
      margin-left: 10px;
      font-weight: 500;
    }

    /* Animasi fadeIn */
    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* Responsive */
    @media (max-width: 720px) {
      form {
        grid-template-columns: 1fr;
      }
      button {
        grid-column: 1;
      }
      .divisi-info {
        max-height: none;
        margin-top: 20px;
      }
    }
  </style>
</head>
<body>
  <div class="form-container">
    <h2>Form Pendaftaran PKL</h2>

    {{-- Notifikasi sukses --}}
    @if (session('success'))
      <div class="success-msg">{{ session('success') }}</div>
    @endif

    {{-- Tampilkan error validasi --}}
    @if ($errors->any())
      <ul class="error-list">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    @endif

    <form method="POST" action="{{ route('pendaftaran.submit') }}">
      @csrf

      <div class="left-col">
        <div>
          <label for="nama">Nama Lengkap</label>
          <input type="text" name="nama" id="nama" placeholder="Masukkan nama lengkap" required />
        </div>

        <div>
          <label for="email">Email</label>
          <input type="email" name="email" id="email" placeholder="contoh@mail.com" required />
        </div>

        <div>
          <label for="instansi">Instansi</label>
          <input type="text" name="instansi" id="instansi" placeholder="Nama sekolah/universitas/instansi" required />
        </div>

        <div>
          <label for="tanggal_mulai">Tanggal Mulai</label>
          <input type="date" name="tanggal_mulai" id="tanggal_mulai" required />
        </div>
      </div>

      <div class="right-col">
        <div>
          <label for="tanggal_selesai">Tanggal Selesai</label>
          <input type="date" name="tanggal_selesai" id="tanggal_selesai" required />
        </div>

        <div>
          <label for="divisi">Pilih Divisi</label>
          <select name="divisi" id="divisi" required>
            <option value="" disabled selected>-- Pilih Divisi --</option>
            <option value="Produksi">Produksi</option>
            <option value="Penyiaran">Penyiaran</option>
            <option value="Teknologi Informasi">Teknologi Informasi</option>
            <option value="Keuangan">Keuangan</option>
            <option value="Marketing">Marketing</option>
            <option value="Pengembangan Konten">Pengembangan Konten</option>
            <option value="Administrasi">Administrasi</option>
          </select>
        </div>

        <div class="divisi-info" id="divisi-info">
          Pilih divisi untuk melihat penjelasan lebih detail.
        </div>
      </div>

      <button type="submit">Daftar Sekarang</button>
    </form>
  </div>

  <script>
    const divisiDescriptions = {
      "Produksi": "Bertanggung jawab atas proses pembuatan program siaran mulai dari perencanaan hingga eksekusi secara teknis.",
      "Penyiaran": "Mengelola jalannya siaran langsung, mengatur peralatan siaran, serta memastikan program berjalan lancar di udara.",
      "Teknologi Informasi": "Menangani infrastruktur IT, sistem komputer, jaringan, dan pengembangan teknologi di perusahaan.",
      "Keuangan": "Mengelola pembukuan, anggaran, pengeluaran dan laporan keuangan perusahaan secara transparan dan akurat.",
      "Marketing": "Merencanakan dan menjalankan strategi pemasaran untuk meningkatkan branding dan engagement perusahaan.",
      "Pengembangan Konten": "Membuat dan mengembangkan konten kreatif yang sesuai dengan kebutuhan audiens dan tujuan perusahaan.",
      "Administrasi": "Mendukung kegiatan operasional perusahaan melalui pengelolaan dokumen, jadwal, dan koordinasi antar bagian."
    };

    const selectDivisi = document.getElementById('divisi');
    const divisiInfo = document.getElementById('divisi-info');

    selectDivisi.addEventListener('change', () => {
      const selected = selectDivisi.value;
      if (selected && divisiDescriptions[selected]) {
        divisiInfo.textContent = divisiDescriptions[selected];
      } else {
        divisiInfo.textContent = "Pilih divisi untuk melihat penjelasan lebih detail.";
      }
    });
  </script>
</body>
</html>
