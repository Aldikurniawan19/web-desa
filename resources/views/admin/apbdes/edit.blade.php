<x-layouts.admin>
    <div class="mb-6 flex items-center gap-3">
        <a href="{{ route('admin.apbdes.index') }}"
            class="p-2 bg-white rounded-lg border border-slate-200 text-slate-500 hover:text-emerald-600 hover:border-emerald-300 transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
                </path>
            </svg>
        </a>
        <h2 class="text-2xl font-bold text-slate-800">Edit Data APBDes {{ $apbdes->tahun }}</h2>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-slate-100 p-6">
        <form action="{{ route('admin.apbdes.update', $apbdes->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-6">
                <label class="block font-bold text-slate-700 mb-2">Tahun Anggaran</label>
                <input type="number" name="tahun" value="{{ old('tahun', $apbdes->tahun) }}"
                    class="w-full max-w-xs border-slate-200 rounded-lg bg-slate-50 font-bold text-slate-600" required>
                @error('tahun')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                <div class="bg-emerald-50 p-6 rounded-xl border border-emerald-100">
                    <h3 class="font-bold text-emerald-800 mb-4 border-b border-emerald-200 pb-2 flex justify-between">
                        A. PENDAPATAN DESA
                        <span class="text-xs font-normal opacity-70">(Input Angka Tanpa Titik)</span>
                    </h3>

                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-slate-600 mb-1">Dana Desa (DD)</label>
                            <input type="number" name="pendapatan_dd"
                                value="{{ old('pendapatan_dd', $apbdes->pendapatan_dd) }}"
                                class="w-full border-slate-200 rounded-lg text-right font-mono focus:border-emerald-500 focus:ring-emerald-200"
                                required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-600 mb-1">Alokasi Dana Desa (ADD)</label>
                            <input type="number" name="pendapatan_add"
                                value="{{ old('pendapatan_add', $apbdes->pendapatan_add) }}"
                                class="w-full border-slate-200 rounded-lg text-right font-mono focus:border-emerald-500 focus:ring-emerald-200"
                                required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-600 mb-1">Pendapatan Asli Desa
                                (PADes)</label>
                            <input type="number" name="pendapatan_pades"
                                value="{{ old('pendapatan_pades', $apbdes->pendapatan_pades) }}"
                                class="w-full border-slate-200 rounded-lg text-right font-mono focus:border-emerald-500 focus:ring-emerald-200"
                                required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-600 mb-1">Pendapatan Lain-Lain</label>
                            <input type="number" name="pendapatan_lain"
                                value="{{ old('pendapatan_lain', $apbdes->pendapatan_lain) }}"
                                class="w-full border-slate-200 rounded-lg text-right font-mono focus:border-emerald-500 focus:ring-emerald-200"
                                required>
                        </div>
                    </div>
                </div>

                <div class="bg-amber-50 p-6 rounded-xl border border-amber-100">
                    <h3 class="font-bold text-amber-800 mb-4 border-b border-amber-200 pb-2 flex justify-between">
                        B. BELANJA DESA
                        <span class="text-xs font-normal opacity-70">(Input Angka Tanpa Titik)</span>
                    </h3>

                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-slate-600 mb-1">Bidang Pemerintahan</label>
                            <input type="number" name="belanja_pemerintahan"
                                value="{{ old('belanja_pemerintahan', $apbdes->belanja_pemerintahan) }}"
                                class="w-full border-slate-200 rounded-lg text-right font-mono focus:border-amber-500 focus:ring-amber-200"
                                required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-600 mb-1">Bidang Pembangunan</label>
                            <input type="number" name="belanja_pembangunan"
                                value="{{ old('belanja_pembangunan', $apbdes->belanja_pembangunan) }}"
                                class="w-full border-slate-200 rounded-lg text-right font-mono focus:border-amber-500 focus:ring-amber-200"
                                required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-600 mb-1">Bidang Kemasyarakatan</label>
                            <input type="number" name="belanja_kemasyarakatan"
                                value="{{ old('belanja_kemasyarakatan', $apbdes->belanja_kemasyarakatan) }}"
                                class="w-full border-slate-200 rounded-lg text-right font-mono focus:border-amber-500 focus:ring-amber-200"
                                required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-600 mb-1">Bidang Pemberdayaan &
                                Darurat</label>
                            <input type="number" name="belanja_pemberdayaan"
                                value="{{ old('belanja_pemberdayaan', $apbdes->belanja_pemberdayaan) }}"
                                class="w-full border-slate-200 rounded-lg text-right font-mono focus:border-amber-500 focus:ring-amber-200"
                                required>
                        </div>
                    </div>
                </div>

            </div>

            <div class="mt-8 flex justify-end gap-4">
                <a href="{{ route('admin.apbdes.index') }}"
                    class="px-6 py-3 bg-slate-100 text-slate-600 rounded-lg font-bold hover:bg-slate-200 transition">Batal</a>
                <button type="submit"
                    class="bg-blue-600 text-white px-6 py-3 rounded-lg font-bold hover:bg-blue-700 transition shadow-lg shadow-blue-200">Simpan
                    Perubahan</button>
            </div>
        </form>
    </div>
</x-layouts.admin>
