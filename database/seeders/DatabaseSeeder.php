<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Admin Desa',
            'email' => 'admin@desa.id',
            'nik' => '001',
            'role' => 'admin',
            'password' => Hash::make('password'),
        ]);

        // Akun Kepala Desa
        User::create([
            'name' => 'Bapak Kades',
            'email' => 'kades@desa.id',
            'nik' => '002',
            'role' => 'kades',
            'password' => Hash::make('password'),
        ]);
    }
}
