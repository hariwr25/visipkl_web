<!DOCTYPE html>
<html>
<head>
    <title>Formulir Pendaftaran PKL</title>
    <meta charset="utf-8">
</head>
<body>
    <h2>Form Pendaftaran PKL</h2>

    {{-- Notifikasi sukses --}}
    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    {{-- Tampilkan error validasi --}}
    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('pendaftaran.submit') }}">
        @csrf

        <label for="nama">Nama:</label><br>
        <input type="text" name="nama" id="nama" required><br>

        <label for="email">Email:</label><br>
        <input type="email" name="email" id="email" required><br>

        <label for="instansi">Instansi:</label><br>
        <input type="text" name="instansi" id="instansi" required><br>

        <label for="tanggal_mulai">Tanggal Mulai:</label><br>
        <input type="date" name="tanggal_mulai" id="tanggal_mulai" required><br>

        <label for="tanggal_selesai">Tanggal Selesai:</label><br>
        <input type="date" name="tanggal_selesai" id="tanggal_selesai" required><br><br>

        <button type="submit">Daftar</button>
    </form>
</body>
</html>
