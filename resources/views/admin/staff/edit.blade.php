<x-layouts.admin>
    <div class="max-w-2xl mx-auto">
        <div class="mb-6">
            <a href="{{ route('admin.staff.index') }}"
                class="text-slate-500 hover:text-emerald-600 flex items-center gap-2 mb-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
                    </path>
                </svg>
                Kembali
            </a>
            <h2 class="text-2xl font-bold text-slate-800">Edit Perangkat Desa</h2>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-slate-100 p-6">
            <form action="{{ route('admin.staff.update', $staff->id) }}" method="POST" enctype="multipart/form-data"
                class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-1">Nama Lengkap</label>
                    <input type="text" name="name" value="{{ $staff->name }}"
                        class="w-full rounded-lg border-slate-300 focus:border-emerald-500 focus:ring-emerald-200"
                        required>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-1">Jabatan</label>
                        <input type="text" name="position" value="{{ $staff->position }}"
                            class="w-full rounded-lg border-slate-300 focus:border-emerald-500 focus:ring-emerald-200"
                            required>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-1">NIP (Opsional)</label>
                        <input type="text" name="nip" value="{{ $staff->nip }}"
                            class="w-full rounded-lg border-slate-300 focus:border-emerald-500 focus:ring-emerald-200">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-1">Tingkatan / Level</label>
                    <select name="level"
                        class="w-full rounded-lg border-slate-300 focus:border-emerald-500 focus:ring-emerald-200">
                        <option value="1" {{ $staff->level == 1 ? 'selected' : '' }}>Level 1 - Kepala Desa</option>
                        <option value="2" {{ $staff->level == 2 ? 'selected' : '' }}>Level 2 - Sekretaris &
                            Bendahara</option>
                        <option value="3" {{ $staff->level == 3 ? 'selected' : '' }}>Level 3 - Kasi, Kaur & Staff
                        </option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-1">Ganti Foto (Opsional)</label>
                    @if ($staff->image)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $staff->image) }}"
                                class="h-20 w-20 rounded-full object-cover border border-slate-200">
                        </div>
                    @endif
                    <input type="file" name="image"
                        class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100 transition">
                </div>

                <div class="pt-4 border-t border-slate-100 text-right">
                    <button type="submit"
                        class="px-6 py-2 bg-emerald-600 hover:bg-emerald-700 text-white font-bold rounded-lg shadow-lg shadow-emerald-200 transition">
                        Update Data
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.admin>
