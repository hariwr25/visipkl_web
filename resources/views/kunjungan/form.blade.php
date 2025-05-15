<!DOCTYPE html>
<html>
<head>
    <title>Form Pendaftaran Kunjungan Industri</title>
    <meta charset="utf-8">
</head>
<body>
    <h2>Form Pendaftaran Kunjungan Industri</h2>

    {{-- Pesan Sukses --}}
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

    <form method="POST" action="{{ route('kunjungan.submit') }}">
        @csrf

        <label for="institusi">Nama Institusi:</label><br>
        <input type="text" name="institusi" id="institusi" required><br><br>

        <label for="alamat">Alamat:</label><br>
        <input type="text" name="alamat" id="alamat" required><br><br>

        <label for="tanggal_kunjungan">Tanggal Kunjungan:</label><br>
        <input type="date" name="tanggal_kunjungan" id="tanggal_kunjungan" required><br><br>

        <label for="jumlah_peserta">Jumlah Peserta:</label><br>
        <input type="number" name="jumlah_peserta" id="jumlah_peserta" min="1" required><br><br>

        <label for="kontak_person">Kontak Person:</label><br>
        <input type="text" name="kontak_person" id="kontak_person" required><br><br>

        <button type="submit">Kirim</button>
    </form>
</body>
</html>
