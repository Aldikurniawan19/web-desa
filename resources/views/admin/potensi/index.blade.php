<x-layouts.admin>
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-slate-800">Potensi Desa</h2>
        <a href="{{ route('admin.potensi.create') }}"
            class="px-4 py-2 bg-emerald-600 text-white rounded-lg font-bold hover:bg-emerald-700">+ Tambah Data</a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-slate-100 overflow-hidden">
        <table class="w-full text-sm text-left text-slate-600">
            <thead class="bg-slate-50 text-xs uppercase font-bold text-slate-400">
                <tr>
                    <th class="px-6 py-4">Nama Potensi</th>
                    <th class="px-6 py-4">Kategori</th>
                    <th class="px-6 py-4">Kontak/Lokasi</th>
                    <th class="px-6 py-4 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($potensi as $item)
                    <tr class="hover:bg-slate-50">
                        <td class="px-6 py-4 font-bold">{{ $item->title }}</td>
                        <td class="px-6 py-4"><span
                                class="px-2 py-1 rounded bg-slate-100 text-xs font-bold uppercase">{{ $item->category }}</span>
                        </td>
                        <td class="px-6 py-4 text-slate-500">{{ $item->location ?? '-' }}</td>
                        <td class="px-6 py-4 text-right">
                            <a href="{{ route('admin.potensi.edit', $item->id) }}"
                                class="text-blue-600 font-bold hover:underline">Edit</a>
                            <form action="{{ route('admin.potensi.destroy', $item->id) }}" method="POST"
                                class="inline ml-2" onsubmit="return confirm('Hapus?')">
                                @csrf @method('DELETE')
                                <button class="text-red-600 font-bold hover:underline">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-6">Belum ada data.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="p-4">{{ $potensi->links() }}</div>
    </div>
</x-layouts.admin>
