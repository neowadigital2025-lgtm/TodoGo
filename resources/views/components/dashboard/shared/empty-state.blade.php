{{-- ==========================================================
Component : Empty State
Folder    : dashboard/shared
Purpose   : Komponen empty state reusable untuk seluruh fitur di project.
            Menggantikan empty-task, empty-note, empty-workspace, empty-deadline
            menjadi satu komponen terpusat yang fleksibel.

Props:
  $title       — Judul empty state (string), default: "Belum ada data."
  $description — Deskripsi pendek (string), default: ""
  $buttonText  — Teks tombol aksi (string|null), default: null (tidak tampil)
  $buttonLink  — URL tombol aksi (string), default: "#"
  $icon        — Tipe ikon: task | note | workspace | deadline | default (string)

Contoh penggunaan:
  <x-dashboard.shared.empty-state
      title="Belum ada tugas."
      description="Mulailah membuat tugas pertamamu."
      buttonText="Tambah Tugas Baru"
      buttonLink="{{ route('tasks.create') }}"
      icon="task"
  />
========================================================== --}}

@props([
    'title'       => 'Belum ada data.',
    'description' => '',
    'buttonText'  => null,
    'buttonLink'  => '#',
    'icon'        => 'default',
])

@php
    $icons = [
        'task' => [
            'wrapper' => 'relative w-32 h-32 mb-6 text-blue-100',
            'bg'      => 'absolute inset-0 bg-blue-50 rounded-full animate-pulse opacity-50',
            'svg'     => 'relative z-10 w-full h-full text-blue-500',
            'path'    => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4',
            'btn'     => 'px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-xl transition-all duration-300 shadow-[0_4px_12px_-2px_rgba(37,99,235,0.3)] hover:shadow-[0_6px_20px_-4px_rgba(37,99,235,0.4)] hover:-translate-y-0.5',
        ],
        'workspace' => [
            'wrapper' => 'w-20 h-20 mb-5 text-indigo-100 relative',
            'bg'      => 'absolute inset-0 bg-indigo-50 rounded-2xl rotate-3',
            'svg'     => 'relative z-10 w-full h-full text-indigo-500 p-3',
            'path'    => 'M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10',
            'btn'     => 'px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold rounded-xl transition-all duration-300 shadow-[0_4px_12px_-2px_rgba(79,70,229,0.3)] hover:shadow-[0_6px_20px_-4px_rgba(79,70,229,0.4)] hover:-translate-y-0.5',
        ],
        'note' => [
            'wrapper' => 'w-16 h-16 mb-4 text-amber-200',
            'bg'      => null,
            'svg'     => 'w-full h-full text-amber-400',
            'path'    => 'M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z',
            'btn'     => 'px-5 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 text-sm font-semibold rounded-lg transition-colors',
        ],
        'deadline' => [
            'wrapper' => 'w-16 h-16 mb-4 text-emerald-200',
            'bg'      => null,
            'svg'     => 'w-full h-full text-emerald-500',
            'path'    => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z',
            'btn'     => 'px-5 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 text-sm font-semibold rounded-lg transition-colors',
        ],
        'default' => [
            'wrapper' => 'w-16 h-16 mb-4 text-slate-200',
            'bg'      => null,
            'svg'     => 'w-full h-full text-slate-400',
            'path'    => 'M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4',
            'btn'     => 'px-5 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 text-sm font-semibold rounded-lg transition-colors',
        ],
    ];

    $cfg = $icons[$icon] ?? $icons['default'];
@endphp

<div class="flex-1 flex flex-col items-center justify-center text-center py-12 px-4 bg-white rounded-xl border border-slate-100 border-dashed">

    {{-- Icon --}}
    <div class="{{ $cfg['wrapper'] }}">
        @if ($cfg['bg'])
            <div class="{{ $cfg['bg'] }}"></div>
            @if ($icon === 'workspace')
                <div class="absolute inset-0 bg-indigo-100/50 rounded-2xl -rotate-3"></div>
            @endif
        @endif
        <svg class="{{ $cfg['svg'] }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="{{ $cfg['path'] }}" />
        </svg>
    </div>

    {{-- Text --}}
    <h3 class="text-base font-bold text-slate-800 mb-1.5 tracking-tight">
        {{ $title }}
    </h3>

    @if ($description)
        <p class="text-sm text-slate-500 max-w-sm mb-8 leading-relaxed">
            {{ $description }}
        </p>
    @endif

    {{-- CTA Button --}}
    @if ($buttonText)
        <a href="{{ $buttonLink }}"
           class="group relative {{ $cfg['btn'] }} overflow-hidden flex items-center gap-2">
            <span class="relative z-10 flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4" />
                </svg>
                {{ $buttonText }}
            </span>
            <div class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-300 ease-out"></div>
        </a>
    @endif

</div>
