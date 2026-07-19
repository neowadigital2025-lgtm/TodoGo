@extends('layouts.app')

@section('title', 'Pusat Bantuan')

@section('content')
@php
$faqs = [
    ['q'=>'Bagaimana cara membuat tugas baru?',          'a'=>'Klik tombol "+" di navbar atau gunakan tombol "Buat Tugas" di halaman Tugas. Isi judul, prioritas, dan tanggal deadline.'],
    ['q'=>'Apakah saya bisa mengundang anggota tim?',    'a'=>'Ya, masuk ke halaman Workspace, pilih workspace, dan klik "Undang Anggota". Masukkan email yang ingin diundang.'],
    ['q'=>'Bagaimana cara mengubah paket langganan?',    'a'=>'Buka halaman Langganan dari sidebar, lalu pilih paket yang sesuai dan klik "Pilih Paket".'],
    ['q'=>'Apakah data saya aman?',                     'a'=>'Semua data dienkripsi dan disimpan secara aman. Kami menggunakan standar enkripsi industri untuk melindungi informasimu.'],
    ['q'=>'Bisakah saya mengekspor data tugas saya?',   'a'=>'Fitur ekspor tersedia untuk pengguna Pro ke atas. Buka pengaturan dan pilih "Ekspor Data".'],
    ['q'=>'Bagaimana cara mereset password?',            'a'=>'TodoGo menggunakan Magic Link — cukup masukkan emailmu di halaman login dan kami akan mengirim link akses.'],
];

$docs = [
    ['title'=>'Panduan Memulai',          'desc'=>'Pelajari cara menggunakan TodoGo dari awal.', 'icon_bg'=>'bg-blue-50', 'icon_color'=>'text-blue-600'],
    ['title'=>'Manajemen Tugas',          'desc'=>'Cara membuat, mengedit, dan mengorganisir tugas.', 'icon_bg'=>'bg-green-50', 'icon_color'=>'text-green-600'],
    ['title'=>'Workspace & Kolaborasi',  'desc'=>'Bekerja sama dengan tim di satu workspace.', 'icon_bg'=>'bg-purple-50', 'icon_color'=>'text-purple-600'],
    ['title'=>'API Reference',            'desc'=>'Integrasi TodoGo dengan aplikasi lain.', 'icon_bg'=>'bg-orange-50', 'icon_color'=>'text-orange-600'],
    ['title'=>'Keamanan & Privasi',       'desc'=>'Kebijakan data dan keamanan akun.', 'icon_bg'=>'bg-red-50', 'icon_color'=>'text-red-500'],
    ['title'=>'Billing & Pembayaran',     'desc'=>'Informasi paket, tagihan, dan pembayaran.', 'icon_bg'=>'bg-yellow-50', 'icon_color'=>'text-yellow-600'],
];
@endphp

<div class="max-w-screen-xl mx-auto space-y-8">

    {{-- Hero --}}
    <div class="bg-gradient-to-br from-blue-600 to-blue-700 rounded-2xl p-8 text-center text-white">
        <h1 class="text-2xl font-bold mb-2">Pusat Bantuan TodoGo</h1>
        <p class="text-blue-200 text-sm mb-6">Temukan jawaban atas pertanyaanmu dengan cepat.</p>
        <div class="max-w-md mx-auto relative">
            <svg class="absolute left-3.5 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400 pointer-events-none"
                 viewBox="0 0 24 24" fill="none" stroke="currentColor"
                 stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>
            </svg>
            <input type="text" placeholder="Cari pertanyaan atau topik..."
                   class="w-full pl-10 pr-4 py-3 text-sm rounded-xl border-0 bg-white text-slate-700
                          placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-300 shadow-sm" />
        </div>
    </div>

    {{-- Documentation cards --}}
    <div>
        <h2 class="text-base font-bold text-slate-800 mb-4">Dokumentasi</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($docs as $doc)
            <a href="#"
               class="bg-white border border-slate-100 rounded-xl p-5 flex items-start gap-4
                      hover:shadow-sm hover:border-slate-200 transition-all duration-150 group">
                <div class="w-10 h-10 rounded-xl {{ $doc['icon_bg'] }} flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5 {{ $doc['icon_color'] }}" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                        <polyline points="14 2 14 8 20 8"/>
                        <line x1="16" y1="13" x2="8" y2="13"/>
                        <line x1="16" y1="17" x2="8" y2="17"/>
                        <polyline points="10 9 9 9 8 9"/>
                    </svg>
                </div>
                <div class="min-w-0">
                    <p class="text-sm font-semibold text-slate-800 group-hover:text-blue-600
                              transition-colors">{{ $doc['title'] }}</p>
                    <p class="text-xs text-slate-500 mt-0.5 leading-relaxed">{{ $doc['desc'] }}</p>
                </div>
            </a>
            @endforeach
        </div>
    </div>

    {{-- FAQ --}}
    <div>
        <h2 class="text-base font-bold text-slate-800 mb-4">Pertanyaan Umum</h2>
        <div class="bg-white border border-slate-100 rounded-xl overflow-hidden"
             x-data="{ open: null }">
            @foreach ($faqs as $i => $faq)
            <div class="border-b border-slate-50 last:border-0">
                <button @click="open = open === {{ $i }} ? null : {{ $i }}"
                        class="w-full flex items-center justify-between px-5 py-4
                               hover:bg-slate-50 transition-colors duration-150 text-left">
                    <span class="text-sm font-semibold text-slate-800 pr-4">{{ $faq['q'] }}</span>
                    <svg :class="open === {{ $i }} ? 'rotate-180' : ''"
                         class="w-4 h-4 text-slate-400 shrink-0 transition-transform duration-200"
                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="6 9 12 15 18 9"/>
                    </svg>
                </button>
                <div x-show="open === {{ $i }}"
                     x-transition:enter="transition ease-out duration-150"
                     x-transition:enter-start="opacity-0 -translate-y-1"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     class="px-5 pb-4">
                    <p class="text-sm text-slate-500 leading-relaxed">{{ $faq['a'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- Contact support --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        @php $contacts = [
            ['icon_bg'=>'bg-blue-50','icon_color'=>'text-blue-600','title'=>'Email Support','desc'=>'Kirim email ke tim kami.','action'=>'Kirim Email','icon'=>'<path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/>'],
            ['icon_bg'=>'bg-green-50','icon_color'=>'text-green-600','title'=>'Live Chat','desc'=>'Chat langsung dengan tim.','action'=>'Mulai Chat','icon'=>'<path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>'],
            ['icon_bg'=>'bg-purple-50','icon_color'=>'text-purple-600','title'=>'Komunitas','desc'=>'Bergabung ke forum pengguna.','action'=>'Bergabung','icon'=>'<path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>'],
        ]; @endphp
        @foreach ($contacts as $c)
        <div class="bg-white border border-slate-100 rounded-xl p-5 text-center
                    hover:shadow-sm transition-shadow duration-150">
            <div class="w-11 h-11 rounded-xl {{ $c['icon_bg'] }} flex items-center
                        justify-center mx-auto mb-3">
                <svg class="w-5 h-5 {{ $c['icon_color'] }}" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                    {!! $c['icon'] !!}
                </svg>
            </div>
            <p class="text-sm font-bold text-slate-800">{{ $c['title'] }}</p>
            <p class="text-xs text-slate-400 mt-0.5 mb-4">{{ $c['desc'] }}</p>
            <button class="w-full py-2 bg-slate-100 hover:bg-blue-600 hover:text-white text-slate-700
                           text-xs font-semibold rounded-lg transition-colors duration-200">
                {{ $c['action'] }}
            </button>
        </div>
        @endforeach
    </div>

</div>
@endsection
