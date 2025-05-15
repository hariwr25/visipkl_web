<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard Admin
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 rounded shadow">
            <p>Halo, {{ auth()->user()->name }}! (Role: {{ auth()->user()->role }})</p>

            <ul class="mt-4 list-disc list-inside text-blue-600">
                @if(auth()->user()->role === 'superadmin')
                    <li><a href="{{ url('/admin/users') }}">Kelola User</a></li>
                @endif

                @if(in_array(auth()->user()->role, ['superadmin', 'admin_pkl']))
                    <li><a href="{{ url('/admin/pkl') }}">Data Pendaftar PKL</a></li>
                @endif

                @if(in_array(auth()->user()->role, ['superadmin', 'admin_kunjungan']))
                    <li><a href="{{ url('/admin/kunjungan') }}">Data Kunjungan Industri</a></li>
                @endif
            </ul>
        </div>
    </div>
</x-app-layout>
