{{-- ==========================================================
Component : Task Card
Folder    : dashboard
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

<a
    href="{{ $href }}"
    {{ $attributes->merge(['class' => 'group relative flex h-full flex-col justify-between rounded-xl border border-slate-200 bg-white p-5 transition-all duration-300 hover:-translate-y-1 hover:border-blue-400 hover:shadow-lg hover:shadow-blue-500/10']) }}
>
    <div>
        {{-- Priority Badge & Date --}}
        <div class="mb-4 flex items-center justify-between gap-2">
            <span class="inline-flex shrink-0 items-center rounded-md px-2 py-1 text-xs font-medium ring-1 ring-inset {{ $priorityColor }}">
                {{ $priority }}
            </span>
            <div class="flex shrink-0 items-center gap-1.5 text-xs font-medium text-slate-500">
                <svg class="h-3.5 w-3.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <span class="whitespace-nowrap">{{ $date }}</span>
            </div>
        </div>

        {{-- Title --}}
        <h3 class="mb-3 line-clamp-2 min-w-0 text-sm font-bold leading-relaxed text-slate-800 transition-colors group-hover:text-blue-600">
            {{ $title }}
        </h3>

        {{-- Workspace --}}
        @if($workspace)
            <div class="flex w-fit max-w-full items-center gap-1.5 rounded-lg bg-blue-50 px-2.5 py-1.5 text-xs font-medium text-blue-700">
                <svg class="h-3.5 w-3.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0H5m14 0h2m-2 0h-2m-7-4h2m-2-8h2m-2-4h2" />
                </svg>
                <span class="truncate">{{ $workspace }}</span>
            </div>
        @else
            <div class="flex w-fit max-w-full items-center gap-1.5 rounded-lg bg-slate-100 px-2.5 py-1.5 text-xs font-medium text-slate-500">
                <svg class="h-3.5 w-3.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                </svg>
                <span>Tanpa Workspace</span>
            </div>
        @endif
    </div>

    {{-- Progress Bar --}}
    <div class="mt-4 space-y-1.5">
        <div class="flex items-center justify-between text-xs">
            <span class="font-medium text-slate-600">Progress</span>
            <span class="font-bold text-slate-800">{{ $progress }}%</span>
        </div>
        <div class="h-1.5 w-full overflow-hidden rounded-full bg-slate-100">
            <div class="h-1.5 rounded-full bg-blue-600 transition-all duration-500" style="width: {{ $progress }}%"></div>
        </div>
    </div>
</a>