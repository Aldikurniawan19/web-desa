<?php

namespace Database\Seeders;

use App\Models\Staff;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Level 1: Kepala Desa
        Staff::create([
            'name' => 'Bapak H. Sutrisno',
            'position' => 'Kepala Desa',
            'level' => 1,
            'image' => null, // Nanti admin bisa upload foto asli
        ]);

        // Level 2: Pimpinan Harian
        Staff::create([
            'name' => 'Siti Aminah, S.Pd',
            'position' => 'Sekretaris Desa',
            'nip' => '19850101 201001 2 001',
            'level' => 2,
        ]);

        Staff::create([
            'name' => 'Budi Santoso, SE',
            'position' => 'Kaur Keuangan',
            'nip' => '19900505 201503 1 002',
            'level' => 2,
        ]);

        // Level 3: Pelaksana Teknis
        $staffs = [
            ['Ahmad Rizki', 'Kasi Pemerintahan'],
            ['Rina Wati', 'Kasi Kesejahteraan'],
            ['Doni Pratama', 'Kaur Umum'],
            ['Eko Saputra', 'Kaur Perencanaan'],
        ];

        foreach ($staffs as $s) {
            Staff::create([
                'name' => $s[0],
                'position' => $s[1],
                'level' => 3,
            ]);
        }
    }
}
