<x-layouts.admin>
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-slate-800">Input Data APBDes</h2>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-slate-100 p-6">
        <form action="{{ route('admin.apbdes.store') }}" method="POST">
            @csrf

            <div class="mb-6">
                <label class="block font-bold text-slate-700 mb-2">Tahun Anggaran</label>
                <input type="number" name="tahun" class="w-full max-w-xs border-slate-200 rounded-lg"
                    placeholder="Contoh: 2024" required>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                <div class="bg-emerald-50 p-6 rounded-xl border border-emerald-100">
                    <h3 class="font-bold text-emerald-800 mb-4 border-b border-emerald-200 pb-2">A. PENDAPATAN DESA</h3>

                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-slate-600 mb-1">Dana Desa (DD)</label>
                            <input type="number" name="pendapatan_dd"
                                class="w-full border-slate-200 rounded-lg text-right font-mono" placeholder="0"
                                required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-600 mb-1">Alokasi Dana Desa (ADD)</label>
                            <input type="number" name="pendapatan_add"
                                class="w-full border-slate-200 rounded-lg text-right font-mono" placeholder="0"
                                required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-600 mb-1">Pendapatan Asli Desa
                                (PADes)</label>
                            <input type="number" name="pendapatan_pades"
                                class="w-full border-slate-200 rounded-lg text-right font-mono" placeholder="0"
                                required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-600 mb-1">Pendapatan Lain-Lain</label>
                            <input type="number" name="pendapatan_lain"
                                class="w-full border-slate-200 rounded-lg text-right font-mono" placeholder="0"
                                required>
                        </div>
                    </div>
                </div>

                <div class="bg-amber-50 p-6 rounded-xl border border-amber-100">
                    <h3 class="font-bold text-amber-800 mb-4 border-b border-amber-200 pb-2">B. BELANJA DESA</h3>

                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-slate-600 mb-1">Bidang Pemerintahan</label>
                            <input type="number" name="belanja_pemerintahan"
                                class="w-full border-slate-200 rounded-lg text-right font-mono" placeholder="0"
                                required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-600 mb-1">Bidang Pembangunan</label>
                            <input type="number" name="belanja_pembangunan"
                                class="w-full border-slate-200 rounded-lg text-right font-mono" placeholder="0"
                                required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-600 mb-1">Bidang Kemasyarakatan</label>
                            <input type="number" name="belanja_kemasyarakatan"
                                class="w-full border-slate-200 rounded-lg text-right font-mono" placeholder="0"
                                required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-600 mb-1">Bidang Pemberdayaan &
                                Darurat</label>
                            <input type="number" name="belanja_pemberdayaan"
                                class="w-full border-slate-200 rounded-lg text-right font-mono" placeholder="0"
                                required>
                        </div>
                    </div>
                </div>

            </div>

            <div class="mt-8 flex justify-end">
                <button type="submit"
                    class="bg-blue-600 text-white px-6 py-3 rounded-lg font-bold hover:bg-blue-700 transition">Simpan
                    Data APBDes</button>
            </div>
        </form>
    </div>
</x-layouts.admin>
