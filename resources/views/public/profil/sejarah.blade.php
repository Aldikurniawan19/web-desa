<x-layouts.public>
    <x-public.header-breadcrumb title="Sejarah & Asal Usul" :links="[
        'Profil Desa' => '#',
        'Sejarah' => null,
    ]" />

    <div class="bg-slate-50/50 py-12 min-h-screen">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">

                <div class="lg:col-span-8">

                    <div class="bg-white rounded-2xl shadow-lg shadow-slate-200/50 border border-slate-100 p-6 md:p-10">

                        <div class="mb-10 rounded-xl overflow-hidden bg-slate-100 shadow-sm border border-slate-100">
                            <img src="{{ $profile->history_image ? asset('storage/' . $profile->history_image) : 'https://via.placeholder.com/800x400' }}"
                                alt="Sejarah Desa"
                                class="w-full h-auto object-cover hover:scale-105 transition duration-700">
                        </div>

                        <div class="prose prose-lg prose-slate max-w-none text-slate-600 leading-loose">
                            {!! nl2br(e($profile->history_description)) !!}
                        </div>

                        <div class="mt-12 pt-10 border-t border-slate-100">
                            <h3 class="text-xl font-bold text-slate-900 mb-8 flex items-center">
                                <span
                                    class="flex items-center justify-center w-8 h-8 rounded-full bg-emerald-100 text-emerald-600 mr-3">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </span>
                                Periode Kepemimpinan
                            </h3>

                            <div class="space-y-8 border-l-2 border-slate-100 ml-3 pl-8 py-2">

                                <div class="relative group">
                                    <div
                                        class="absolute -left-[39px] top-1.5 w-5 h-5 rounded-full bg-white border-4 border-slate-200 group-hover:border-emerald-400 transition">
                                    </div>
                                    <span class="text-xs font-bold text-slate-400 uppercase tracking-wide">1980 -
                                        1990</span>
                                    <h4 class="text-lg font-bold text-slate-800">Bapak Sastro</h4>
                                    <p class="text-slate-500 text-sm mt-1">Kepala Desa Pertama.</p>
                                </div>

                                <div class="relative group">
                                    <div
                                        class="absolute -left-[39px] top-1.5 w-5 h-5 rounded-full bg-white border-4 border-slate-200 group-hover:border-emerald-400 transition">
                                    </div>
                                    <span class="text-xs font-bold text-slate-400 uppercase tracking-wide">1990 -
                                        2005</span>
                                    <h4 class="text-lg font-bold text-slate-800">Bapak Subagyo</h4>
                                    <p class="text-slate-500 text-sm mt-1">Pembangunan infrastruktur jalan desa.</p>
                                </div>

                                <div class="relative group">
                                    <div
                                        class="absolute -left-[39px] top-1.5 w-5 h-5 rounded-full bg-white border-4 border-slate-200 group-hover:border-emerald-400 transition">
                                    </div>
                                    <span class="text-xs font-bold text-slate-400 uppercase tracking-wide">2005 -
                                        2018</span>
                                    <h4 class="text-lg font-bold text-slate-800">Bapak H. Ahmad</h4>
                                    <p class="text-slate-500 text-sm mt-1">Modernisasi administrasi pemerintahan.</p>
                                </div>

                                <div class="relative">
                                    <div
                                        class="absolute -left-[39px] top-1.5 w-5 h-5 rounded-full bg-emerald-500 border-4 border-emerald-100 shadow-sm ring-2 ring-emerald-500 ring-offset-2">
                                    </div>
                                    <span
                                        class="inline-block px-2 py-0.5 rounded text-[10px] font-bold bg-emerald-100 text-emerald-700 mb-1">SEKARANG</span>
                                    <h4 class="text-lg font-bold text-slate-900">Bapak H. Sutrisno</h4>
                                    <p class="text-slate-500 text-sm mt-1">Era Desa Digital dan Pariwisata.</p>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

                <div class="lg:col-span-4 space-y-8">
                    @include('components.public.profil-sidebar')
                </div>

            </div>
        </div>
    </div>
</x-layouts.public>
