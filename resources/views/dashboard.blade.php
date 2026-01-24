<x-layouts.admin>

    <div class="mb-8 flex flex-col md:flex-row justify-between md:items-center gap-4">
        <div>
            <h2 class="text-2xl font-bold text-slate-800">Dashboard</h2>
            <p class="text-slate-600">Selamat datang kembali, <span
                    class="font-semibold text-emerald-600">{{ Auth::user()->name }}</span>!</p>
        </div>
        <a href="{{ route('home') }}" target="_blank"
            class="inline-flex items-center px-4 py-2 bg-white border border-slate-300 rounded-lg text-slate-600 text-sm font-medium hover:bg-slate-50 hover:text-emerald-600 transition shadow-sm">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
            </svg>
            Lihat Website
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

        <div class="bg-white rounded-2xl shadow-sm p-6 border border-slate-100 flex items-center justify-between">
            <div>
                <p class="text-sm font-bold text-slate-400 uppercase tracking-wider">Total Warga</p>
                <p class="text-3xl font-bold text-slate-800 mt-1">{{ $total_warga }}</p>
                <p class="text-xs text-emerald-600 mt-2 font-medium flex items-center">
                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    Data Terdaftar
                </p>
            </div>
            <div class="p-4 bg-emerald-50 text-emerald-600 rounded-2xl">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                    </path>
                </svg>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm p-6 border border-slate-100 flex items-center justify-between">
            <div>
                <p class="text-sm font-bold text-slate-400 uppercase tracking-wider">Permohonan Surat</p>
                <p class="text-3xl font-bold text-slate-800 mt-1">{{ $surat_pending }}</p>
                <p class="text-xs text-blue-600 mt-2 font-medium flex items-center">
                    @if ($surat_pending > 0)
                        <span class="animate-pulse w-2 h-2 bg-blue-500 rounded-full mr-2"></span>
                        Perlu Segera Diproses
                    @else
                        Semua aman terkendali
                    @endif
                </p>
            </div>
            <div class="p-4 bg-blue-50 text-blue-600 rounded-2xl relative">
                @if ($surat_pending > 0)
                    <span class="absolute top-0 right-0 -mt-1 -mr-1 flex h-3 w-3">
                        <span
                            class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-3 w-3 bg-red-500"></span>
                    </span>
                @endif
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                    </path>
                </svg>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm p-6 border border-slate-100 flex items-center justify-between">
            <div>
                <p class="text-sm font-bold text-slate-400 uppercase tracking-wider">Artikel & Berita</p>
                <p class="text-3xl font-bold text-slate-800 mt-1">{{ $total_berita }}</p>
                <p class="text-xs text-slate-400 mt-2 font-medium">Total postingan publik</p>
            </div>
            <div class="p-4 bg-amber-50 text-amber-600 rounded-2xl">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                    </path>
                </svg>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-slate-50 flex justify-between items-center">
            <h3 class="text-lg font-bold text-slate-800">Permohonan Surat Terbaru</h3>
            <a href="{{ route('admin.letters.index') }}"
                class="text-sm text-emerald-600 font-bold hover:underline">Lihat Semua</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-slate-500">
                <thead class="bg-slate-50 text-xs uppercase font-bold text-slate-400">
                    <tr>
                        <th class="px-6 py-3">Pemohon</th>
                        <th class="px-6 py-3">Jenis Surat</th>
                        <th class="px-6 py-3">Tanggal</th>
                        <th class="px-6 py-3 text-right">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($latest_letters as $letter)
                        <tr class="hover:bg-slate-50/50 transition">
                            <td class="px-6 py-3 font-medium text-slate-800">{{ $letter->user->name }}</td>
                            <td class="px-6 py-3">{{ $letter->type }}</td>
                            <td class="px-6 py-3 text-slate-400">{{ $letter->created_at->diffForHumans() }}</td>
                            <td class="px-6 py-3 text-right">
                                @if ($letter->status == 'pending')
                                    <span
                                        class="px-2 py-1 bg-amber-50 text-amber-600 rounded text-xs font-bold">Menunggu</span>
                                @elseif($letter->status == 'processed')
                                    <span
                                        class="px-2 py-1 bg-blue-50 text-blue-600 rounded text-xs font-bold">Diproses</span>
                                @elseif($letter->status == 'completed')
                                    <span
                                        class="px-2 py-1 bg-emerald-50 text-emerald-600 rounded text-xs font-bold">Selesai</span>
                                @else
                                    <span
                                        class="px-2 py-1 bg-red-50 text-red-600 rounded text-xs font-bold">Ditolak</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-8 text-center text-slate-400">Belum ada aktivitas terbaru.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</x-layouts.admin>
