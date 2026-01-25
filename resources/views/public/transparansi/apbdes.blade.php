<x-layouts.public>
    <x-public.header-breadcrumb title="APBDes Tahun 2024" :links="['Transparansi' => '#', 'APBDes' => null]" />

    <div class="bg-slate-50 py-16 min-h-screen">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                <div class="bg-white p-6 rounded-2xl shadow-sm border-l-4 border-emerald-500">
                    <p class="text-slate-500 text-sm font-bold uppercase">Total Pendapatan</p>
                    <h3 class="text-2xl font-bold text-slate-800 mt-1">Rp 1.850.000.000</h3>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border-l-4 border-amber-500">
                    <p class="text-slate-500 text-sm font-bold uppercase">Total Belanja</p>
                    <h3 class="text-2xl font-bold text-slate-800 mt-1">Rp 1.820.000.000</h3>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border-l-4 border-blue-500">
                    <p class="text-slate-500 text-sm font-bold uppercase">Surplus / Defisit</p>
                    <h3 class="text-2xl font-bold text-blue-600 mt-1">+ Rp 30.000.000</h3>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-lg border border-slate-100 p-8 mb-10">
                <h3 class="text-xl font-bold text-slate-800 mb-6 flex items-center">
                    <span class="w-2 h-8 bg-emerald-500 rounded mr-3"></span>
                    Sumber Pendapatan Desa
                </h3>

                <div class="space-y-6">
                    <div>
                        <div class="flex justify-between mb-2">
                            <span class="font-medium text-slate-700">Dana Desa (DD)</span>
                            <span class="font-bold text-slate-800">Rp 950.000.000</span>
                        </div>
                        <div class="w-full bg-slate-100 rounded-full h-4">
                            <div class="bg-emerald-500 h-4 rounded-full" style="width: 55%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-between mb-2">
                            <span class="font-medium text-slate-700">Alokasi Dana Desa (ADD)</span>
                            <span class="font-bold text-slate-800">Rp 450.000.000</span>
                        </div>
                        <div class="w-full bg-slate-100 rounded-full h-4">
                            <div class="bg-emerald-400 h-4 rounded-full" style="width: 30%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-between mb-2">
                            <span class="font-medium text-slate-700">Pendapatan Asli Desa (PADes)</span>
                            <span class="font-bold text-slate-800">Rp 150.000.000</span>
                        </div>
                        <div class="w-full bg-slate-100 rounded-full h-4">
                            <div class="bg-emerald-300 h-4 rounded-full" style="width: 15%"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-lg border border-slate-100 p-8">
                <h3 class="text-xl font-bold text-slate-800 mb-6 flex items-center">
                    <span class="w-2 h-8 bg-amber-500 rounded mr-3"></span>
                    Rencana Belanja Desa
                </h3>

                <div class="space-y-6">
                    <div>
                        <div class="flex justify-between mb-2">
                            <span class="font-medium text-slate-700">Penyelenggaraan Pemerintahan</span>
                            <span class="font-bold text-slate-800">Rp 520.000.000</span>
                        </div>
                        <div class="w-full bg-slate-100 rounded-full h-4">
                            <div class="bg-amber-500 h-4 rounded-full" style="width: 30%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-between mb-2">
                            <span class="font-medium text-slate-700">Pembangunan Desa</span>
                            <span class="font-bold text-slate-800">Rp 800.000.000</span>
                        </div>
                        <div class="w-full bg-slate-100 rounded-full h-4">
                            <div class="bg-amber-400 h-4 rounded-full" style="width: 50%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-between mb-2">
                            <span class="font-medium text-slate-700">Pembinaan Kemasyarakatan</span>
                            <span class="font-bold text-slate-800">Rp 200.000.000</span>
                        </div>
                        <div class="w-full bg-slate-100 rounded-full h-4">
                            <div class="bg-amber-300 h-4 rounded-full" style="width: 12%"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-layouts.public>
