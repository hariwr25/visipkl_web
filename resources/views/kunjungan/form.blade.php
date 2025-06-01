<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Form Pendaftaran Kunjungan Industri</title>
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

    label {
      font-weight: 600;
      margin-bottom: 6px;
      color: #4b3f72;
      display: block;
    }

    input[type="text"],
    input[type="date"],
    input[type="number"] {
      padding: 12px 15px;
      border: 2px solid #ccc;
      border-radius: 8px;
      font-size: 16px;
      transition: border-color 0.3s ease;
      width: 100%;
      box-sizing: border-box;
    }

    input[type="text"]:focus,
    input[type="date"]:focus,
    input[type="number"]:focus {
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
      grid-column: 1 / -1;
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
      grid-column: 1 / -1;
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
      .success-msg,
      .error-list {
        grid-column: 1;
      }
    }
  </style>
</head>
<body>
  <div class="form-container">
    <h2>Form Pendaftaran Kunjungan Industri</h2>

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

    <form method="POST" action="{{ route('kunjungan.submit') }}">
      @csrf

      <div>
        <label for="institusi">Nama Institusi</label>
        <input type="text" name="institusi" id="institusi" placeholder="Masukkan nama institusi" required />
      </div>

      <div>
        <label for="alamat">Alamat</label>
        <input type="text" name="alamat" id="alamat" placeholder="Alamat institusi" required />
      </div>

      <div>
        <label for="tanggal_kunjungan">Tanggal Kunjungan</label>
        <input type="date" name="tanggal_kunjungan" id="tanggal_kunjungan" required />
      </div>

      <div>
        <label for="jumlah_peserta">Jumlah Peserta</label>
        <input type="number" name="jumlah_peserta" id="jumlah_peserta" min="1" placeholder="Jumlah peserta" required />
      </div>

      <div>
        <label for="kontak_person">Kontak Person</label>
        <input type="text" name="kontak_person" id="kontak_person" placeholder="Nama kontak person" required />
      </div>

      <button type="submit">Kirim</button>
    </form>
  </div>
</body>
</html>
