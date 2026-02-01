<x-layouts.admin>
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-slate-800">Pengaturan Tampilan Website</h2>
        <p class="text-slate-500 text-sm">Kelola identitas desa, logo, dan gambar slider halaman depan.</p>
    </div>

    @if (session('success'))
        <div
            class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-lg flex items-center animate-fade-in-up">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" class="mb-10">
        @csrf
        @method('PUT')

        <div class="bg-white rounded-xl shadow-sm border border-slate-100 p-6">
            <h3 class="font-bold text-slate-800 mb-6 border-b border-slate-100 pb-2 flex items-center">
                <span
                    class="bg-emerald-100 text-emerald-600 w-8 h-8 rounded-full flex items-center justify-center mr-3 text-sm">1</span>
                Identitas & Logo Desa
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Nama Desa</label>
                    <input type="text" name="site_name" value="{{ old('site_name', $setting->site_name) }}"
                        class="w-full border-slate-200 rounded-lg focus:border-emerald-500 focus:ring-emerald-200 transition bg-slate-50"
                        required>
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Nama Kabupaten/Kota</label>
                    <input type="text" name="kabupaten_name"
                        value="{{ old('kabupaten_name', $setting->kabupaten_name) }}"
                        class="w-full border-slate-200 rounded-lg focus:border-emerald-500 focus:ring-emerald-200 transition bg-slate-50"
                        required>
                </div>

                <div class="md:col-span-2 mt-2">
                    <label class="block text-sm font-bold text-slate-700 mb-2">Logo Website</label>
                    <div class="flex items-start gap-6 p-4 border border-slate-100 rounded-xl bg-slate-50/50">
                        <div class="shrink-0">
                            @if ($setting->site_logo)
                                <div
                                    class="w-20 h-20 bg-white rounded-lg border border-slate-200 flex items-center justify-center p-2 shadow-sm">
                                    <img src="{{ asset('storage/' . $setting->site_logo) }}" alt="Logo"
                                        class="w-full h-full object-contain">
                                </div>
                            @else
                                <div
                                    class="w-20 h-20 bg-slate-200 rounded-lg flex items-center justify-center text-slate-400">
                                    <span class="text-xs">No Logo</span>
                                </div>
                            @endif
                        </div>

                        <div class="flex-1">
                            <input type="file" name="site_logo"
                                class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-bold file:bg-emerald-100 file:text-emerald-700 hover:file:bg-emerald-200 transition cursor-pointer">
                            <p class="text-xs text-slate-400 mt-2">Format: PNG/JPG (Transparan direkomendasikan). Maks
                                2MB.</p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="mt-6 flex justify-end">
                <button type="submit"
                    class="px-6 py-2.5 bg-slate-800 text-white font-bold rounded-lg hover:bg-slate-900 transition shadow-lg shadow-slate-800/20">
                    Simpan Identitas
                </button>
            </div>
        </div>
    </form>


    <div class="bg-white rounded-xl shadow-sm border border-slate-100 p-6">
        <h3 class="font-bold text-slate-800 mb-6 border-b border-slate-100 pb-2 flex items-center">
            <span
                class="bg-blue-100 text-blue-600 w-8 h-8 rounded-full flex items-center justify-center mr-3 text-sm">2</span>
            Slider Halaman Depan
        </h3>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <div class="lg:col-span-1">
                <div class="bg-slate-50 p-5 rounded-xl border border-slate-200 sticky top-6">
                    <h4 class="font-bold text-slate-800 mb-4 text-sm uppercase tracking-wide">Tambah Slide Baru</h4>

                    <form action="{{ route('admin.hero.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="space-y-4">
                            <div>
                                <label class="block text-xs font-bold text-slate-500 mb-1">Judul Utama
                                    (Headline)</label>
                                <input type="text" name="title" class="w-full text-sm border-slate-200 rounded-lg"
                                    placeholder="Contoh: Selamat Datang" required>
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-500 mb-1">Sub Judul (Opsional)</label>
                                <textarea name="subtitle" rows="2" class="w-full text-sm border-slate-200 rounded-lg"
                                    placeholder="Contoh: Menuju Desa Mandiri..."></textarea>
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-500 mb-1">Gambar Background</label>
                                <input type="file" name="image"
                                    class="w-full text-xs text-slate-500 file:mr-2 file:py-2 file:px-3 file:rounded-md file:border-0 file:bg-blue-100 file:text-blue-700 hover:file:bg-blue-200"
                                    required>
                                <p class="text-[10px] text-slate-400 mt-1">* Landscape HD direkomendasikan.</p>
                            </div>
                            <button type="submit"
                                class="w-full py-2.5 bg-blue-600 text-white text-sm font-bold rounded-lg hover:bg-blue-700 transition shadow-md shadow-blue-200">
                                + Upload Slide
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="lg:col-span-2">
                <h4
                    class="font-bold text-slate-800 mb-4 text-sm uppercase tracking-wide flex justify-between items-center">
                    Daftar Slide Aktif
                    <span class="bg-slate-100 text-slate-600 px-2 py-1 rounded text-xs">{{ $slides->count() }}
                        Slide</span>
                </h4>

                <div class="space-y-4">
                    @forelse($slides as $slide)
                        <div
                            class="group relative bg-white border border-slate-200 rounded-xl p-3 flex gap-4 items-center hover:shadow-md transition overflow-hidden">

                            <div class="w-32 h-20 shrink-0 rounded-lg overflow-hidden bg-slate-100 relative">
                                <img src="{{ asset('storage/' . $slide->image) }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                            </div>

                            <div class="flex-1 min-w-0">
                                <h5 class="font-bold text-slate-800 text-sm truncate">{{ $slide->title }}</h5>
                                <p class="text-xs text-slate-500 line-clamp-2 mt-1">{{ $slide->subtitle ?? '-' }}</p>
                            </div>

                            <form action="{{ route('admin.hero.destroy', $slide->id) }}" method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus slide ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="p-2 text-slate-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition"
                                    title="Hapus Slide">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                        </path>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    @empty
                        <div
                            class="flex flex-col items-center justify-center py-10 border-2 border-dashed border-slate-200 rounded-xl text-slate-400 bg-slate-50/50">
                            <svg class="w-10 h-10 mb-2 opacity-50" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                            <p class="text-sm">Belum ada slide gambar.</p>
                            <p class="text-xs">Silakan tambah slide di formulir sebelah kiri.</p>
                        </div>
                    @endforelse
                </div>
            </div>

        </div>
    </div>

</x-layouts.admin>
