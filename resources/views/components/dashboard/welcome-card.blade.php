{{-- ════════════════════════════════════════════════════════
     Welcome Card
     Usage: <x-dashboard.welcome-card />
════════════════════════════════════════════════════════ --}}

<div>
    <h1 class="text-xl sm:text-2xl font-bold text-slate-800 leading-tight">
        Selamat datang kembali, {{ auth()->user()->name ?? 'Pengguna' }}! 👋
    </h1>
    <p class="mt-1 text-sm text-slate-500">
        Ayo selesaikan tugasmu hari ini dan jadi lebih produktif.
    </p>
</div>
