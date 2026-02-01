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

            <div class="flex flex-col items-center text-center mb-8">
                <a href="/" class="mb-6 transform transition hover:scale-105 duration-300">
                    @if (isset($site_setting) && $site_setting->site_logo)
                        <img src="{{ asset('storage/' . $site_setting->site_logo) }}" alt="Logo"
                            class="w-16 h-16 object-contain">
                    @else
                        <div
                            class="w-16 h-16 bg-emerald-50 rounded-2xl flex items-center justify-center text-emerald-600">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-3a1 1 0 011-1h2a1 1 0 011 1v3m-5-10v-3a1 1 0 011-1h2a1 1 0 011 1v3">
                                </path>
                            </svg>
                        </div>
                    @endif
                </a>

                <h2 class="text-2xl font-bold text-slate-800 tracking-tight">Selamat Datang</h2>
                <p class="text-slate-400 text-sm mt-2">Masuk untuk mengelola data desa</p>
            </div>

            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <div class="space-y-1.5">
                    <label for="email"
                        class="block text-xs font-bold text-slate-500 uppercase tracking-wider ml-1">Email</label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-slate-400 group-focus-within:text-emerald-500 transition-colors"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207">
                                </path>
                            </svg>
                        </div>
                        <input id="email" type="email" name="email" :value="old('email')" required autofocus
                            autocomplete="username"
                            class="block w-full pl-11 pr-4 py-3 bg-slate-50 border-transparent focus:bg-white focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 rounded-xl text-sm transition-all duration-200"
                            placeholder="example@email.com">
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="text-xs" />
                </div>

                <div class="space-y-1.5">
                    <div class="flex justify-between items-center ml-1">
                        <label for="password"
                            class="block text-xs font-bold text-slate-500 uppercase tracking-wider">Password</label>
                    </div>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-slate-400 group-focus-within:text-emerald-500 transition-colors"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                </path>
                            </svg>
                        </div>
                        <input id="password" type="password" name="password" required autocomplete="current-password"
                            class="block w-full pl-11 pr-4 py-3 bg-slate-50 border-transparent focus:bg-white focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 rounded-xl text-sm transition-all duration-200"
                            placeholder="••••••••">
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="text-xs" />
                </div>

                <div class="flex items-center justify-between pt-1">
                    <label for="remember_me" class="inline-flex items-center cursor-pointer group">
                        <div class="relative flex items-center">
                            <input id="remember_me" type="checkbox"
                                class="peer h-4 w-4 cursor-pointer appearance-none rounded border border-slate-300 shadow transition-all checked:border-emerald-500 checked:bg-emerald-500 hover:shadow-md"
                                name="remember">
                            <span
                                class="absolute text-white opacity-0 peer-checked:opacity-100 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20"
                                    fill="currentColor" stroke="currentColor" stroke-width="1">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </span>
                        </div>
                        <span
                            class="ms-2 text-xs font-medium text-slate-500 group-hover:text-slate-700 transition">Ingat
                            Saya</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a class="text-xs font-semibold text-emerald-600 hover:text-emerald-500 hover:underline transition"
                            href="{{ route('password.request') }}">
                            Lupa Password?
                        </a>
                    @endif
                </div>

                <button type="submit"
                    class="w-full py-3 px-4 bg-emerald-600 hover:bg-emerald-500 text-white font-bold rounded-xl shadow-lg shadow-emerald-600/20 hover:shadow-emerald-600/30 transition-all duration-200 transform hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500">
                    Login
                </button>
            </form>

            <div class="mt-8 pt-6 border-t border-slate-50 text-center">
                <a href="/"
                    class="inline-flex items-center gap-2 text-xs font-medium text-slate-400 hover:text-emerald-600 transition-colors group">
                    <svg class="w-3 h-3 transition-transform group-hover:-translate-x-1" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Kembali ke Beranda
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
