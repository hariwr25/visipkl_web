<!DOCTYPE html>
<html>
<head>
    <title>Status Pendaftaran PKL</title>
    <meta charset="utf-8">
</head>
<body>
    <h2>Cek Status Pendaftaran PKL</h2>

    <form method="POST" action="{{ route('status.pkl') }}">
        @csrf
        <label for="email">Masukkan Email:</label><br>
        <input type="email" name="email" id="email" required>
        <button type="submit">Cek Status</button>
    </form>

    @isset($intern)
        @if ($intern)
            <h3>Data Ditemukan:</h3>
            <p><strong>Nama:</strong> {{ $intern->nama }}</p>
            <p><strong>Instansi:</strong> {{ $intern->instansi }}</p>
            <p><strong>Periode:</strong> {{ $intern->tanggal_mulai }} s/d {{ $intern->tanggal_selesai }}</p>
        @else
            <p style="color: red;">Data tidak ditemukan.</p>
        @endif
    @endisset
</body>
</html>
