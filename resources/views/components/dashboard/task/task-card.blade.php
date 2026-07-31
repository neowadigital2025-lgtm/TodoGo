{{-- ==========================================================
Component : Task Card
Folder    : dashboard/task
Purpose   : Menampilkan satu card task dengan prioritas, tanggal, dan progress.
            Reusable untuk halaman Dashboard (Latest Tasks) maupun halaman Task.

Props:
  $title         — Judul task (string)
  $workspace     — Nama workspace (string)
  $priority      — Label prioritas: High | Medium | Low (string)
  $priorityColor — Kelas Tailwind untuk warna badge prioritas (string)
  $date          — Tanggal deadline (string)
  $progress      — Persentase progress 0-100 (int, default: 0)
  $done          — Status selesai (bool, default: false)
  $href          — URL detail task (string, default: '#')
========================================================== --}}

@props([
    'title'         => '',
    'workspace'     => '',
    'priority'      => '',
    'priorityColor' => 'text-slate-600 bg-slate-50 ring-slate-500/10',
    'date'          => '',
    'progress'      => 0,
    'done'          => false,
    'href'          => '#',
])

<a href="{{ $href }}" class="group relative block bg-white rounded-xl border border-slate-200 hover:border-blue-400 p-5 transition-all duration-300 hover:shadow-lg hover:shadow-blue-500/10 hover:-translate-y-1">
    
    {{-- Priority Badge & Date --}}
    <div class="flex items-center justify-between mb-4">
        <span class="inline-flex items-center rounded-md px-2 py-1 text-xs font-medium ring-1 ring-inset {{ $priorityColor }}">
            {{ $priority }}
        </span>
        <div class="flex items-center gap-1.5 text-slate-500 text-xs font-medium">
            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            {{ $date }}
        </div>
    </div>

    {{-- Title & Workspace --}}
    <div class="mb-5">
        <h3 class="text-sm font-bold text-slate-800 group-hover:text-blue-600 transition-colors line-clamp-1 mb-1">
            {{ $title }}
        </h3>
        <p class="text-xs text-slate-500 font-medium">
            {{ $workspace }}
        </p>
    </div>

    {{-- Progress Bar --}}
    <div class="space-y-1.5 mt-auto">
        <div class="flex items-center justify-between text-xs">
            <span class="font-medium text-slate-600">Progress</span>
            <span class="font-bold text-slate-800">{{ $progress }}%</span>
        </div>
        <div class="w-full bg-slate-100 rounded-full h-1.5 overflow-hidden">
            <div class="bg-blue-600 h-1.5 rounded-full transition-all duration-500" style="width: {{ $progress }}%"></div>
        </div>
    </div>
</a>
