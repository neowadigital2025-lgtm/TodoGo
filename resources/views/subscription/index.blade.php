@extends('layouts.app')

@section('title', 'Langganan')

@section('content')
@php
$plans = [
    [
        'name'    => 'Free',
        'price'   => 'Rp 0',
        'period'  => '/ bulan',
        'desc'    => 'Untuk individu yang baru memulai.',
        'current' => false,
        'color'   => 'border-slate-200',
        'badge'   => null,
        'features'=> ['3 workspace','10 tugas / workspace','Akses kalender dasar','Support email'],
    ],
    [
        'name'    => 'Pro',
        'price'   => 'Rp 49.000',
        'period'  => '/ bulan',
        'desc'    => 'Untuk profesional dan freelancer.',
        'current' => true,
        'color'   => 'border-blue-500',
        'badge'   => 'Aktif',
        'features'=> ['Unlimited workspace','Unlimited tugas','Kalender penuh','Notifikasi lanjutan','Prioritas support','Ekspor data'],
    ],
    [
        'name'    => 'Team',
        'price'   => 'Rp 149.000',
        'period'  => '/ bulan',
        'desc'    => 'Untuk tim kecil hingga menengah.',
        'current' => false,
        'color'   => 'border-slate-200',
        'badge'   => null,
        'features'=> ['Semua fitur Pro','Hingga 20 anggota tim','Admin dashboard','SSO & keamanan lanjutan','API access','Dedicated support'],
    ],
];
$history = [
    ['date'=>'1 Mei 2025', 'plan'=>'Pro','amount'=>'Rp 49.000','status'=>'Lunas'],
    ['date'=>'1 Apr 2025', 'plan'=>'Pro','amount'=>'Rp 49.000','status'=>'Lunas'],
    ['date'=>'1 Mar 2025', 'plan'=>'Pro','amount'=>'Rp 49.000','status'=>'Lunas'],
    ['date'=>'1 Feb 2025', 'plan'=>'Pro','amount'=>'Rp 49.000','status'=>'Lunas'],
];
@endphp

<div class="max-w-screen-xl mx-auto space-y-8">

    {{-- Header --}}
    <x-ui.section-header
        title="Langganan"
        description="Kelola paket dan riwayat pembayaranmu." />

    {{-- Current plan banner --}}
    <div class="bg-gradient-to-r from-blue-600 to-blue-700 rounded-2xl p-6 text-white
                flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
        <div>
            <p class="text-sm font-medium text-blue-200">Paket Aktif</p>
            <p class="text-2xl font-bold mt-0.5">Pro Plan</p>
            <p class="text-sm text-blue-200 mt-1">Diperpanjang otomatis pada 1 Juni 2025</p>
        </div>
        <div class="flex items-center gap-3 shrink-0">
            <span class="px-3 py-1.5 bg-white/20 rounded-lg text-sm font-semibold">
                Rp 49.000 / bulan
            </span>
            <button class="px-4 py-2 bg-white text-blue-600 text-sm font-semibold rounded-lg
                           hover:bg-blue-50 transition-colors">
                Kelola
            </button>
        </div>
    </div>

    {{-- Plan cards --}}
    <div>
        <h2 class="text-base font-bold text-slate-800 mb-4">Pilih Paket</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
            @foreach ($plans as $plan)
            <div class="bg-white border-2 {{ $plan['color'] }} rounded-2xl p-6 flex flex-col
                        {{ $plan['current'] ? 'shadow-md shadow-blue-100' : '' }}">
                <div class="flex items-center justify-between mb-4">
                    <p class="text-base font-bold text-slate-800">{{ $plan['name'] }}</p>
                    @if ($plan['badge'])
                        <x-ui.badge color="blue">{{ $plan['badge'] }}</x-ui.badge>
                    @endif
                </div>

                <p class="text-3xl font-extrabold text-slate-800">
                    {{ $plan['price'] }}
                    <span class="text-sm font-normal text-slate-400">{{ $plan['period'] }}</span>
                </p>
                <p class="text-xs text-slate-500 mt-1 mb-5">{{ $plan['desc'] }}</p>

                <ul class="space-y-2 flex-1 mb-6">
                    @foreach ($plan['features'] as $f)
                    <li class="flex items-center gap-2 text-sm text-slate-600">
                        <svg class="w-4 h-4 text-green-500 shrink-0" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12"/>
                        </svg>
                        {{ $f }}
                    </li>
                    @endforeach
                </ul>

                @if ($plan['current'])
                    <button disabled
                            class="w-full py-2.5 bg-blue-600 text-white text-sm font-semibold
                                   rounded-xl opacity-60 cursor-not-allowed">
                        Paket Saat Ini
                    </button>
                @else
                    <button class="w-full py-2.5 bg-slate-100 hover:bg-blue-600 hover:text-white
                                   text-slate-700 text-sm font-semibold rounded-xl transition-colors duration-200">
                        Pilih Paket
                    </button>
                @endif
            </div>
            @endforeach
        </div>
    </div>

    {{-- Payment history --}}
    <div>
        <h2 class="text-base font-bold text-slate-800 mb-4">Riwayat Pembayaran</h2>
        <div class="bg-white border border-slate-100 rounded-xl overflow-hidden">
            <div class="hidden sm:grid grid-cols-4 px-5 py-3 bg-slate-50 border-b border-slate-100
                        text-[11px] font-semibold uppercase tracking-wider text-slate-400">
                <div>Tanggal</div><div>Paket</div><div>Jumlah</div><div>Status</div>
            </div>
            <ul class="divide-y divide-slate-50">
                @foreach ($history as $h)
                <li class="grid grid-cols-2 sm:grid-cols-4 gap-4 items-center px-5 py-3.5
                           hover:bg-slate-50 transition-colors">
                    <span class="text-sm text-slate-700">{{ $h['date'] }}</span>
                    <span class="text-sm text-slate-600">{{ $h['plan'] }}</span>
                    <span class="text-sm font-medium text-slate-800">{{ $h['amount'] }}</span>
                    <x-ui.badge color="green">{{ $h['status'] }}</x-ui.badge>
                </li>
                @endforeach
            </ul>
        </div>
    </div>

</div>
@endsection
