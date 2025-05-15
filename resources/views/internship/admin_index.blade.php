<h2>Data Pendaftar PKL</h2>
<table border="1">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>Instansi</th>
            <th>Tanggal Mulai</th>
            <th>Tanggal Selesai</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $row)
        <tr>
            <td>{{ $row->nama }}</td>
            <td>{{ $row->email }}</td>
            <td>{{ $row->instansi }}</td>
            <td>{{ $row->tanggal_mulai }}</td>
            <td>{{ $row->tanggal_selesai }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
