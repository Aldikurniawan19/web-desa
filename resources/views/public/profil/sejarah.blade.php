<x-layouts.public>
    <div class="bg-slate-900 py-16 relative overflow-hidden">
        <div class="absolute inset-0 opacity-20 bg-cover bg-center"
            style="background-image: url('https://images.unsplash.com/photo-1500382017468-9049fed747ef?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80');">
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <h1 class="text-4xl font-bold text-white mb-2">Sejarah Desa</h1>
            <p class="text-slate-300">Mengenal lebih dekat asal-usul Desa Maju</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">

            <div class="lg:col-span-2 space-y-8">
                <div class="bg-white rounded-2xl p-8 shadow-sm border border-slate-100">
                    <img src="https://images.unsplash.com/photo-1533658602280-999333919106?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80"
                        alt="Sejarah Desa" class="w-full h-64 object-cover rounded-xl mb-6">

                    <div class="prose prose-slate max-w-none text-slate-600 leading-relaxed">
                        <p class="mb-4">
                            <strong>Desa Maju</strong> pertama kali dibuka pada tahun 1945 oleh tokoh masyarakat yang
                            bernama Ki Ageng Pamanahan (Nama Samaran). Pada awalnya, wilayah ini merupakan hutan
                            belantara yang subur. Nama "Maju" diambil dari semangat para pendiri desa yang menginginkan
                            wilayah ini terus berkembang seiring zaman.
                        </p>
                        <p class="mb-4">
                            Pada tahun 1980, Desa Maju resmi menjadi desa definitif yang terpisah dari kecamatan induk.
                            Sejak saat itu, pembangunan infrastruktur mulai digalakkan, mulai dari jalan desa, balai
                            pertemuan, hingga sekolah dasar.
                        </p>
                        <h3 class="text-xl font-bold text-slate-800 mt-6 mb-3">Kepemimpinan Dari Masa ke Masa</h3>
                        <ul class="list-disc pl-5 space-y-2">
                            <li><strong>1980 - 1990:</strong> Bapak Sastro (Kepala Desa Pertama)</li>
                            <li><strong>1990 - 2005:</strong> Bapak Subagyo</li>
                            <li><strong>2005 - 2018:</strong> Bapak H. Ahmad</li>
                            <li><strong>2018 - Sekarang:</strong> Bapak H. Sutrisno</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-1">
                @include('components.public.profil-sidebar')
            </div>

        </div>
    </div>
</x-layouts.public>
