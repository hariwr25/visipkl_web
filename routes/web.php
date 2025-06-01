<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisitController;
use App\Http\Controllers\InternshipController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Routing Autentikasi Breeze
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| Halaman Umum (Landing Page)
|--------------------------------------------------------------------------
*/
Route::get('/', fn () => view('home'));
Route::get('/kunjungan', fn () => view('kunjungan.index'));
Route::get('/pkl', fn () => view('internship.index'));

/*
|--------------------------------------------------------------------------
| Kunjungan - Pendaftaran & Status
|--------------------------------------------------------------------------
*/
// Form pendaftaran kunjungan (GET)
Route::get('/kunjungan/daftar', [VisitController::class, 'form']);
// Submit form pendaftaran kunjungan (POST)
Route::post('/kunjungan/daftar', [VisitController::class, 'submit'])->name('kunjungan.submit');
// Form cek status kunjungan (GET)
Route::get('/kunjungan/status', [VisitController::class, 'statusForm']);
// Submit cek status kunjungan (POST)
Route::post('/kunjungan/status', [VisitController::class, 'statusCheck'])->name('kunjungan.status');

/*
|--------------------------------------------------------------------------
| Internship (PKL) - Pendaftaran & Status
|--------------------------------------------------------------------------
*/
Route::prefix('internship')->group(function () {
    Route::get('/form_pendaftaran', [InternshipController::class, 'form']);
    Route::post('/form_pendaftaran', [InternshipController::class, 'submit'])->name('pendaftaran.submit');
    Route::get('/internship/status', [InternshipController::class, 'statusForm']);
    Route::post('/internship/status', [InternshipController::class, 'statusCheck'])->name('status.pkl');

    // ✅ Tambahkan baris ini untuk URL /internship/status_pkl
    Route::get('/status_pkl', [InternshipController::class, 'statusForm']);
});

/*
|--------------------------------------------------------------------------
| Dashboard dan Profile (Breeze)
|--------------------------------------------------------------------------
*/
// Halaman dashboard, harus login dan email sudah verified
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Group route profile dengan middleware auth
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Admin Area (Role-Based Access Control)
|--------------------------------------------------------------------------
*/
// Dashboard admin, harus login
Route::middleware(['auth'])->get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

// Halaman user admin, hanya untuk superadmin
Route::middleware(['auth', 'checkRole:superadmin'])->get('/admin/users', function () {
    return view('admin.users');
});

// Halaman admin PKL, untuk superadmin dan admin_pkl
Route::middleware(['auth', 'checkRole:superadmin,admin_pkl'])->get('/admin/pkl', [InternshipController::class, 'adminIndex']);

// Halaman admin kunjungan, untuk superadmin dan admin_kunjungan
Route::middleware(['auth', 'checkRole:superadmin,admin_kunjungan'])->get('/admin/kunjungan', [VisitController::class, 'adminIndex']);
