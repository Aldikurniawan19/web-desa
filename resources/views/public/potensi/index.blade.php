<x-layouts.public>
    <div class="relative bg-white pt-20 pb-12 overflow-hidden border-b border-slate-100">
        <div
            class="absolute inset-0 opacity-30 bg-[radial-gradient(#e5e7eb_1px,transparent_1px)] [background-size:16px_16px]">
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center z-10">
            <span
                class="inline-block py-1 px-3 rounded-full bg-emerald-50 text-emerald-600 text-xs font-bold uppercase tracking-wider mb-4 border border-emerald-100">
                Jelajah Desa
            </span>
            <h1 class="text-4xl md:text-5xl font-extrabold text-slate-900 tracking-tight mb-4">
                Potensi Unggulan <span class="text-emerald-600">Desa Kami</span>
            </h1>
            <p class="text-lg text-slate-500 max-w-2xl mx-auto leading-relaxed">
                Temukan produk UMKM lokal berkualitas dan destinasi wisata alam yang memukau langsung dari sumbernya.
            </p>

            <div class="mt-8 flex flex-wrap justify-center gap-3" id="portfolio-filters">
                <button onclick="filterSelection('all')"
                    class="filter-btn active px-6 py-2.5 rounded-full text-sm font-bold transition-all duration-300 border shadow-sm">
                    Semua
                </button>
                <button onclick="filterSelection('umkm')"
                    class="filter-btn px-6 py-2.5 rounded-full text-sm font-bold transition-all duration-300 border border-slate-200 text-slate-600 hover:border-emerald-500 hover:text-emerald-600 bg-white">
                    🛍️ UMKM
                </button>
                <button onclick="filterSelection('pertanian')"
                    class="filter-btn px-6 py-2.5 rounded-full text-sm font-bold transition-all duration-300 border border-slate-200 text-slate-600 hover:border-emerald-500 hover:text-emerald-600 bg-white">
                    🌾 Pertanian
                </button>
                <button onclick="filterSelection('wisata')"
                    class="filter-btn px-6 py-2.5 rounded-full text-sm font-bold transition-all duration-300 border border-slate-200 text-slate-600 hover:border-emerald-500 hover:text-emerald-600 bg-white">
                    🏕️ Wisata
                </button>
            </div>
        </div>
    </div>

    <div class="bg-slate-50/50 min-h-screen py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-8 transition-all" id="potensi-container">
                @forelse($potensi as $item)
                    <div
                        class="filter-item category-{{ $item->category }} group bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col h-full">

                        <div class="relative h-56 overflow-hidden bg-slate-100">
                            @if ($item->image)
                                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition duration-700 ease-in-out">
                            @else
                                <div
                                    class="w-full h-full flex flex-col items-center justify-center text-slate-300 bg-slate-50">
                                    <svg class="w-12 h-12 mb-2 opacity-50" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    <span class="text-xs font-medium">No Image</span>
                                </div>
                            @endif

                            <div class="absolute top-4 left-4 flex gap-2">
                                <span
                                    class="px-3 py-1 bg-white/95 backdrop-blur-sm text-xs font-bold uppercase rounded-lg text-slate-800 shadow-sm border border-slate-100">
                                    {{ $item->category }}
                                </span>
                            </div>
                        </div>

                        <div class="p-5 flex-1 flex flex-col">
                            <div class="mb-4">
                                <h3
                                    class="font-bold text-lg text-slate-900 leading-snug mb-2 group-hover:text-emerald-600 transition-colors line-clamp-1">
                                    {{ $item->title }}
                                </h3>
                                <p class="text-sm text-slate-500 line-clamp-2 leading-relaxed">
                                    {{ $item->description }}
                                </p>
                            </div>

                            <div class="flex items-center gap-2 mb-4 text-xs text-slate-500 font-medium">
                                @if ($item->location)
                                    <div class="flex items-center gap-1 truncate max-w-[50%]">
                                        <svg class="w-4 h-4 text-emerald-500 flex-shrink-0" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                            </path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                        <span class="truncate">{{ $item->location }}</span>
                                    </div>
                                @endif
                                @if ($item->owner)
                                    <div class="flex items-center gap-1 truncate max-w-[50%]">
                                        <svg class="w-4 h-4 text-blue-500 flex-shrink-0" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                            </path>
                                        </svg>
                                        <span class="truncate">{{ $item->owner }}</span>
                                    </div>
                                @endif
                            </div>

                            <div class="mt-auto pt-4 border-t border-slate-100 flex items-center justify-between">
                                <div>
                                    <span
                                        class="text-[10px] text-slate-400 uppercase tracking-wider font-bold block">Harga
                                        Mulai</span>
                                    @if ($item->price)
                                        <div class="text-lg font-bold text-emerald-600">
                                            Rp {{ number_format($item->price, 0, ',', '.') }}
                                        </div>
                                    @else
                                        <div class="text-sm font-bold text-slate-400 italic">Hubungi Kami</div>
                                    @endif
                                </div>

                                @if ($item->contact)
                                    <a href="https://wa.me/{{ $item->contact }}" target="_blank"
                                        class="flex items-center justify-center w-10 h-10 rounded-full bg-emerald-50 text-emerald-600 hover:bg-emerald-600 hover:text-white transition-all shadow-sm hover:shadow-emerald-200">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z" />
                                        </svg>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-1 md:col-span-3 lg:col-span-4 text-center py-20">
                        <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-slate-100 mb-4">
                            <svg class="w-10 h-10 text-slate-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-800">Belum ada data potensi</h3>
                        <p class="text-slate-500 mt-2">Data potensi desa belum ditambahkan oleh admin.</p>
                    </div>
                @endforelse
            </div>

            <div id="no-result-message" class="hidden text-center py-20">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-slate-100 mb-4">
                    <svg class="w-8 h-8 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-slate-800">Kategori ini kosong</h3>
                <p class="text-slate-500">Belum ada potensi desa untuk kategori yang dipilih.</p>
            </div>
        </div>
    </div>

    <script>
        function filterSelection(category) {
            var x, i;
            // Ambil semua elemen dengan class 'filter-item'
            x = document.getElementsByClassName("filter-item");

            var foundCount = 0;

            if (category == "all") category = "";

            // Loop semua item
            for (i = 0; i < x.length; i++) {
                // Hapus class 'hidden' dulu (reset)
                x[i].classList.remove("hidden");

                // Jika item tidak punya class kategori yang dipilih, sembunyikan
                if (x[i].className.indexOf(category) == -1) {
                    x[i].classList.add("hidden");
                } else {
                    foundCount++;
                }
            }

            // Tampilkan pesan kosong jika tidak ada item yang cocok
            var noResultMsg = document.getElementById("no-result-message");
            if (foundCount === 0 && x.length > 0) {
                noResultMsg.classList.remove("hidden");
            } else {
                noResultMsg.classList.add("hidden");
            }

            // Update style tombol aktif
            var btns = document.getElementsByClassName("filter-btn");
            for (i = 0; i < btns.length; i++) {
                // Reset style semua tombol ke 'tidak aktif' (putih)
                btns[i].classList.remove("bg-slate-900", "text-white");
                btns[i].classList.add("bg-white", "text-slate-600");

                // Tambahkan style ke tombol yang diklik
                if (btns[i].getAttribute("onclick").includes("'" + (category || 'all') + "'")) {
                    btns[i].classList.remove("bg-white", "text-slate-600");
                    btns[i].classList.add("bg-slate-900", "text-white");
                }
            }
        }

        // Set default filter ke 'all' saat halaman dimuat
        document.addEventListener("DOMContentLoaded", function() {
            filterSelection("all");
        });
    </script>
</x-layouts.public>
