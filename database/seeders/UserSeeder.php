<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@example.com',
            'password' => Hash::make('password'),
            'role' => 'superadmin',
        ]);

        User::create([
            'name' => 'Admin PKL',
            'email' => 'adminpkl@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin_pkl',
        ]);

        User::create([
            'name' => 'Admin Kunjungan',
            'email' => 'adminkunjungan@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin_kunjungan',
        ]);
    }
}
