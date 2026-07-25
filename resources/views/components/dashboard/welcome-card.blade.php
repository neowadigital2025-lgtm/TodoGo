<div class="bg-white rounded-3xl shadow-sm border border-slate-200 p-8">

    <div class="flex items-center justify-between">

        {{-- Bagian Kiri --}}
        <div>

            <h1 class="text-xl font-bold text-slate-900">
                Selamat datang kembali, {{ auth()->user()->name }}! 👋
            </h1>

            <p class="mt-2 text-sm text-slate-500">
                Ayo selesaikan tugasmu hari ini dan jadi lebih produktif!
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