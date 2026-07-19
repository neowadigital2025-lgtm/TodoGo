@extends('layouts.app')

@section('title', 'Pengaturan')

@section('content')
<div class="max-w-4xl mx-auto space-y-6" x-data="{ tab: 'general' }">

    {{-- Header --}}
    <x-ui.section-header
        title="Pengaturan"
        description="Kelola preferensi dan konfigurasi akunmu." />

    <div class="flex flex-col lg:flex-row gap-6">

        {{-- ── Tab sidebar ─────────────────────────────────────────── --}}
        <nav class="lg:w-52 shrink-0">
            <div class="bg-white border border-slate-100 rounded-xl overflow-hidden">
                @php
                $tabs = [
                    ['key'=>'general',    'label'=>'Umum',             'icon'=>'<circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 2.83-2.83l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z"/>'],
                    ['key'=>'appearance', 'label'=>'Tampilan',         'icon'=>'<circle cx="12" cy="12" r="3"/><path d="M12 1v2M12 21v2M4.22 4.22l1.42 1.42M18.36 18.36l1.42 1.42M1 12h2M21 12h2M4.22 19.78l1.42-1.42M18.36 5.64l1.42-1.42"/>'],
                    ['key'=>'notif',      'label'=>'Notifikasi',       'icon'=>'<path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/>'],
                    ['key'=>'security',   'label'=>'Keamanan',         'icon'=>'<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>'],
                    ['key'=>'language',   'label'=>'Bahasa',           'icon'=>'<circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/>'],
                    ['key'=>'accounts',   'label'=>'Akun Terhubung',   'icon'=>'<path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/>'],
                ];
                @endphp
                @foreach ($tabs as $t)
                <button @click="tab = '{{ $t['key'] }}'"
                        :class="tab === '{{ $t['key'] }}' ? 'bg-blue-50 text-blue-600 font-semibold' : 'text-slate-600 hover:bg-slate-50'"
                        class="w-full flex items-center gap-3 px-4 py-3 text-sm transition-colors duration-150
                               border-b border-slate-50 last:border-0">
                    <svg class="w-4 h-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                         stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                        {!! $t['icon'] !!}
                    </svg>
                    {{ $t['label'] }}
                </button>
                @endforeach
            </div>
        </nav>

        {{-- ── Tab panels ──────────────────────────────────────────── --}}
        <div class="flex-1 min-w-0">

            {{-- General --}}
            <div x-show="tab === 'general'" class="space-y-4">
                <div class="bg-white border border-slate-100 rounded-xl p-6 space-y-5">
                    <h2 class="text-sm font-bold text-slate-800">Informasi Umum</h2>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="space-y-1.5">
                            <label class="text-xs font-semibold text-slate-600">Nama Aplikasi</label>
                            <input type="text" value="TodoGo"
                                   class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg
                                          focus:outline-none focus:ring-2 focus:ring-blue-500 transition" />
                        </div>
                        <div class="space-y-1.5">
                            <label class="text-xs font-semibold text-slate-600">Zona Waktu</label>
                            <select class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg
                                          focus:outline-none focus:ring-2 focus:ring-blue-500 transition text-slate-700">
                                <option>Asia/Jakarta (WIB)</option>
                                <option>Asia/Makassar (WITA)</option>
                                <option>Asia/Jayapura (WIT)</option>
                            </select>
                        </div>
                        <div class="space-y-1.5">
                            <label class="text-xs font-semibold text-slate-600">Format Tanggal</label>
                            <select class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg
                                          focus:outline-none focus:ring-2 focus:ring-blue-500 transition text-slate-700">
                                <option>DD/MM/YYYY</option>
                                <option>MM/DD/YYYY</option>
                                <option>YYYY-MM-DD</option>
                            </select>
                        </div>
                        <div class="space-y-1.5">
                            <label class="text-xs font-semibold text-slate-600">Hari Mulai Minggu</label>
                            <select class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg
                                          focus:outline-none focus:ring-2 focus:ring-blue-500 transition text-slate-700">
                                <option>Senin</option>
                                <option>Minggu</option>
                            </select>
                        </div>
                    </div>

                    <div class="pt-2">
                        <button class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm
                                       font-semibold rounded-lg transition-colors">
                            Simpan Perubahan
                        </button>
                    </div>
                </div>
            </div>

            {{-- Appearance --}}
            <div x-show="tab === 'appearance'" x-cloak class="space-y-4">
                <div class="bg-white border border-slate-100 rounded-xl p-6 space-y-5">
                    <h2 class="text-sm font-bold text-slate-800">Tampilan</h2>

                    <div class="space-y-1.5">
                        <label class="text-xs font-semibold text-slate-600">Tema</label>
                        <div class="grid grid-cols-3 gap-3" x-data="{ theme: 'light' }">
                            @foreach(['light'=>'Terang','dark'=>'Gelap','system'=>'Sistem'] as $k => $v)
                            <button @click="theme = '{{ $k }}'"
                                    :class="theme === '{{ $k }}' ? 'border-blue-500 bg-blue-50' : 'border-slate-200 hover:border-slate-300'"
                                    class="flex flex-col items-center gap-2 p-3 border-2 rounded-xl transition-all">
                                <div class="w-8 h-8 rounded-lg {{ $k === 'dark' ? 'bg-slate-800' : ($k === 'system' ? 'bg-gradient-to-br from-white to-slate-800' : 'bg-slate-100') }} border border-slate-200"></div>
                                <span class="text-xs font-medium text-slate-600">{{ $v }}</span>
                            </button>
                            @endforeach
                        </div>
                    </div>

                    <div class="space-y-1.5">
                        <label class="text-xs font-semibold text-slate-600">Ukuran Font</label>
                        <select class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg
                                      focus:outline-none focus:ring-2 focus:ring-blue-500 transition text-slate-700">
                            <option>Kecil</option>
                            <option selected>Normal</option>
                            <option>Besar</option>
                        </select>
                    </div>

                    <div class="flex items-center justify-between py-2">
                        <div>
                            <p class="text-sm font-medium text-slate-700">Animasi UI</p>
                            <p class="text-xs text-slate-400">Aktifkan transisi dan animasi halus.</p>
                        </div>
                        <button x-data="{ on: true }" @click="on = !on"
                                :class="on ? 'bg-blue-600' : 'bg-slate-200'"
                                class="relative w-10 h-6 rounded-full transition-colors duration-200 shrink-0">
                            <span :class="on ? 'translate-x-5' : 'translate-x-1'"
                                  class="absolute top-1 w-4 h-4 bg-white rounded-full shadow transition-transform duration-200"></span>
                        </button>
                    </div>

                    <div class="pt-2">
                        <button class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm
                                       font-semibold rounded-lg transition-colors">
                            Simpan Perubahan
                        </button>
                    </div>
                </div>
            </div>

            {{-- Notifications --}}
            <div x-show="tab === 'notif'" x-cloak class="space-y-4">
                <div class="bg-white border border-slate-100 rounded-xl p-6 space-y-4">
                    <h2 class="text-sm font-bold text-slate-800">Preferensi Notifikasi</h2>
                    @php $notifRows = [
                        ['label'=>'Tugas baru ditugaskan',  'desc'=>'Terima notifikasi saat ada tugas baru.'],
                        ['label'=>'Pengingat deadline',      'desc'=>'Notifikasi H-1 sebelum jatuh tempo.'],
                        ['label'=>'Komentar & mention',      'desc'=>'Saat ada yang menyebut namamu.'],
                        ['label'=>'Anggota baru',            'desc'=>'Saat ada anggota baru bergabung.'],
                        ['label'=>'Update workspace',        'desc'=>'Perubahan pada workspace kamu.'],
                    ]; @endphp
                    @foreach ($notifRows as $r)
                    <div class="flex items-center justify-between py-2 border-b border-slate-50 last:border-0">
                        <div class="min-w-0 mr-4">
                            <p class="text-sm font-medium text-slate-700">{{ $r['label'] }}</p>
                            <p class="text-xs text-slate-400">{{ $r['desc'] }}</p>
                        </div>
                        <button x-data="{ on: true }" @click="on = !on"
                                :class="on ? 'bg-blue-600' : 'bg-slate-200'"
                                class="relative w-10 h-6 rounded-full transition-colors duration-200 shrink-0">
                            <span :class="on ? 'translate-x-5' : 'translate-x-1'"
                                  class="absolute top-1 w-4 h-4 bg-white rounded-full shadow transition-transform duration-200"></span>
                        </button>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Security --}}
            <div x-show="tab === 'security'" x-cloak class="space-y-4">
                <div class="bg-white border border-slate-100 rounded-xl p-6 space-y-5">
                    <h2 class="text-sm font-bold text-slate-800">Keamanan Akun</h2>

                    <div class="space-y-1.5">
                        <label class="text-xs font-semibold text-slate-600">Email Aktif</label>
                        <input type="email" value="{{ auth()->user()->email ?? 'user@example.com' }}"
                               class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg bg-slate-50
                                      text-slate-500 cursor-not-allowed" readonly />
                    </div>

                    <div class="flex items-center justify-between p-4 bg-slate-50 rounded-xl">
                        <div>
                            <p class="text-sm font-semibold text-slate-700">Autentikasi Dua Faktor</p>
                            <p class="text-xs text-slate-400 mt-0.5">Tambahkan lapisan keamanan ekstra.</p>
                        </div>
                        <button class="px-3 py-1.5 bg-blue-600 hover:bg-blue-700 text-white text-xs
                                       font-semibold rounded-lg transition-colors">
                            Aktifkan
                        </button>
                    </div>

                    <div class="flex items-center justify-between p-4 bg-slate-50 rounded-xl">
                        <div>
                            <p class="text-sm font-semibold text-slate-700">Sesi Aktif</p>
                            <p class="text-xs text-slate-400 mt-0.5">1 sesi aktif saat ini.</p>
                        </div>
                        <button class="px-3 py-1.5 bg-red-50 hover:bg-red-100 text-red-600 text-xs
                                       font-semibold rounded-lg transition-colors">
                            Akhiri Semua
                        </button>
                    </div>
                </div>
            </div>

            {{-- Language --}}
            <div x-show="tab === 'language'" x-cloak class="space-y-4">
                <div class="bg-white border border-slate-100 rounded-xl p-6 space-y-5">
                    <h2 class="text-sm font-bold text-slate-800">Bahasa & Wilayah</h2>
                    <div class="space-y-1.5">
                        <label class="text-xs font-semibold text-slate-600">Bahasa Aplikasi</label>
                        <select class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg
                                      focus:outline-none focus:ring-2 focus:ring-blue-500 transition text-slate-700">
                            <option selected>Bahasa Indonesia</option>
                            <option>English</option>
                            <option>日本語</option>
                        </select>
                    </div>
                    <div class="space-y-1.5">
                        <label class="text-xs font-semibold text-slate-600">Format Angka</label>
                        <select class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg
                                      focus:outline-none focus:ring-2 focus:ring-blue-500 transition text-slate-700">
                            <option>1.000,00 (ID)</option>
                            <option>1,000.00 (EN)</option>
                        </select>
                    </div>
                    <div class="pt-2">
                        <button class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm
                                       font-semibold rounded-lg transition-colors">
                            Simpan Perubahan
                        </button>
                    </div>
                </div>
            </div>

            {{-- Connected accounts --}}
            <div x-show="tab === 'accounts'" x-cloak class="space-y-4">
                <div class="bg-white border border-slate-100 rounded-xl p-6 space-y-4">
                    <h2 class="text-sm font-bold text-slate-800">Akun Terhubung</h2>
                    @php $connected = [
                        ['name'=>'Google',   'icon_bg'=>'bg-red-50',  'icon_color'=>'text-red-500',  'connected'=>true,  'email'=>auth()->user()->email ?? 'user@gmail.com'],
                        ['name'=>'GitHub',   'icon_bg'=>'bg-slate-100','icon_color'=>'text-slate-700','connected'=>false, 'email'=>null],
                        ['name'=>'Notion',   'icon_bg'=>'bg-slate-100','icon_color'=>'text-slate-700','connected'=>false, 'email'=>null],
                    ]; @endphp
                    @foreach ($connected as $acc)
                    <div class="flex items-center justify-between p-4 border border-slate-100 rounded-xl
                                hover:bg-slate-50 transition-colors">
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 rounded-xl {{ $acc['icon_bg'] }} flex items-center
                                        justify-center shrink-0">
                                <span class="text-sm font-bold {{ $acc['icon_color'] }}">
                                    {{ substr($acc['name'], 0, 1) }}
                                </span>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-slate-700">{{ $acc['name'] }}</p>
                                @if ($acc['connected'])
                                    <p class="text-xs text-slate-400">{{ $acc['email'] }}</p>
                                @else
                                    <p class="text-xs text-slate-400">Belum terhubung</p>
                                @endif
                            </div>
                        </div>
                        @if ($acc['connected'])
                            <button class="px-3 py-1.5 bg-red-50 hover:bg-red-100 text-red-600 text-xs
                                           font-semibold rounded-lg transition-colors">
                                Putuskan
                            </button>
                        @else
                            <button class="px-3 py-1.5 bg-blue-50 hover:bg-blue-100 text-blue-600 text-xs
                                           font-semibold rounded-lg transition-colors">
                                Hubungkan
                            </button>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>

        </div>{{-- /panels --}}
    </div>{{-- /flex --}}
</div>
@endsection
