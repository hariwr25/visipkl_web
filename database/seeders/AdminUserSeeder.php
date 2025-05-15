<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        // Superadmin
        User::updateOrCreate([
            'email' => 'superadmin@example.com',
        ], [
            'name' => 'Super Admin',
            'password' => Hash::make('password'),
            'role' => 'superadmin',
        ]);

        // Admin PKL
        User::updateOrCreate([
            'email' => 'adminpkl@example.com',
        ], [
            'name' => 'Admin PKL',
            'password' => Hash::make('password'),
            'role' => 'admin_pkl',
        ]);

        // Admin Kunjungan
        User::updateOrCreate([
            'email' => 'adminkunjungan@example.com',
        ], [
            'name' => 'Admin Kunjungan',
            'password' => Hash::make('password'),
            'role' => 'admin_kunjungan',
        ]);
    }
}
