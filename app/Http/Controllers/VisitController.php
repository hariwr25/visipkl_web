<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visit;
use Carbon\Carbon;

class VisitController extends Controller
{
    /**
     * Menampilkan form pendaftaran kunjungan industri
     */
    public function form()
    {
        return view('kunjungan.form');
    }

    /**
     * Menyimpan data pendaftaran kunjungan ke database
     */
    public function submit(Request $request)
    {
        $request->validate([
            'institusi' => 'required',
            'alamat' => 'required',
            'tanggal_kunjungan' => 'required|date',
            'jumlah_peserta' => 'required|integer|min:1',
            'kontak_person' => 'required',
        ]);

        Visit::create($request->only([
            'institusi',
            'alamat',
            'tanggal_kunjungan',
            'jumlah_peserta',
            'kontak_person'
        ]));

        return back()->with('success', 'Pendaftaran kunjungan berhasil!');
    }

    /**
     * Menampilkan form cek status kunjungan
     */
    public function statusForm()
    {
        return view('kunjungan.status');
    }

    /**
     * Mengecek status berdasarkan kontak person
     */
    public function statusCheck(Request $request)
    {
        $request->validate(['kontak_person' => 'required']);

        $kunjungan = Visit::where('kontak_person', $request->kontak_person)->first();

        return view('kunjungan.status', compact('kunjungan'));
    }

    /**
     * Menampilkan daftar semua pendaftar kunjungan untuk admin
     */
    public function adminIndex()
    {
        $data = Visit::all();
        $total = $data->count();
        $approved = $data->where('status', 'disetujui')->count();
        $rejected = $data->where('status', 'ditolak')->count();

        // Data untuk grafik kunjungan per bulan
        $grouped = $data->groupBy(function ($item) {
            return Carbon::parse($item->tanggal_kunjungan)->format('F');
        });

        $chartLabels = $grouped->keys();
        $chartData = $grouped->map(function ($items) {
            return count($items);
        })->values();

        return view('kunjungan.admin', compact(
            'data',
            'total',
            'approved',
            'rejected',
            'chartLabels',
            'chartData'
        ));
    }
}
