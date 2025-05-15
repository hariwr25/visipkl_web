<!DOCTYPE html>
<html>
<head>
    <title>Status Kunjungan</title>
    <meta charset="utf-8">
</head>
<body>
    <h2>Cek Status Kunjungan</h2>

    <form method="POST" action="{{ route('kunjungan.status') }}">
        @csrf
        <label>Kontak Person:</label><br>
        <input type="text" name="kontak_person" required>
        <button type="submit">Cek</button>
    </form>

    @isset($kunjungan)
        @if ($kunjungan)
            <h3>Data Ditemukan:</h3>
            <p><strong>Institusi:</strong> {{ $kunjungan->institusi }}</p>
            <p><strong>Alamat:</strong> {{ $kunjungan->alamat }}</p>
            <p><strong>Tanggal Kunjungan:</strong> {{ $kunjungan->tanggal_kunjungan }}</p>
            <p><strong>Jumlah Peserta:</strong> {{ $kunjungan->jumlah_peserta }}</p>
        @else
            <p style="color:red;">Data tidak ditemukan.</p>
        @endif
    @endisset
</body>
</html>
