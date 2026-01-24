<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

class PemerintahanController extends Controller
{
    public function struktur()
    {
        $kades = Staff::where('level', 1)->first();
        $pimpinan = Staff::where('level', 2)->get();
        $staff = Staff::where('level', 3)->get();

        return view('public.pemerintahan.struktur', compact('kades', 'pimpinan', 'staff'));
    }

    public function perangkat()
    {
        return view('public.pemerintahan.perangkat');
    }

    public function lembaga()
    {
        // Data Dummy Lembaga (Bisa dipindah ke Database nanti)
        $lembaga = [
            [
                'name' => 'BPD',
                'fullname' => 'Badan Permusyawaratan Desa',
                'desc' => 'Lembaga perwujudan demokrasi dalam penyelenggaraan pemerintahan desa.',
                'ketua' => 'Bapak H. Suwandi',
                'icon' => 'users', // Heroicon name
                'color' => 'blue'
            ],
            [
                'name' => 'LPM',
                'fullname' => 'Lembaga Pemberdayaan Masyarakat',
                'desc' => 'Wadah partisipasi masyarakat dalam pembangunan desa.',
                'ketua' => 'Bapak Rudi Hartono',
                'icon' => 'hand-raised',
                'color' => 'emerald'
            ],
            [
                'name' => 'PKK',
                'fullname' => 'Pemberdayaan Kesejahteraan Keluarga',
                'desc' => 'Gerakan nasional dalam pembangunan masyarakat yang tumbuh dari bawah.',
                'ketua' => 'Ibu Hj. Siti Aminah',
                'icon' => 'heart',
                'color' => 'rose' // Pink/Merah
            ],
            [
                'name' => 'Karang Taruna',
                'fullname' => 'Tunas Muda Harapan',
                'desc' => 'Organisasi sosial wadah pengembangan generasi muda desa.',
                'ketua' => 'Sdr. Dimas Anggara',
                'icon' => 'fire',
                'color' => 'orange'
            ],
            [
                'name' => 'Linmas',
                'fullname' => 'Perlindungan Masyarakat',
                'desc' => 'Satuan perlindungan masyarakat untuk ketertiban dan keamanan.',
                'ketua' => 'Bapak Joko Susilo',
                'icon' => 'shield-check',
                'color' => 'slate'
            ],
            [
                'name' => 'BUMDes',
                'fullname' => 'Badan Usaha Milik Desa',
                'desc' => 'Lembaga usaha desa yang bergerak dalam pengelolaan aset dan ekonomi.',
                'ketua' => 'Ibu Rina Wati',
                'icon' => 'building-storefront',
                'color' => 'indigo'
            ],
        ];

        return view('public.pemerintahan.lembaga', compact('lembaga'));
    }
}
