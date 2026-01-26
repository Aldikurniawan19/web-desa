<x-layouts.admin>

    <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
        <div>
            <h2 class="text-2xl font-bold text-slate-800">Manajemen APBDes</h2>
            <p class="text-slate-500 text-sm">Kelola data transparansi anggaran desa per tahun.</p>
        </div>
        <a href="{{ route('admin.apbdes.create') }}"
            class="px-5 py-2.5 bg-emerald-600 text-white font-bold rounded-lg hover:bg-emerald-700 transition shadow-lg shadow-emerald-200 flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Input Data Baru
        </a>
    </div>

    @if (session('success'))
        <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-lg flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-xl shadow-sm border border-slate-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-slate-600">
                <thead
                    class="bg-slate-50 border-b border-slate-100 uppercase tracking-wider text-xs font-bold text-slate-500">
                    <tr>
                        <th class="px-6 py-4">Tahun Anggaran</th>
                        <th class="px-6 py-4 text-right">Total Pendapatan</th>
                        <th class="px-6 py-4 text-right">Total Belanja</th>
                        <th class="px-6 py-4 text-center">Surplus / (Defisit)</th>
                        <th class="px-6 py-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($apbdes as $data)
                        <tr class="hover:bg-slate-50 transition">
                            <td class="px-6 py-4 font-bold text-slate-800 text-lg">
                                {{ $data->tahun }}
                            </td>
                            <td class="px-6 py-4 text-right font-mono text-emerald-600 font-medium">
                                Rp {{ number_format($data->total_pendapatan, 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-4 text-right font-mono text-amber-600 font-medium">
                                Rp {{ number_format($data->total_belanja, 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-4 text-center font-bold">
                                @if ($data->surplus_defisit >= 0)
                                    <span class="px-3 py-1 rounded-full bg-blue-50 text-blue-600 text-xs">
                                        + Rp {{ number_format($data->surplus_defisit, 0, ',', '.') }}
                                    </span>
                                @else
                                    <span class="px-3 py-1 rounded-full bg-red-50 text-red-600 text-xs">
                                        (Rp {{ number_format(abs($data->surplus_defisit), 0, ',', '.') }})
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-center">
                                <div class="flex justify-center items-center gap-2">
                                    <a href="{{ route('admin.apbdes.edit', $data->id) }}"
                                        class="p-2 bg-slate-100 text-slate-600 rounded hover:bg-amber-100 hover:text-amber-600 transition"
                                        title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                                            </path>
                                        </svg>
                                    </a>
                                    <form action="{{ route('admin.apbdes.destroy', $data->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus data tahun {{ $data->tahun }}?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="p-2 bg-slate-100 text-slate-600 rounded hover:bg-red-100 hover:text-red-600 transition"
                                            title="Hapus">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                </path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center text-slate-400">
                                Belum ada data anggaran yang diinput.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</x-layouts.admin>
