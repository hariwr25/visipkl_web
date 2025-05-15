@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dashboard Superadmin</h1>

    <p>Selamat datang, {{ auth()->user()->name }}!</p>

    <div class="mt-4">
        <ul>
            <li><a href="{{ url('/admin/users') }}">🔐 Kelola User</a></li>
            <li><a href="{{ url('/admin/pkl') }}">📋 Data Pendaftaran PKL</a></li>
            <li><a href="{{ url('/admin/kunjungan') }}">🏢 Data Kunjungan Industri</a></li>
        </ul>
    </div>
</div>
@endsection
