<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Status Pendaftaran PKL</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

    /* Reset & base */
    * {
      box-sizing: border-box;
    }
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #4facfe, #00f2fe);
      color: #222;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      padding: 20px;
    }

    /* Card Container */
    .card {
      background: rgba(255 255 255 / 0.9);
      border-radius: 20px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.15);
      max-width: 440px;
      width: 100%;
      padding: 40px 35px;
      text-align: center;
      transition: transform 0.3s ease;
    }
    .card:hover {
      transform: translateY(-6px);
      box-shadow: 0 20px 40px rgba(0,0,0,0.25);
    }

    h2 {
      font-weight: 700;
      font-size: 2rem;
      margin-bottom: 30px;
      letter-spacing: 1px;
      color: #333;
    }

    /* Form */
    form {
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    label {
      font-weight: 600;
      font-size: 1rem;
      text-align: left;
      display: block;
      margin-bottom: 8px;
      color: #555;
      user-select: none;
    }

    input[type="email"] {
      padding: 14px 18px;
      font-size: 1rem;
      border-radius: 12px;
      border: 1.8px solid #4facfe;
      outline: none;
      transition: box-shadow 0.3s ease, border-color 0.3s ease;
      background: #fff;
      color: #222;
      font-weight: 500;
    }
    input[type="email"]::placeholder {
      color: #bbb;
    }
    input[type="email"]:focus {
      box-shadow: 0 0 10px 3px #00f2fe;
      border-color: #00f2fe;
      background: #f0fcff;
    }

    button {
      margin-top: 5px;
      padding: 14px;
      font-size: 1.1rem;
      font-weight: 700;
      color: #fff;
      background: linear-gradient(45deg, #ff6a00, #ee0979);
      border: none;
      border-radius: 25px;
      cursor: pointer;
      box-shadow: 0 8px 25px rgba(238,9,121,0.6);
      transition: box-shadow 0.3s ease, transform 0.2s ease;
      user-select: none;
    }
    button:hover {
      box-shadow: 0 12px 38px rgba(238,9,121,0.85);
      transform: translateY(-4px);
    }
    button:active {
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(238,9,121,0.5);
    }

    /* Result Box */
    .result, .error {
      margin-top: 35px;
      padding: 25px 30px;
      border-radius: 18px;
      background: #fefefe;
      box-shadow: 0 3px 15px rgba(0,0,0,0.1);
      text-align: left;
      color: #222;
      opacity: 0;
      transform: translateY(15px);
      animation: fadeInUp 0.5s forwards;
      user-select: text;
    }

    .result h3 {
      font-weight: 700;
      font-size: 1.5rem;
      margin-top: 0;
      margin-bottom: 15px;
      color: #ff6a00;
      text-shadow: 0 1px 5px rgba(255, 106, 0, 0.3);
    }
    .result p {
      font-size: 1.1rem;
      margin: 8px 0;
      line-height: 1.4;
    }
    .error {
      color: #ee0979;
      font-weight: 700;
      font-size: 1.2rem;
      text-align: center;
      text-shadow: 0 0 5px rgba(238, 9, 121, 0.7);
    }

    @keyframes fadeInUp {
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* Responsive */
    @media (max-width: 480px) {
      .card {
        padding: 30px 25px;
      }
      h2 {
        font-size: 1.6rem;
      }
      button {
        font-size: 1rem;
      }
    }
  </style>
</head>
<body>
  <main class="card" role="main">
    <h2>Cek Status Pendaftaran PKL</h2>

    <form method="POST" action="{{ route('status.pkl') }}">
      @csrf
      <label for="email">Masukkan Email:</label>
      <input type="email" name="email" id="email" placeholder="contoh@mail.com" required />
      <button type="submit">Cek Status</button>
    </form>

    @isset($intern)
      @if ($intern)
        <div class="result" role="region" aria-live="polite">
          <h3>Data Ditemukan:</h3>
          <p><strong>Nama:</strong> {{ $intern->nama }}</p>
          <p><strong>Instansi:</strong> {{ $intern->instansi }}</p>
          <p><strong>Periode:</strong> {{ $intern->tanggal_mulai }} s/d {{ $intern->tanggal_selesai }}</p>
        </div>
      @else
        <p class="error" role="alert">Data tidak ditemukan.</p>
      @endif
    @endisset
  </main>
</body>
</html>
