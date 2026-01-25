@props(['title', 'links' => []])

<div class="bg-white pt-28 pb-8 md:pt-36 md:pb-16 border-b border-slate-100">
    <div class="max-w-4xl mx-auto px-4 text-center">

        <nav class="md:hidden flex justify-center mb-3 text-xs font-medium text-slate-500">
            <ol class="inline-flex items-center flex-wrap justify-center gap-y-1 space-x-1">

                <li class="inline-flex items-center">
                    <a href="{{ route('home') }}" class="hover:text-emerald-600 transition flex items-center shrink-0">
                        <svg class="w-3 h-3 mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                        </svg>
                        Beranda
                    </a>
                </li>

                @foreach ($links as $label => $url)
                    <li>
                        <div class="flex items-center">
                            <svg class="w-2.5 h-2.5 text-slate-400 mx-1" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>

                            @if ($url)
                                <a href="{{ $url }}"
                                    class="ml-0.5 text-slate-500 hover:text-emerald-600 transition truncate max-w-[120px]">
                                    {{ $label }}
                                </a>
                            @else
                                <span class="ml-0.5 font-bold text-emerald-600 truncate max-w-[150px]"
                                    aria-current="page">
                                    {{ $label }}
                                </span>
                            @endif
                        </div>
                    </li>
                @endforeach

            </ol>
        </nav>

        <h1 class="text-2xl md:text-5xl font-extrabold text-slate-900 mb-4 tracking-tight leading-tight">
            {{ $title }}
        </h1>

        <div class="w-16 h-1 md:w-24 md:h-1.5 bg-emerald-500 mx-auto rounded-full"></div>
    </div>
</div>
