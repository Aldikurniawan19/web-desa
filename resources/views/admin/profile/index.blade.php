<x-layouts.admin>
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-slate-800">Pengaturan Profil Desa</h2>
        <p class="text-slate-500 text-sm">Update Sejarah, Visi, dan Misi Desa secara dinamis.</p>
    </div>

    <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

            <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-100 h-fit">
                <h3 class="font-bold text-slate-800 mb-4 border-b pb-2">1. Sejarah Desa</h3>

                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-1">Foto Sejarah / Utama</label>
                        @if ($profile->history_image)
                            <img src="{{ asset('storage/' . $profile->history_image) }}"
                                class="h-32 w-auto rounded-lg mb-2 object-cover">
                        @endif
                        <input type="file" name="history_image"
                            class="block w-full text-sm text-slate-500 file:bg-emerald-50 file:text-emerald-700 file:px-4 file:py-2 file:rounded-full file:border-0">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-1">Narasi Sejarah</label>
                        <textarea name="history_description" rows="10" class="w-full rounded-lg border-slate-300 focus:border-emerald-500"
                            required>{{ $profile->history_description }}</textarea>
                        <p class="text-xs text-slate-400 mt-1">Ceritakan asal usul desa di sini.</p>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-100 h-fit">
                <h3 class="font-bold text-slate-800 mb-4 border-b pb-2">2. Visi & Misi</h3>

                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-1">Visi Desa</label>
                        <textarea name="vision" rows="3"
                            class="w-full rounded-lg border-slate-300 focus:border-emerald-500 font-bold text-slate-800" required>{{ $profile->vision }}</textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-1">Misi Desa</label>
                        <div class="bg-yellow-50 p-3 rounded-lg text-xs text-yellow-700 mb-2">
                            <strong>Tips:</strong> Tulis setiap poin misi pada <strong>baris baru (Enter)</strong>.
                            Sistem akan otomatis mengubahnya menjadi daftar poin di halaman depan.
                        </div>
                        <textarea name="missions" rows="10" class="w-full rounded-lg border-slate-300 focus:border-emerald-500"
                            placeholder="Misi 1&#10;Misi 2&#10;Misi 3" required>
@if ($profile->missions)
{{ implode("\n", $profile->missions) }}
@endif
</textarea>
                    </div>
                </div>
            </div>

        </div>

        <div class="mt-6">
            <button type="submit"
                class="px-6 py-3 bg-emerald-600 hover:bg-emerald-700 text-white font-bold rounded-xl shadow-lg shadow-emerald-200 transition w-full md:w-auto">
                Simpan Perubahan Profil
            </button>
        </div>
    </form>
</x-layouts.admin>
