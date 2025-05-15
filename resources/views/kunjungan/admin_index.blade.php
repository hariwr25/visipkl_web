<h2>Data Pendaftar Kunjungan</h2>
<table border="1">
    <thead>
        <tr>
            <th>Institusi</th>
            <th>Alamat</th>
            <th>Tanggal</th>
            <th>Jumlah Peserta</th>
            <th>Kontak Person</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $row)
        <tr>
            <td>{{ $row->institusi }}</td>
            <td>{{ $row->alamat }}</td>
            <td>{{ $row->tanggal_kunjungan }}</td>
            <td>{{ $row->jumlah_peserta }}</td>
            <td>{{ $row->kontak_person }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
