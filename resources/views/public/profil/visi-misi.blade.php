<x-layouts.public>
    <div class="bg-emerald-900 py-16 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]">
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <h1 class="text-4xl font-bold text-white mb-2">Visi & Misi</h1>
            <p class="text-emerald-200">Arah pembangunan Desa Maju 2024-2029</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">

            <div class="lg:col-span-2 space-y-8">

                <div
                    class="bg-white rounded-2xl p-8 shadow-lg shadow-emerald-100 border-t-4 border-emerald-500 text-center">
                    <h2 class="text-2xl font-bold text-slate-800 mb-6 uppercase tracking-wider">Visi Desa</h2>
                    <p class="text-xl md:text-2xl font-serif italic text-emerald-700 leading-relaxed">
                        "Terwujudnya Desa Maju yang Mandiri, Sejahtera, Agamis, dan Berbasis Teknologi Informasi."
                    </p>
                </div>

                <div class="bg-white rounded-2xl p-8 shadow-sm border border-slate-100">
                    <h2 class="text-2xl font-bold text-slate-800 mb-6 flex items-center">
                        <span
                            class="w-8 h-8 bg-slate-800 text-white rounded-lg flex items-center justify-center text-sm mr-3">M</span>
                        Misi Desa
                    </h2>
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <div
                                class="flex-shrink-0 w-8 h-8 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center font-bold text-sm mt-0.5">
                                1</div>
                            <p class="ml-4 text-slate-600 text-lg">Meningkatkan kualitas pelayanan publik melalui
                                digitalisasi administrasi desa.</p>
                        </li>
                        <li class="flex items-start">
                            <div
                                class="flex-shrink-0 w-8 h-8 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center font-bold text-sm mt-0.5">
                                2</div>
                            <p class="ml-4 text-slate-600 text-lg">Mengembangkan potensi ekonomi lokal melalui
                                pemberdayaan UMKM dan BUMDes.</p>
                        </li>
                        <li class="flex items-start">
                            <div
                                class="flex-shrink-0 w-8 h-8 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center font-bold text-sm mt-0.5">
                                3</div>
                            <p class="ml-4 text-slate-600 text-lg">Mewujudkan infrastruktur desa yang merata dan ramah
                                lingkungan.</p>
                        </li>
                        <li class="flex items-start">
                            <div
                                class="flex-shrink-0 w-8 h-8 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center font-bold text-sm mt-0.5">
                                4</div>
                            <p class="ml-4 text-slate-600 text-lg">Meningkatkan kualitas sumber daya manusia yang
                                berakhlak mulia.</p>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="lg:col-span-1">
                @include('components.public.profil-sidebar')
            </div>

        </div>
    </div>
</x-layouts.public>
