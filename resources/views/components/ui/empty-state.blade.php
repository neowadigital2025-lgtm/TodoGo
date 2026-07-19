{{-- ════════════════════════════════════════════════════════
     Empty State
     Props:
       $title       — string  heading text
       $description — string  body text (optional)
       $action      — string  button label (optional)
       $actionHref  — string  button url   (optional, default '#')
       $icon        — string  raw inner SVG markup (optional)

     Usage:
       <x-ui.empty-state
           title="Belum ada tugas"
           description="Mulai dengan membuat tugas pertamamu."
           action="Buat Tugas"
           actionHref="#"
           icon='<path d="M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2"/>' />
════════════════════════════════════════════════════════ --}}

@props([
    'title'       => 'Belum ada data',
    'description' => null,
    'action'      => null,
    'actionHref'  => '#',
    'icon'        => '<circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/>',
])

<div class="flex flex-col items-center justify-center py-16 px-6 text-center">

    {{-- Icon circle --}}
    <div class="w-14 h-14 rounded-2xl bg-slate-100 flex items-center justify-center mb-4">
        <svg class="w-7 h-7 text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor"
             stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
            {!! $icon !!}
        </svg>
    </div>

    <p class="text-sm font-semibold text-slate-700">{{ $title }}</p>

    @if ($description)
        <p class="mt-1 text-sm text-slate-400 max-w-xs">{{ $description }}</p>
    @endif

    @if ($action)
        <a href="{{ $actionHref }}"
           class="mt-4 inline-flex items-center gap-2 px-4 py-2 bg-blue-600 hover:bg-blue-700
                  text-white text-sm font-medium rounded-lg transition-colors duration-150">
            {{ $action }}
        </a>
    @endif

</div>
