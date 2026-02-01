<x-guest-layout>
    <div
        class="min-h-screen w-full flex flex-col items-center justify-center bg-slate-50 relative overflow-hidden font-sans py-10">

        <div
            class="absolute -top-20 -left-20 w-72 h-72 bg-emerald-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob">
        </div>
        <div
            class="absolute -bottom-20 -right-20 w-72 h-72 bg-blue-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000">
        </div>

        <div
            class="relative w-full max-w-[400px] bg-white rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 p-8 mx-4 z-10">

            <div class="flex flex-col items-center text-center mb-6">
                <div class="mb-4">
                    @if (isset($site_setting) && $site_setting->site_logo)
                        <img src="{{ asset('storage/' . $site_setting->site_logo) }}" alt="Logo"
                            class="w-14 h-14 object-contain">
                    @else
                        <div
                            class="w-14 h-14 bg-emerald-50 rounded-2xl flex items-center justify-center text-emerald-600">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z">
                                </path>
                            </svg>
                        </div>
                    @endif
                </div>

                <h2 class="text-xl font-bold text-slate-800 tracking-tight">Lupa Password?</h2>

                <p class="text-xs text-slate-500 mt-2 leading-relaxed">
                    {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                </p>
            </div>

            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
                @csrf

                <div class="space-y-1.5">
                    <label for="email"
                        class="block text-xs font-bold text-slate-500 uppercase tracking-wider ml-1">Email
                        Address</label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-slate-400 group-focus-within:text-emerald-500 transition-colors"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                        <input id="email" type="email" name="email" :value="old('email')" required autofocus
                            class="block w-full pl-11 pr-4 py-3 bg-slate-50 border-transparent focus:bg-white focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 rounded-xl text-sm transition-all duration-200"
                            placeholder="nama@email.com">
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="text-xs" />
                </div>

                <button type="submit"
                    class="w-full py-3 px-4 bg-emerald-600 hover:bg-emerald-500 text-white font-bold rounded-xl shadow-lg shadow-emerald-600/20 hover:shadow-emerald-600/30 transition-all duration-200 transform hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 text-sm">
                    {{ __('Email Password Reset Link') }}
                </button>
            </form>

            <div class="mt-8 pt-6 border-t border-slate-50 text-center">
                <a href="{{ route('login') }}"
                    class="inline-flex items-center gap-2 text-xs font-medium text-slate-400 hover:text-emerald-600 transition-colors group">
                    <svg class="w-3 h-3 transition-transform group-hover:-translate-x-1" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Kembali ke Login
                </a>
            </div>

        </div>

        <div class="mt-8 text-center z-10">
            <p class="text-[10px] text-slate-400 font-medium">
                &copy; {{ date('Y') }} {{ isset($site_setting) ? $site_setting->site_name : 'Desa Digital' }}. All
                rights reserved.
            </p>
        </div>

    </div>
</x-guest-layout>
