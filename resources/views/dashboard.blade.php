<x-layouts.admin>

    <div class="mb-6 flex justify-between items-center">
        <div>
            <h2 class="text-2xl font-bold text-slate-800">Dashboard</h2>
            <p class="text-slate-600">Selamat datang kembali, {{ Auth::user()->name }}!</p>
        </div>
        <a href="{{ route('home') }}" target="_blank"
            class="px-4 py-2 bg-white border border-slate-300 rounded-lg text-slate-600 text-sm font-medium hover:bg-slate-50 transition">
            Lihat Website
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-emerald-500">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-slate-500 text-sm font-medium uppercase">Total Penduduk</h3>
                <span class="p-2 bg-emerald-100 text-emerald-600 rounded-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                        </path>
                    </svg>
                </span>
            </div>
            <p class="text-3xl font-bold text-slate-800">3,450</p>
            <p class="text-xs text-emerald-600 mt-2 font-medium">+12 bulan ini</p>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-blue-500">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-slate-500 text-sm font-medium uppercase">Permohonan Surat</h3>
                <span class="p-2 bg-blue-100 text-blue-600 rounded-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                        </path>
                    </svg>
                </span>
            </div>
            <p class="text-3xl font-bold text-slate-800">15</p>
            <p class="text-xs text-blue-600 mt-2 font-medium">Perlu diproses</p>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-amber-500">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-slate-500 text-sm font-medium uppercase">Berita & Artikel</h3>
                <span class="p-2 bg-amber-100 text-amber-600 rounded-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                        </path>
                    </svg>
                </span>
            </div>
            <p class="text-3xl font-bold text-slate-800">0</p>
            <p class="text-xs text-slate-400 mt-2">Total postingan</p>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm p-6">
        <h3 class="text-lg font-bold text-slate-800 mb-4">Aktivitas Terbaru</h3>
        <p class="text-slate-500">Belum ada aktivitas.</p>
    </div>

</x-layouts.admin>
