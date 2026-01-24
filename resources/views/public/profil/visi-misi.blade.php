<x-layouts.public>

    <div class="bg-white pt-20 pb-10 border-b border-slate-100">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <span class="text-emerald-600 font-bold tracking-widest text-xs uppercase mb-2 block">Profil Desa</span>
            <h1 class="text-3xl md:text-4xl font-bold text-slate-900 mb-4">Visi & Misi</h1>
            <div class="w-16 h-1 bg-emerald-500 mx-auto rounded-full"></div>
        </div>
    </div>

    <div class="bg-slate-50/50 py-12 min-h-screen">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">

                <div class="lg:col-span-8">

                    <div class="bg-white rounded-2xl shadow-lg shadow-slate-200/50 border border-slate-100 p-6 md:p-10">

                        <div class="text-center mb-12">
                            <div
                                class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-emerald-50 text-emerald-600 mb-6 ring-4 ring-emerald-50/50">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                    </path>
                                </svg>
                            </div>
                            <h2 class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-4">Visi Desa
                                2024-2029</h2>

                            <div class="relative px-4 md:px-10">
                                <svg class="absolute -top-6 left-0 w-12 h-12 text-slate-100 transform -scale-x-100"
                                    fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M14.017 21L14.017 18C14.017 16.0547 15.372 15.5516 16.0123 15.2662C16.6508 14.9808 17.5144 14.4776 17.5144 12.5156C17.5144 11.2656 16.6262 10.7031 16.0123 10.7031C15.3984 10.7031 14.017 11.2656 14.017 12.5156L14.017 14L11.517 14L11.517 7L14.017 7C14.017 4.79688 15.8118 3 18.017 3L18.017 5.5C16.9116 5.5 16.517 6.39844 16.517 7.5L16.517 8C17.6212 8 18.517 8.89844 18.517 10.0156C18.517 11.1172 17.6166 12 16.517 12C16.517 12.5 16.517 12.5C16.517 12.5C16.517 13.6016 17.4128 14.5156 18.517 14.5156L18.517 17C18.517 19.2031 16.7128 21 14.517 21L14.017 21ZM6.51697 21L6.51697 18C6.51697 16.0547 7.87201 15.5516 8.51233 15.2662C9.15082 14.9808 10.0144 14.4776 10.0144 12.5156C10.0144 11.2656 9.12622 10.7031 8.51233 10.7031C7.89844 10.7031 6.51697 11.2656 6.51697 12.5156L6.51697 14L4.01697 14L4.01697 7L6.51697 7C6.51697 4.79688 8.31177 3 10.517 3L10.517 5.5C9.41156 5.5 9.01697 6.39844 9.01697 7.5L9.01697 8C10.1212 8 11.017 8.89844 11.017 10.0156C11.017 11.1172 10.1166 12 9.01697 12C9.01697 12.5 9.01697 12.5C9.01697 12.5C9.01697 13.6016 9.91278 14.5156 11.017 14.5156L11.017 17C11.017 19.2031 9.21277 21 7.01697 21L6.51697 21Z" />
                                </svg>
                                <h3 class="text-2xl md:text-3xl font-serif font-medium text-slate-800 leading-snug">
                                    {{ $profile->vision }}
                                </h3>
                            </div>
                        </div>

                        <div class="flex items-center gap-4 mb-12">
                            <div class="h-px bg-slate-100 flex-1"></div>
                            <span class="text-xs font-bold text-slate-300 uppercase">Misi Kami</span>
                            <div class="h-px bg-slate-100 flex-1"></div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            @if ($profile->missions)
                                @foreach ($profile->missions as $index => $mission)
                                    <div class="group p-6 rounded-2xl border border-slate-100 ...">
                                        @php
                                            $colors = [
                                                'text-blue-600 bg-blue-50',
                                                'text-emerald-600 bg-emerald-50',
                                                'text-orange-600 bg-orange-50',
                                                'text-purple-600 bg-purple-50',
                                            ];
                                            $colorClass = $colors[$index % 4];
                                        @endphp
                                        <div
                                            class="w-12 h-12 rounded-xl {{ $colorClass }} flex items-center justify-center mb-4 ...">
                                            <span class="font-bold text-lg">{{ $index + 1 }}</span>
                                        </div>

                                        <h4 class="text-lg font-bold text-slate-800 mb-2">Misi Ke-{{ $index + 1 }}
                                        </h4>
                                        <p class="text-slate-500 text-sm leading-relaxed">
                                            {{ $mission }}
                                        </p>
                                    </div>
                                @endforeach
                            @endif
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
