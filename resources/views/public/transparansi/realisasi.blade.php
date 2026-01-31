<x-layouts.public>
    <x-public.header-breadcrumb title="Realisasi Anggaran" :links="['Transparansi' => '#', 'Realisasi' => null]" />

    <div class="bg-slate-50 py-16 min-h-screen">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            @if (!$data)
                <div class="bg-white p-10 rounded-2xl shadow-sm text-center">
                    <p class="text-slate-500">Data Realisasi Anggaran belum tersedia.</p>
                </div>
            @else
                <div
                    class="bg-blue-600 rounded-2xl p-8 text-white mb-10 shadow-lg shadow-blue-200 relative overflow-hidden">
                    <div class="relative z-10">
                        <h2 class="text-2xl font-bold">Progress Penyerapan Anggaran Tahun {{ $data->tahun }}</h2>
                        <p class="opacity-80 mt-1">Update Data Terakhir:
                            {{ $data->updated_at->translatedFormat('d F Y') }}</p>
                    </div>
                    <div class="absolute right-0 top-0 h-full w-1/3 bg-gradient-to-l from-white/10 to-transparent"></div>
                </div>

                <div class="grid grid-cols-1 gap-6">

                    @php
                        // Kita buat array manual agar kodingan lebih rapi dan tidak berulang-ulang
                        $items = [
                            [
                                'label' => 'Bidang 1',
                                'title' => 'Penyelenggaraan Pemerintahan',
                                'color' => 'emerald', // Hijau
                                'anggaran' => $data->belanja_pemerintahan,
                                'realisasi' => $data->realisasi_pemerintahan,
                                'persen' => $data->getPersen('pemerintahan'),
                            ],
                            [
                                'label' => 'Bidang 2',
                                'title' => 'Pelaksanaan Pembangunan Desa',
                                'color' => 'blue', // Biru
                                'anggaran' => $data->belanja_pembangunan,
                                'realisasi' => $data->realisasi_pembangunan,
                                'persen' => $data->getPersen('pembangunan'),
                            ],
                            [
                                'label' => 'Bidang 3',
                                'title' => 'Pembinaan Kemasyarakatan',
                                'color' => 'amber', // Kuning/Oranye
                                'anggaran' => $data->belanja_kemasyarakatan,
                                'realisasi' => $data->realisasi_kemasyarakatan,
                                'persen' => $data->getPersen('kemasyarakatan'),
                            ],
                            [
                                'label' => 'Bidang 4 & 5',
                                'title' => 'Pemberdayaan & Penanggulangan Bencana',
                                'color' => 'purple', // Ungu
                                'anggaran' => $data->belanja_pemberdayaan,
                                'realisasi' => $data->realisasi_pemberdayaan,
                                'persen' => $data->getPersen('pemberdayaan'),
                            ],
                        ];
                    @endphp

                    @foreach ($items as $item)
                        <div
                            class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 transition hover:-translate-y-1 duration-300">
                            <div class="flex justify-between items-end mb-4">
                                <div>
                                    <span
                                        class="px-3 py-1 bg-{{ $item['color'] }}-50 text-{{ $item['color'] }}-600 rounded-lg text-xs font-bold uppercase tracking-wide">
                                        {{ $item['label'] }}
                                    </span>
                                    <h3 class="text-lg font-bold text-slate-800 mt-2">{{ $item['title'] }}</h3>
                                </div>
                                <div class="text-right">
                                    <span
                                        class="text-3xl font-bold text-{{ $item['color'] }}-600">{{ $item['persen'] }}%</span>
                                    <p class="text-xs text-slate-400">Terealisasi</p>
                                </div>
                            </div>

                            <div class="w-full bg-slate-100 rounded-full h-3 mb-4 overflow-hidden">
                                <div class="bg-{{ $item['color'] }}-500 h-3 rounded-full shadow-[0_0_10px_rgba(0,0,0,0.2)] transition-all duration-1000 ease-out"
                                    style="width: {{ $item['persen'] }}%">
                                </div>
                            </div>

                            <div class="grid grid-cols-2 text-sm pt-4 border-t border-slate-50">
                                <div>
                                    <span class="block text-slate-400 text-xs uppercase font-bold">Anggaran</span>
                                    <span class="font-bold text-slate-700">Rp
                                        {{ number_format($item['anggaran'], 0, ',', '.') }}</span>
                                </div>
                                <div class="text-right">
                                    <span class="block text-slate-400 text-xs uppercase font-bold">Realisasi</span>
                                    <span class="font-bold text-slate-700">Rp
                                        {{ number_format($item['realisasi'], 0, ',', '.') }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            @endif

        </div>
    </div>
</x-layouts.public>
