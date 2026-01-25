<x-layouts.public>
    <x-public.header-breadcrumb title="Realisasi Anggaran" :links="['Transparansi' => '#', 'Realisasi' => null]" />

    <div class="bg-slate-50 py-16 min-h-screen">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="bg-blue-600 rounded-2xl p-8 text-white mb-10 shadow-lg shadow-blue-200">
                <h2 class="text-2xl font-bold">Progress Penyerapan Anggaran Tahun 2024</h2>
                <p class="opacity-80 mt-1">Data per tanggal {{ date('d F Y') }}</p>
            </div>

            <div class="grid grid-cols-1 gap-6">

                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
                    <div class="flex justify-between items-end mb-4">
                        <div>
                            <span
                                class="px-3 py-1 bg-blue-50 text-blue-600 rounded-lg text-xs font-bold uppercase tracking-wide">Bidang
                                2</span>
                            <h3 class="text-lg font-bold text-slate-800 mt-2">Pelaksanaan Pembangunan Desa</h3>
                        </div>
                        <div class="text-right">
                            <span class="text-3xl font-bold text-blue-600">75%</span>
                            <p class="text-xs text-slate-400">Terealisasi</p>
                        </div>
                    </div>

                    <div class="w-full bg-slate-100 rounded-full h-3 mb-4">
                        <div class="bg-blue-600 h-3 rounded-full shadow-[0_0_10px_rgba(37,99,235,0.5)]"
                            style="width: 75%"></div>
                    </div>

                    <div class="grid grid-cols-2 text-sm pt-4 border-t border-slate-50">
                        <div>
                            <span class="block text-slate-400 text-xs">Anggaran</span>
                            <span class="font-bold text-slate-700">Rp 800.000.000</span>
                        </div>
                        <div class="text-right">
                            <span class="block text-slate-400 text-xs">Realisasi</span>
                            <span class="font-bold text-slate-700">Rp 600.000.000</span>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
                    <div class="flex justify-between items-end mb-4">
                        <div>
                            <span
                                class="px-3 py-1 bg-emerald-50 text-emerald-600 rounded-lg text-xs font-bold uppercase tracking-wide">Bidang
                                1</span>
                            <h3 class="text-lg font-bold text-slate-800 mt-2">Penyelenggaraan Pemerintahan</h3>
                        </div>
                        <div class="text-right">
                            <span class="text-3xl font-bold text-emerald-600">90%</span>
                            <p class="text-xs text-slate-400">Terealisasi</p>
                        </div>
                    </div>

                    <div class="w-full bg-slate-100 rounded-full h-3 mb-4">
                        <div class="bg-emerald-600 h-3 rounded-full shadow-[0_0_10px_rgba(5,150,105,0.5)]"
                            style="width: 90%"></div>
                    </div>

                    <div class="grid grid-cols-2 text-sm pt-4 border-t border-slate-50">
                        <div>
                            <span class="block text-slate-400 text-xs">Anggaran</span>
                            <span class="font-bold text-slate-700">Rp 520.000.000</span>
                        </div>
                        <div class="text-right">
                            <span class="block text-slate-400 text-xs">Realisasi</span>
                            <span class="font-bold text-slate-700">Rp 468.000.000</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-layouts.public>
