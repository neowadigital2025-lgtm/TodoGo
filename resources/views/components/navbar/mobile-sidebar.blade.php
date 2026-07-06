{{-- Overlay --}}
<div
    x-show="open"
    x-cloak
    x-transition.opacity
    @click="open = false"
    class="fixed inset-0 bg-black/40 backdrop-blur-sm z-40 lg:hidden">
</div>

{{-- Sidebar --}}
<aside

    x-show="open"
    x-cloak

    @keydown.escape.window="open = false"

    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="translate-x-full"
    x-transition:enter-end="translate-x-0"

    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="translate-x-0"
    x-transition:leave-end="translate-x-full"

    class="fixed top-0 right-0 h-screen w-80 bg-white z-50 shadow-2xl lg:hidden flex flex-col">

    {{-- Header --}}
    <div class="flex items-center justify-between h-20 px-6 border-b">

        <div class="flex items-center gap-3">

            <img
                src="{{ asset('images/todogo-logo.png') }}"
                class="w-10 h-10 rounded-lg">

            <span class="text-2xl font-bold">
                Todo<span class="text-blue-600">Go</span>
            </span>

        </div>

        <button
            @click="open=false"
            class="w-10 h-10 rounded-xl hover:bg-slate-100 flex items-center justify-center">

            ✕

        </button>

    </div>

    {{-- Menu --}}
    <nav class="flex-1 py-6 px-6 space-y-2">

        <a href="#solusi" @click="open=false"
            class="block rounded-xl px-4 py-3 hover:bg-slate-100 transition">
            💡 Solusi
        </a>

        <a href="#fitur" @click="open=false"
            class="block rounded-xl px-4 py-3 hover:bg-slate-100 transition">
            ✨ Fitur
        </a>

        <a href="#demo" @click="open=false"
            class="block rounded-xl px-4 py-3 hover:bg-slate-100 transition">
            🎬 Demo
        </a>

        <a href="#harga" @click="open=false"
            class="block rounded-xl px-4 py-3 hover:bg-slate-100 transition">
            💰 Harga
        </a>

        <a href="#tentang" @click="open=false"
            class="block rounded-xl px-4 py-3 hover:bg-slate-100 transition">
            ℹ️ Tentang
        </a>

    </nav>

    {{-- Footer --}}
    <div class="border-t p-6">

        <a
            href="{{ route('login') }}"
            class="block w-full text-center py-3 rounded-xl border border-slate-300 font-semibold hover:bg-slate-50">

            Masuk

        </a>

        <a
            href="{{ route('register') }}"
            class="block w-full text-center py-3 mt-3 rounded-xl bg-blue-600 text-white font-semibold hover:bg-blue-700">

            Mulai Gratis

        </a>

    </div>

</aside>