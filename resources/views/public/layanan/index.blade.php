<x-layouts.public>
    <div class="bg-slate-50/50 min-h-screen py-12" x-data="{ activeTab: 'surat' }">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-8">
                <div>
                    <h1 class="text-3xl font-bold text-slate-800">Layanan Mandiri</h1>
                    <p class="text-slate-500 mt-1">Pantau status surat dan pengaduan Anda dalam satu tempat.</p>
                </div>

                <div class="flex flex-wrap gap-3">
                    <a href="{{ route('layanan.create') }}"
                        class="flex-1 md:flex-none inline-flex justify-center items-center px-5 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white font-bold rounded-xl shadow-lg shadow-emerald-200 transition transform hover:-translate-y-0.5 text-sm">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                        Ajukan Surat
                    </a>
                    <a href="{{ route('layanan.pengaduan') }}"
                        class="flex-1 md:flex-none inline-flex justify-center items-center px-5 py-2.5 bg-white border border-slate-200 hover:border-emerald-500 text-slate-600 hover:text-emerald-600 font-bold rounded-xl shadow-sm transition text-sm">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z">
                            </path>
                        </svg>
                        Buat Pengaduan
                    </a>
                </div>
            </div>

            <div class="mb-8 border-b border-slate-200 overflow-x-auto">
                <nav class="flex space-x-8 min-w-max" aria-label="Tabs">
                    <button @click="activeTab = 'surat'"
                        :class="activeTab === 'surat' ? 'border-emerald-500 text-emerald-600' :
                            'border-transparent text-slate-500 hover:text-slate-700 hover:border-slate-300'"
                        class="whitespace-nowrap py-4 px-1 border-b-2 font-bold text-sm transition-colors flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                        Riwayat Surat
                        <span
                            class="ml-2 bg-slate-100 text-slate-600 py-0.5 px-2.5 rounded-full text-xs">{{ $letters->total() }}</span>
                    </button>

                    <button @click="activeTab = 'aduan'"
                        :class="activeTab === 'aduan' ? 'border-emerald-500 text-emerald-600' :
                            'border-transparent text-slate-500 hover:text-slate-700 hover:border-slate-300'"
                        class="whitespace-nowrap py-4 px-1 border-b-2 font-bold text-sm transition-colors flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z">
                            </path>
                        </svg>
                        Riwayat Pengaduan
                        <span
                            class="ml-2 bg-slate-100 text-slate-600 py-0.5 px-2.5 rounded-full text-xs">{{ $complaints->total() }}</span>
                    </button>
                </nav>
            </div>

            <div x-show="activeTab === 'surat'" x-transition.opacity.duration.300ms>

                <div class="hidden md:block bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm text-slate-600">
                            <thead
                                class="bg-slate-50 border-b border-slate-100 uppercase tracking-wider text-xs font-semibold text-slate-500">
                                <tr>
                                    <th class="px-6 py-4">Jenis Surat</th>
                                    <th class="px-6 py-4">Tanggal</th>
                                    <th class="px-6 py-4">Status</th>
                                    <th class="px-6 py-4">Catatan</th>
                                    <th class="px-6 py-4 text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">
                                @forelse($letters as $letter)
                                    <tr class="hover:bg-slate-50/80 transition">
                                        <td class="px-6 py-4 font-bold text-slate-800">{{ $letter->type }}</td>
                                        <td class="px-6 py-4">
                                            <div class="text-slate-700 font-medium">
                                                {{ $letter->created_at->translatedFormat('d M Y') }}</div>
                                            <div class="text-xs text-slate-400">{{ $letter->created_at->format('H:i') }}
                                                WIB</div>
                                        </td>
                                        <td class="px-6 py-4">
                                            @if ($letter->status == 'pending')
                                                <span
                                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-amber-50 text-amber-600 border border-amber-100">Menunggu</span>
                                            @elseif($letter->status == 'processed')
                                                <span
                                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-blue-50 text-blue-600 border border-blue-100">Diproses</span>
                                            @elseif($letter->status == 'completed')
                                                <span
                                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-emerald-50 text-emerald-600 border border-emerald-100">Selesai</span>
                                            @elseif($letter->status == 'rejected')
                                                <span
                                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-red-50 text-red-600 border border-red-100">Ditolak</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-slate-500 italic text-xs">
                                            {{ $letter->admin_note ?? '-' }}</td>
                                        <td class="px-6 py-4 text-right">
                                            @if ($letter->status == 'completed')
                                                <a href="{{ route('layanan.surat.download', $letter->id) }}"
                                                    class="text-emerald-600 hover:text-emerald-700 font-bold text-sm inline-flex items-center gap-1 transition">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4-4m0 0l-4 4m4-4v12">
                                                        </path>
                                                    </svg>
                                                    Unduh
                                                </a>
                                            @else
                                                <span class="text-slate-300 text-xs">Detail</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-12 text-center text-slate-400">Belum ada
                                            pengajuan surat.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="md:hidden space-y-4">
                    @forelse($letters as $letter)
                        <div
                            class="bg-white p-5 rounded-2xl border border-slate-100 shadow-sm relative overflow-hidden">
                            <div
                                class="absolute left-0 top-0 bottom-0 w-1.5 {{ $letter->status == 'completed' ? 'bg-emerald-500' : ($letter->status == 'rejected' ? 'bg-red-500' : ($letter->status == 'processed' ? 'bg-blue-500' : 'bg-amber-500')) }}">
                            </div>

                            <div class="pl-2">
                                <div class="flex justify-between items-start mb-2">
                                    <h3 class="font-bold text-slate-800 text-lg leading-tight">{{ $letter->type }}</h3>
                                    @if ($letter->status == 'pending')
                                        <span
                                            class="px-2 py-1 rounded-lg bg-amber-50 text-amber-600 text-xs font-bold">Menunggu</span>
                                    @elseif($letter->status == 'processed')
                                        <span
                                            class="px-2 py-1 rounded-lg bg-blue-50 text-blue-600 text-xs font-bold">Diproses</span>
                                    @elseif($letter->status == 'completed')
                                        <span
                                            class="px-2 py-1 rounded-lg bg-emerald-50 text-emerald-600 text-xs font-bold">Selesai</span>
                                    @else
                                        <span
                                            class="px-2 py-1 rounded-lg bg-red-50 text-red-600 text-xs font-bold">Ditolak</span>
                                    @endif
                                </div>

                                <div class="text-sm text-slate-500 mb-4 flex items-center gap-2">
                                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    {{ $letter->created_at->translatedFormat('d F Y, H:i') }} WIB
                                </div>

                                @if ($letter->admin_note)
                                    <div
                                        class="bg-slate-50 p-3 rounded-lg text-xs text-slate-600 italic mb-4 border border-slate-100">
                                        <span
                                            class="font-bold text-slate-400 not-italic block text-[10px] uppercase mb-1">Catatan
                                            Admin:</span>
                                        "{{ $letter->admin_note }}"
                                    </div>
                                @endif

                                @if ($letter->status == 'completed')
                                    <a href="{{ route('layanan.surat.download', $letter->id) }}"
                                        class="flex items-center justify-center w-full py-2.5 bg-emerald-600 text-white rounded-lg text-sm font-bold shadow-md shadow-emerald-200 transition active:scale-95">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4 4m4-4v12">
                                            </path>
                                        </svg>
                                        Unduh Surat PDF
                                    </a>
                                @else
                                    <button disabled
                                        class="flex items-center justify-center w-full py-2.5 bg-slate-100 text-slate-400 rounded-lg text-sm font-bold cursor-not-allowed">
                                        {{ $letter->status == 'pending' ? 'Menunggu Verifikasi' : ($letter->status == 'processed' ? 'Sedang Diproses' : 'Ditolak') }}
                                    </button>
                                @endif
                            </div>
                        </div>
                    @empty
                        <div
                            class="text-center py-10 text-slate-400 bg-white rounded-2xl border border-slate-100 border-dashed">
                            Belum ada pengajuan surat.
                        </div>
                    @endforelse
                </div>

                <div class="p-4 md:border-t md:border-slate-100 mt-4">{{ $letters->links() }}</div>
            </div>

            <div x-show="activeTab === 'aduan'" x-transition.opacity.duration.300ms style="display: none;">

                <div class="hidden md:block bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm text-slate-600">
                            <thead
                                class="bg-slate-50 border-b border-slate-100 uppercase tracking-wider text-xs font-semibold text-slate-500">
                                <tr>
                                    <th class="px-6 py-4">Kode Tiket</th>
                                    <th class="px-6 py-4">Kategori & Judul</th>
                                    <th class="px-6 py-4">Tanggal</th>
                                    <th class="px-6 py-4">Status</th>
                                    <th class="px-6 py-4">Tanggapan Admin</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">
                                @forelse($complaints as $aduan)
                                    <tr class="hover:bg-slate-50/80 transition">
                                        <td class="px-6 py-4 font-mono font-bold text-slate-700">
                                            {{ $aduan->ticket_id }}</td>
                                        <td class="px-6 py-4">
                                            <span
                                                class="text-[10px] uppercase font-bold bg-slate-100 px-2 py-0.5 rounded text-slate-500 border border-slate-200">{{ $aduan->category }}</span>
                                            <div class="font-bold text-slate-800 mt-1 line-clamp-1">
                                                {{ $aduan->subject }}</div>
                                        </td>
                                        <td class="px-6 py-4 text-slate-600">
                                            {{ $aduan->created_at->translatedFormat('d M Y') }}</td>
                                        <td class="px-6 py-4">
                                            @if ($aduan->status == 'pending')
                                                <span
                                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-yellow-100 text-yellow-700">Menunggu</span>
                                            @elseif($aduan->status == 'processed')
                                                <span
                                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-blue-100 text-blue-700">Diproses</span>
                                            @elseif($aduan->status == 'completed')
                                                <span
                                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-emerald-100 text-emerald-700">Selesai</span>
                                            @else
                                                <span
                                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-red-100 text-red-700">Ditolak</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4">
                                            <span
                                                class="text-xs text-slate-500 italic">{{ Str::limit($aduan->admin_response ?? '- Belum ada -', 50) }}</span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-12 text-center text-slate-400">Belum ada
                                            riwayat pengaduan.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="md:hidden space-y-4">
                    @forelse($complaints as $aduan)
                        <div class="bg-white p-5 rounded-2xl border border-slate-100 shadow-sm relative">
                            <div class="flex justify-between items-start mb-3 border-b border-slate-50 pb-3">
                                <div>
                                    <span
                                        class="font-mono font-bold text-emerald-600 text-xs bg-emerald-50 px-2 py-1 rounded">{{ $aduan->ticket_id }}</span>
                                    <span
                                        class="text-[10px] text-slate-400 uppercase font-bold ml-2">{{ $aduan->category }}</span>
                                </div>
                                @if ($aduan->status == 'pending')
                                    <span
                                        class="text-[10px] font-bold text-yellow-600 bg-yellow-50 px-2 py-1 rounded">Menunggu</span>
                                @elseif($aduan->status == 'processed')
                                    <span
                                        class="text-[10px] font-bold text-blue-600 bg-blue-50 px-2 py-1 rounded">Diproses</span>
                                @elseif($aduan->status == 'completed')
                                    <span
                                        class="text-[10px] font-bold text-emerald-600 bg-emerald-50 px-2 py-1 rounded">Selesai</span>
                                @else
                                    <span
                                        class="text-[10px] font-bold text-red-600 bg-red-50 px-2 py-1 rounded">Ditolak</span>
                                @endif
                            </div>

                            <h3 class="font-bold text-slate-800 mb-2">{{ $aduan->subject }}</h3>
                            <div class="text-xs text-slate-400 mb-4 flex items-center gap-1">
                                <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                {{ $aduan->created_at->translatedFormat('d F Y') }}
                            </div>

                            @if ($aduan->admin_response)
                                <div class="bg-slate-50 p-3 rounded-lg border border-slate-100">
                                    <span class="text-[10px] font-bold text-slate-400 uppercase block mb-1">Tanggapan
                                        Admin:</span>
                                    <p class="text-xs text-slate-600 italic leading-relaxed">
                                        "{{ $aduan->admin_response }}"</p>
                                </div>
                            @else
                                <div class="bg-slate-50 p-3 rounded-lg border border-slate-100 text-center">
                                    <p class="text-xs text-slate-400 italic">Belum ada tanggapan dari admin.</p>
                                </div>
                            @endif
                        </div>
                    @empty
                        <div
                            class="text-center py-10 text-slate-400 bg-white rounded-2xl border border-slate-100 border-dashed">
                            Belum ada riwayat pengaduan.
                        </div>
                    @endforelse
                </div>

                <div class="p-4 md:border-t md:border-slate-100 mt-4">{{ $complaints->links() }}</div>
            </div>

        </div>
    </div>
</x-layouts.public>
