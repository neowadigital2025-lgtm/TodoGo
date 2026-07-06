{{-- Mobile Navbar --}}
<nav class="flex lg:hidden items-center justify-between h-16 px-4 bg-blue-50/80 backdrop-blur-xl border-b border-slate-200 sticky top-0 z-50">
    {{-- Logo --}}
    <a href="/" class="flex items-center gap-2">
        <img
            src="{{ asset('images/todogo-logo.png') }}"
            alt="TodoGo"
            class="w-10 h-10 rounded-lg object-cover object-top">

        <span class="text-2xl font-bold text-slate-900">
            Todo<span class="text-blue-600">Go</span>
        </span>
    </a>

    {{-- Right Side --}}
    <div class="flex items-center gap-2">

        {{-- Login --}}
        <a
            href="{{ route('login') }}"
            class="hidden sm:block text-sm font-semibold text-slate-600 hover:text-blue-600 transition">
            Masuk
        </a>

        {{-- Sign Up --}}
        <a
            href="{{ route('register') }}"
            class="hidden sm:flex items-center justify-center px-4 py-2 rounded-xl bg-blue-600 text-white text-sm font-semibold hover:bg-blue-700 transition">
            Daftar
        </a>

        {{-- Hamburger --}}
        <button
            @click="open = true"
            class="w-10 h-10 rounded-xl border border-slate-200 hover:bg-slate-100 flex items-center justify-center transition">

            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="w-6 h-6"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor">

                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16"/>

            </svg>

        </button>

    </div>

</nav>