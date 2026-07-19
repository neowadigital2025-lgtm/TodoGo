{{-- ════════════════════════════════════════════════════════
     Section Header
     Props:
       $title       — string  main heading
       $description — string  sub-text (optional)
       $action      — string  link label  (optional)
       $actionHref  — string  link url    (optional, default '#')

     Usage:
       <x-ui.section-header
           title="Semua Tugas"
           description="Kelola dan pantau semua tugasmu."
           action="Buat Tugas"
           actionHref="#" />
════════════════════════════════════════════════════════ --}}

@props([
    'title'       => '',
    'description' => null,
    'action'      => null,
    'actionHref'  => '#',
])

<div class="flex items-start justify-between gap-4">
    <div class="min-w-0">
        <h1 class="text-xl font-bold text-slate-800 leading-tight">{{ $title }}</h1>
        @if ($description)
            <p class="mt-1 text-sm text-slate-500">{{ $description }}</p>
        @endif
    </div>

    @if ($action)
        <a href="{{ $actionHref }}"
           class="shrink-0 inline-flex items-center gap-2 px-4 py-2 bg-blue-600 hover:bg-blue-700
                  text-white text-sm font-medium rounded-lg transition-colors duration-150 shadow-sm">
            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                 stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <line x1="12" y1="5" x2="12" y2="19"/>
                <line x1="5"  y1="12" x2="19" y2="12"/>
            </svg>
            {{ $action }}
        </a>
    @endif
</div>
