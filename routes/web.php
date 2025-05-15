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

Route::get('/kunjungan/daftar', [VisitController::class, 'form']);
Route::post('/kunjungan/daftar', [VisitController::class, 'submit'])->name('kunjungan.submit');
Route::get('/kunjungan/status', [VisitController::class, 'statusForm']);
Route::post('/kunjungan/status', [VisitController::class, 'statusCheck'])->name('kunjungan.status');

/*
|--------------------------------------------------------------------------
| PKL - Pendaftaran & Status
|--------------------------------------------------------------------------
*/

Route::get('/pendaftaran-pkl', [InternshipController::class, 'form']);
Route::post('/pendaftaran-pkl', [InternshipController::class, 'submit'])->name('pendaftaran.submit');
Route::get('/status-pkl', [InternshipController::class, 'statusForm']);
Route::post('/status-pkl', [InternshipController::class, 'statusCheck'])->name('status.pkl');

/*
|--------------------------------------------------------------------------
| Dashboard dan Profile (Breeze)
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

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

// Dashboard admin dinamis
Route::middleware(['auth'])->get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

// Kelola user - hanya superadmin
Route::middleware(['auth', 'checkRole:superadmin'])->get('/admin/users', function () {
    return view('admin.users');
});

// Data PKL - superadmin & admin_pkl
Route::middleware(['auth', 'checkRole:superadmin,admin_pkl'])->get('/admin/pkl', [InternshipController::class, 'adminIndex']);

// Data Kunjungan - superadmin & admin_kunjungan
Route::middleware(['auth', 'checkRole:superadmin,admin_kunjungan'])->get('/admin/kunjungan', [VisitController::class, 'adminIndex']);
