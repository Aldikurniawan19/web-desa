<x-layouts.public>
    <div class="bg-slate-50/50 min-h-screen py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            <nav class="flex mb-8" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3 text-sm font-medium">
                    <li class="inline-flex items-center">
                        <a href="{{ route('home') }}"
                            class="text-slate-500 hover:text-emerald-600 transition flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg>
                            Beranda
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-slate-300 mx-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <a href="{{ route('layanan.index') }}"
                                class="text-slate-500 hover:text-emerald-600 transition">Layanan</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-slate-300 mx-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-emerald-600">Buat Pengajuan</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <div class="bg-white rounded-[2rem] shadow-xl shadow-slate-200/60 border border-slate-100 overflow-hidden">

                <div class="px-8 pt-8 pb-4 md:flex md:items-center md:justify-between border-b border-slate-100">
                    <div class="flex items-center gap-4">
                        <div
                            class="w-14 h-14 bg-emerald-100 rounded-2xl flex items-center justify-center text-emerald-600 shadow-sm">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-slate-800">Ajukan Surat Baru</h2>
                            <p class="text-slate-500 text-sm mt-1">Silakan lengkapi data di bawah untuk memproses
                                permintaan Anda.</p>
                        </div>
                    </div>
                </div>

                <form action="{{ route('layanan.store') }}" method="POST" enctype="multipart/form-data"
                    class="p-8 space-y-8">
                    @csrf

                    <div
                        class="bg-emerald-50/50 rounded-2xl p-5 border border-emerald-100/80 flex flex-col md:flex-row md:items-center gap-4 md:gap-8">
                        <div class="flex items-center gap-3">
                            <div class="p-2 bg-white rounded-full text-emerald-600 shadow-sm">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <div>
                                <span
                                    class="block text-xs text-emerald-600 font-medium uppercase tracking-wider">Pemohon</span>
                                <span class="font-bold text-slate-800 text-lg">{{ Auth::user()->name }}</span>
                            </div>
                        </div>
                        <div class="hidden md:block h-10 w-px bg-emerald-200"></div>
                        <div class="flex items-center gap-3">
                            <div class="p-2 bg-white rounded-full text-emerald-600 shadow-sm">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0c0 .884-.5 2-2 2h-4C7.116 8 6.5 6.884 6.5 6s.616-2 1.5-2H10">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <span
                                    class="block text-xs text-emerald-600 font-medium uppercase tracking-wider">NIK</span>
                                <span
                                    class="font-bold text-slate-800 text-lg">{{ Auth::user()->nik ?? 'Belum diatur' }}</span>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h3 class="text-lg font-bold text-slate-800 flex items-center gap-2 mb-4">
                            <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                                </path>
                            </svg>
                            Pilih Jenis Surat
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <label class="relative group cursor-pointer">
                                <input type="radio" name="type" value="Surat Pengantar KTP"
                                    class="peer absolute opacity-0" checked>
                                <div
                                    class="p-5 bg-white border-2 border-slate-100 rounded-2xl transition-all duration-200 peer-checked:border-emerald-500 peer-checked:bg-emerald-50/30 peer-checked:shadow-md group-hover:border-emerald-300 group-hover:shadow-sm h-full flex items-start gap-4">
                                    <div
                                        class="w-12 h-12 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center flex-shrink-0">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0c0 .884-.5 2-2 2h-4C7.116 8 6.5 6.884 6.5 6s.616-2 1.5-2H10">
                                            </path>
                                        </svg>
                                    </div>
                                    <div>
                                        <span class="block font-bold text-slate-800 text-lg mb-1">Pengantar KTP</span>
                                        <span class="block text-sm text-slate-500 leading-snug">Untuk pembuatan KTP
                                            baru, hilang, atau rusak.</span>
                                    </div>
                                    <div
                                        class="absolute top-4 right-4 text-emerald-600 opacity-0 peer-checked:opacity-100 transition-opacity scale-0 peer-checked:scale-100 duration-200 font-bold">
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                </div>
                            </label>

                            <label class="relative group cursor-pointer">
                                <input type="radio" name="type" value="Surat Keterangan Domisili"
                                    class="peer absolute opacity-0">
                                <div
                                    class="p-5 bg-white border-2 border-slate-100 rounded-2xl transition-all duration-200 peer-checked:border-emerald-500 peer-checked:bg-emerald-50/30 peer-checked:shadow-md group-hover:border-emerald-300 group-hover:shadow-sm h-full flex items-start gap-4">
                                    <div
                                        class="w-12 h-12 bg-purple-100 text-purple-600 rounded-xl flex items-center justify-center flex-shrink-0">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                            </path>
                                        </svg>
                                    </div>
                                    <div>
                                        <span class="block font-bold text-slate-800 text-lg mb-1">Keterangan
                                            Domisili</span>
                                        <span class="block text-sm text-slate-500 leading-snug">Bukti sah tempat
                                            tinggal saat ini di desa.</span>
                                    </div>
                                    <div
                                        class="absolute top-4 right-4 text-emerald-600 opacity-0 peer-checked:opacity-100 transition-opacity scale-0 peer-checked:scale-100 duration-200 font-bold">
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                </div>
                            </label>

                            <label class="relative group cursor-pointer">
                                <input type="radio" name="type" value="Surat Keterangan Usaha"
                                    class="peer absolute opacity-0">
                                <div
                                    class="p-5 bg-white border-2 border-slate-100 rounded-2xl transition-all duration-200 peer-checked:border-emerald-500 peer-checked:bg-emerald-50/30 peer-checked:shadow-md group-hover:border-emerald-300 group-hover:shadow-sm h-full flex items-start gap-4">
                                    <div
                                        class="w-12 h-12 bg-amber-100 text-amber-600 rounded-xl flex items-center justify-center flex-shrink-0">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                            </path>
                                        </svg>
                                    </div>
                                    <div>
                                        <span class="block font-bold text-slate-800 text-lg mb-1">Keterangan
                                            Usaha</span>
                                        <span class="block text-sm text-slate-500 leading-snug">Untuk keperluan bank,
                                            kredit, atau izin usaha mikro.</span>
                                    </div>
                                    <div
                                        class="absolute top-4 right-4 text-emerald-600 opacity-0 peer-checked:opacity-100 transition-opacity scale-0 peer-checked:scale-100 duration-200 font-bold">
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                </div>
                            </label>

                            <label class="relative group cursor-pointer">
                                <input type="radio" name="type" value="Surat Keterangan Tidak Mampu (SKTM)"
                                    class="peer absolute opacity-0">
                                <div
                                    class="p-5 bg-white border-2 border-slate-100 rounded-2xl transition-all duration-200 peer-checked:border-emerald-500 peer-checked:bg-emerald-50/30 peer-checked:shadow-md group-hover:border-emerald-300 group-hover:shadow-sm h-full flex items-start gap-4">
                                    <div
                                        class="w-12 h-12 bg-red-100 text-red-600 rounded-xl flex items-center justify-center flex-shrink-0">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div>
                                        <span class="block font-bold text-slate-800 text-lg mb-1">SKTM</span>
                                        <span class="block text-sm text-slate-500 leading-snug">Surat Keterangan Tidak
                                            Mampu untuk bantuan/beasiswa.</span>
                                    </div>
                                    <div
                                        class="absolute top-4 right-4 text-emerald-600 opacity-0 peer-checked:opacity-100 transition-opacity scale-0 peer-checked:scale-100 duration-200 font-bold">
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                </div>
                            </label>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-5 gap-8">
                        <div class="md:col-span-3">
                            <label for="purpose"
                                class="block text-lg font-bold text-slate-800 mb-4 flex items-center gap-2">
                                <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                    </path>
                                </svg>
                                Detail Keperluan
                            </label>
                            <div class="relative">
                                <textarea name="purpose" id="purpose" rows="5"
                                    class="w-full rounded-2xl border-slate-200 focus:border-emerald-500 focus:ring focus:ring-emerald-200 transition p-4 text-slate-700 leading-relaxed resize-none"
                                    placeholder="Contoh: Untuk persyaratan pendaftaran sekolah anak di SMAN 1..." required></textarea>
                                <div class="absolute bottom-4 right-4 text-xs text-slate-400 pointer-events-none">Wajib
                                    diisi</div>
                            </div>
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-lg font-bold text-slate-800 mb-4 flex items-center gap-2">
                                <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13">
                                    </path>
                                </svg>
                                Lampiran Pendukung
                            </label>
                            <div class="group">
                                <label for="attachment"
                                    class="flex flex-col items-center justify-center w-full h-[150px] border-2 border-slate-200 border-dashed rounded-2xl cursor-pointer bg-slate-50/50 hover:bg-emerald-50/50 hover:border-emerald-400 transition overflow-hidden relative">
                                    <div
                                        class="flex flex-col items-center justify-center pt-5 pb-6 relative z-10 transition-transform group-hover:scale-105">
                                        <div
                                            class="p-3 bg-white rounded-full shadow-sm mb-3 group-hover:shadow-md transition">
                                            <svg class="w-8 h-8 text-emerald-500" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12">
                                                </path>
                                            </svg>
                                        </div>
                                        <p class="mb-1 text-sm text-slate-700 font-medium">Klik untuk upload berkas</p>
                                        <p class="text-xs text-slate-500">Foto KTP/KK (Max. 2MB)</p>
                                    </div>
                                    <input id="attachment" name="attachment" type="file" class="hidden"
                                        accept="image/png, image/jpeg, image/jpg" />
                                    <div
                                        class="absolute inset-0 bg-emerald-100/0 group-hover:bg-emerald-100/20 transition-colors z-0">
                                    </div>
                                </label>
                            </div>
                            <p class="text-xs text-slate-400 mt-2 flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                    </path>
                                </svg>
                                Data Anda aman dan terenkripsi.
                            </p>
                        </div>
                    </div>

                    <div class="pt-6 border-t border-slate-100">
                        <button type="submit"
                            class="w-full md:w-auto md:px-12 py-4 bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-lg rounded-2xl shadow-lg shadow-emerald-200/50 transition transform hover:-translate-y-1 flex items-center justify-center gap-3 mx-auto">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                            </svg>
                            Kirim Permohonan Surat
                        </button>
                        <p class="text-center text-sm text-slate-500 mt-4">Permohonan akan diproses dalam 1-2 hari
                            kerja.</p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.public>
