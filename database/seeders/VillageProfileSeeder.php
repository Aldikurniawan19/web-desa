<?php

namespace Database\Seeders;

use App\Models\VillageProfile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VillageProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VillageProfile::create([
            'history_description' => 'Desa Maju pertama kali dibuka pada tahun 1945 oleh tokoh masyarakat yang bernama Ki Ageng Pamanahan. Pada awalnya, wilayah ini merupakan hutan belantara yang subur. Nama "Maju" diambil dari semangat para pendiri desa yang menginginkan wilayah ini terus berkembang seiring zaman.',
            'history_image' => null,
            'vision' => 'Terwujudnya Desa Maju yang Mandiri, Sejahtera, Agamis, dan Berbasis Teknologi Informasi.',
            'missions' => [
                'Meningkatkan kualitas pelayanan publik melalui digitalisasi.',
                'Mengembangkan potensi ekonomi lokal melalui UMKM.',
                'Mewujudkan infrastruktur desa yang merata.',
                'Meningkatkan kualitas SDM yang berakhlak mulia.'
            ],
        ]);
    }
}
