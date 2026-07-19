@extends('layouts.app')

@section('title', 'Profil')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">

    <x-ui.section-header
        title="Profil Saya"
        description="Kelola informasi pribadi dan akunmu." />

    {{-- Avatar section --}}
    <div class="bg-white border border-slate-100 rounded-xl p-6">
        <h2 class="text-sm font-bold text-slate-800 mb-5">Foto Profil</h2>
        <div class="flex items-center gap-5">
            <div class="relative shrink-0">
                <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name ?? 'User') }}&background=2563EB&color=fff&size=80&bold=true"
                     alt="Avatar"
                     class="w-20 h-20 rounded-full ring-4 ring-slate-100 object-cover" />
                <button class="absolute -bottom-1 -right-1 w-7 h-7 bg-blue-600 rounded-full
                               flex items-center justify-center hover:bg-blue-700 transition-colors shadow-md">
                    <svg class="w-3.5 h-3.5 text-white" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/>
                    </svg>
                </button>
            </div>
            <div>
                <p class="text-sm font-semibold text-slate-800">{{ auth()->user()->name ?? 'Pengguna' }}</p>
                <p class="text-xs text-slate-400 mt-0.5">{{ auth()->user()->email ?? '' }}</p>
                <div class="flex items-center gap-2 mt-3">
                    <button class="px-3 py-1.5 bg-blue-600 hover:bg-blue-700 text-white text-xs
                                   font-semibold rounded-lg transition-colors">
                        Upload Foto
                    </button>
                    <button class="px-3 py-1.5 bg-slate-100 hover:bg-slate-200 text-slate-600 text-xs
                                   font-semibold rounded-lg transition-colors">
                        Hapus
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- Personal info --}}
    <div class="bg-white border border-slate-100 rounded-xl p-6">
        <h2 class="text-sm font-bold text-slate-800 mb-5">Informasi Pribadi</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div class="space-y-1.5">
                <label class="text-xs font-semibold text-slate-600">Nama Lengkap</label>
                <input type="text" value="{{ auth()->user()->name ?? '' }}"
                       class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg
                              focus:outline-none focus:ring-2 focus:ring-blue-500 transition" />
            </div>
            <div class="space-y-1.5">
                <label class="text-xs font-semibold text-slate-600">Username</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-3 flex items-center text-slate-400 text-sm">@</span>
                    <input type="text" value="{{ auth()->user()->username ?? '' }}"
                           class="w-full pl-7 pr-3 py-2 text-sm border border-slate-200 rounded-lg
                                  focus:outline-none focus:ring-2 focus:ring-blue-500 transition" />
                </div>
            </div>
            <div class="space-y-1.5 sm:col-span-2">
                <label class="text-xs font-semibold text-slate-600">Email</label>
                <input type="email" value="{{ auth()->user()->email ?? '' }}"
                       class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg bg-slate-50
                              text-slate-500 cursor-not-allowed" readonly />
                <p class="text-xs text-slate-400">Email tidak dapat diubah. Hubungi support jika perlu.</p>
            </div>
            <div class="space-y-1.5">
                <label class="text-xs font-semibold text-slate-600">Jabatan / Role</label>
                <input type="text" placeholder="Contoh: Frontend Developer"
                       class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg
                              focus:outline-none focus:ring-2 focus:ring-blue-500 transition" />
            </div>
            <div class="space-y-1.5">
                <label class="text-xs font-semibold text-slate-600">Nomor Telepon</label>
                <input type="tel" placeholder="+62 ..."
                       class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg
                              focus:outline-none focus:ring-2 focus:ring-blue-500 transition" />
            </div>
            <div class="space-y-1.5 sm:col-span-2">
                <label class="text-xs font-semibold text-slate-600">Bio</label>
                <textarea rows="3" placeholder="Ceritakan sedikit tentang dirimu..."
                          class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg
                                 focus:outline-none focus:ring-2 focus:ring-blue-500 transition
                                 resize-none"></textarea>
            </div>
        </div>
        <div class="mt-5 flex items-center gap-3">
            <button class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm
                           font-semibold rounded-lg transition-colors">
                Simpan Perubahan
            </button>
            <button class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-600 text-sm
                           font-semibold rounded-lg transition-colors">
                Batalkan
            </button>
        </div>
    </div>

    {{-- Account info --}}
    <div class="bg-white border border-slate-100 rounded-xl p-6">
        <h2 class="text-sm font-bold text-slate-800 mb-4">Informasi Akun</h2>
        <div class="space-y-3">
            @php $infos = [
                ['label'=>'Member sejak',     'value'=>'1 Januari 2025'],
                ['label'=>'Paket aktif',      'value'=>'Pro Plan'],
                ['label'=>'Login terakhir',   'value'=>'Hari ini, 09:32'],
                ['label'=>'Status akun',      'value'=>'Aktif'],
            ]; @endphp
            @foreach ($infos as $info)
            <div class="flex items-center justify-between py-2.5 border-b border-slate-50 last:border-0">
                <span class="text-sm text-slate-500">{{ $info['label'] }}</span>
                <span class="text-sm font-semibold text-slate-800">{{ $info['value'] }}</span>
            </div>
            @endforeach
        </div>
    </div>

    {{-- Danger zone --}}
    <div class="bg-white border border-red-100 rounded-xl p-6">
        <h2 class="text-sm font-bold text-red-600 mb-1">Zona Berbahaya</h2>
        <p class="text-xs text-slate-400 mb-4">Tindakan di bawah ini tidak dapat dibatalkan.</p>
        <button class="px-4 py-2 bg-red-50 hover:bg-red-100 text-red-600 text-sm
                       font-semibold rounded-lg transition-colors border border-red-200">
            Hapus Akun Saya
        </button>
    </div>

</div>
@endsection
