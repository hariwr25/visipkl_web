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
| Internship (PKL) - Pendaftaran & Status
|--------------------------------------------------------------------------
*/
Route::prefix('internship')->group(function () {
    Route::get('/form_pendaftaran', [InternshipController::class, 'form']);
    Route::post('/form_pendaftaran', [InternshipController::class, 'submit'])->name('pendaftaran.submit');
    Route::get('/status', [InternshipController::class, 'statusForm']);
    Route::post('/status', [InternshipController::class, 'statusCheck'])->name('status.pkl');
});


/*
|--------------------------------------------------------------------------
| Dashboard - Redirect Sesuai Role
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    $user = auth()->user();

    if ($user->role === 'superadmin') {
        return redirect()->route('admin.dashboard');
    } elseif ($user->role === 'admin_pkl') {
        return redirect()->route('admin.pkl');
    } elseif ($user->role === 'admin_kunjungan') {
        return redirect()->route('admin.kunjungan');
    }

    abort(403, 'Role tidak dikenali.');
})->middleware(['auth', 'verified'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Profile Settings (Breeze)
|--------------------------------------------------------------------------
*/
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
// Dashboard umum untuk superadmin
Route::middleware(['auth', 'checkRole:superadmin'])->get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

// Kelola user - hanya untuk superadmin
Route::middleware(['auth', 'checkRole:superadmin'])->get('/admin/users', function () {
    return view('admin.users');
})->name('admin.users');

// Halaman admin PKL - untuk superadmin & admin_pkl
Route::middleware(['auth', 'checkRole:superadmin,admin_pkl'])->get('/admin/pkl', [InternshipController::class, 'adminIndex'])->name('admin.pkl');

// Halaman admin kunjungan - untuk superadmin & admin_kunjungan
Route::middleware(['auth', 'checkRole:superadmin,admin_kunjungan'])->get('/admin/kunjungan', [VisitController::class, 'adminIndex'])->name('admin.kunjungan');
