@extends('layouts.app')

@section('content')
    <h2>Data Pendaftar PKL</h2>

    <!-- Tombol Logout -->
    <form method="POST" action="{{ route('logout') }}" style="margin-bottom: 20px;">
        @csrf
        <button type="submit" style="padding: 8px 16px; background-color: #e3342f; color: white; border: none; border-radius: 4px;">
            Logout
        </button>
    </form>

    <table border="1" cellpadding="8" cellspacing="0">
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
@endsection
