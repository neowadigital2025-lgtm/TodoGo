<div class="bg-white rounded-3xl shadow-sm border border-slate-200 p-8">

    <div class="flex items-center justify-between">

        {{-- Bagian Kiri --}}
        <div>

            <h1 class="text-3xl font-bold text-slate-900">
                👋 Halo {{ auth()->user()->name }}
            </h1>

            <p class="mt-2 text-slate-500">
                Mari selesaikan tugasmu hari ini.
            </p>

        </div>

        {{-- Bagian Kanan --}}
        <div class="text-right">

            <p class="text-sm text-slate-500">
                {{ now()->translatedFormat('l, d F Y') }}
            </p>

        </div>

    </div>

</div>