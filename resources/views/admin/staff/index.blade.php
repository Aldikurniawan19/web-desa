<x-layouts.admin>
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-2xl font-bold text-slate-800">Perangkat Desa</h2>
            <p class="text-slate-500 text-sm mt-1">Kelola struktur organisasi pemerintahan desa.</p>
        </div>
        <a href="{{ route('admin.staff.create') }}"
            class="px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white rounded-lg text-sm font-medium transition shadow-lg shadow-emerald-200">
            + Tambah Perangkat
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-slate-100 overflow-hidden">
        <table class="w-full text-sm text-left text-slate-600">
            <thead class="bg-slate-50 text-xs uppercase font-bold text-slate-400">
                <tr>
                    <th class="px-6 py-4">Foto & Nama</th>
                    <th class="px-6 py-4">Jabatan</th>
                    <th class="px-6 py-4">Level</th>
                    <th class="px-6 py-4 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($staff as $s)
                    <tr class="hover:bg-slate-50/50 transition">
                        <td class="px-6 py-4 flex items-center gap-4">
                            <div class="w-12 h-12 rounded-full overflow-hidden bg-slate-100 border border-slate-200">
                                @if ($s->image)
                                    <img src="{{ asset('storage/' . $s->image) }}" class="w-full h-full object-cover">
                                @else
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode($s->name) }}&background=e2e8f0&color=64748b"
                                        class="w-full h-full object-cover">
                                @endif
                            </div>
                            <div>
                                <div class="font-bold text-slate-800">{{ $s->name }}</div>
                                <div class="text-xs text-slate-400">NIP: {{ $s->nip ?? '-' }}</div>
                            </div>
                        </td>
                        <td class="px-6 py-4 font-medium text-slate-700">
                            {{ $s->position }}
                        </td>
                        <td class="px-6 py-4">
                            @if ($s->level == 1)
                                <span class="px-2 py-1 bg-purple-100 text-purple-700 rounded text-xs font-bold">Kepala
                                    Desa</span>
                            @elseif($s->level == 2)
                                <span
                                    class="px-2 py-1 bg-blue-100 text-blue-700 rounded text-xs font-bold">Pimpinan</span>
                            @else
                                <span class="px-2 py-1 bg-slate-100 text-slate-600 rounded text-xs font-bold">Staf /
                                    Kasi</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.staff.edit', $s->id) }}"
                                    class="p-2 bg-white border border-slate-200 rounded text-slate-600 hover:text-emerald-600 hover:border-emerald-500 transition">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                                        </path>
                                    </svg>
                                </a>
                                <form action="{{ route('admin.staff.destroy', $s->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin hapus data ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit"
                                        class="p-2 bg-white border border-slate-200 rounded text-slate-600 hover:text-red-600 hover:border-red-500 transition">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                        <td colspan="4" class="px-6 py-8 text-center text-slate-400">Belum ada data perangkat desa.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="p-4 bg-slate-50 border-t border-slate-100">
            {{ $staff->links() }}
        </div>
    </div>
</x-layouts.admin>
