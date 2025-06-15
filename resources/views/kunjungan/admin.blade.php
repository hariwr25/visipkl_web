@extends('layouts.app')

@section('content')

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="p-4 bg-white rounded shadow">
            <p class="text-gray-500 text-sm">Total Permintaan</p>
            <p class="text-2xl font-semibold">{{ $total }}</p>
        </div>
        <div class="p-4 bg-white rounded shadow">
            <p class="text-gray-500 text-sm">Disetujui</p>
            <p class="text-2xl text-green-600 font-semibold">{{ $approved }}</p>
        </div>
        <div class="p-4 bg-white rounded shadow">
            <p class="text-gray-500 text-sm">Ditolak</p>
            <p class="text-2xl text-red-600 font-semibold">{{ $rejected }}</p>
        </div>
    </div>

    <div class="bg-white shadow rounded-lg p-6 mb-6">
        <h2 class="text-lg font-semibold text-gray-700 mb-4">Grafik Kunjungan per Bulan</h2>
        <canvas id="kunjunganChart" height="100"></canvas>
    </div>

    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-lg font-semibold text-gray-700 mb-4">Daftar Kunjungan</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm border">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 border">Institusi</th>
                        <th class="px-4 py-2 border">Tanggal</th>
                        <th class="px-4 py-2 border">Peserta</th>
                        <th class="px-4 py-2 border">Kontak</th>
                        <th class="px-4 py-2 border">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $row)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 border">{{ $row->institusi }}</td>
                        <td class="px-4 py-2 border">{{ $row->tanggal_kunjungan }}</td>
                        <td class="px-4 py-2 border">{{ $row->jumlah_peserta }}</td>
                        <td class="px-4 py-2 border">{{ $row->kontak_person }}</td>
                        <td class="px-4 py-2 border">
                            <span class="px-2 py-1 text-xs font-medium rounded 
                                {{ $row->status == 'disetujui' ? 'bg-green-100 text-green-800' : 
                                   ($row->status == 'ditolak' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                                {{ ucfirst($row->status ?? 'menunggu') }}
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-gray-500 py-4">Belum ada data kunjungan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('kunjunganChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($chartLabels) !!},
            datasets: [{
                label: 'Jumlah Kunjungan',
                data: {!! json_encode($chartData) !!},
                backgroundColor: '#3b82f6'
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
</script>
@endsection
