<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Internship;

class InternshipController extends Controller
{
    /**
     * Menampilkan form pendaftaran PKL
     */
    public function form()
    {
        // View: resources/views/internship/form_pendaftaran.blade.php
        return view('internship.form');
    }

    /**
     * Menyimpan data pendaftaran PKL ke database
     */
    public function submit(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'instansi' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
        ]);

        Internship::create($request->only([
            'nama', 'email', 'instansi', 'tanggal_mulai', 'tanggal_selesai'
        ]));

        return back()->with('success', 'Pendaftaran PKL berhasil!');
    }

    /**
     * Menampilkan form untuk cek status pendaftaran PKL
     */
    public function statusForm()
    {
        // View: resources/views/internship/status_pkl.blade.php
        return view('internship.status');
    }

    /**
     * Menampilkan hasil pencarian status berdasarkan email
     */
    public function statusCheck(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $intern = Internship::where('email', $request->email)->first();

        return view('internship.status_pkl', compact('intern'));
    }

    /**
     * Menampilkan daftar semua pendaftar PKL untuk admin
     */
    public function adminIndex()
    {
        $data = Internship::all();
        return view('internship.admin', compact('data'));
    }
}
