{{-- ════════════════════════════════════════════════════════
     Stats Card
     Props:
       $label       — string   e.g. "Total Tugas"
       $value       — string   e.g. "24"
       $trend       — string   e.g. "↑ 12% dari minggu lalu"   (optional)
       $trendUp     — bool     true = green, false = red        (optional, default true)
       $trendNote   — string   plain note instead of trend      (optional)
       $iconColor   — string   Tailwind bg utility e.g. "bg-blue-50"
       $iconStroke  — string   Tailwind text utility e.g. "text-blue-500"
       $icon        — string   raw SVG <path/> / <rect/> inner markup

     Usage:
       <x-dashboard.stats-card
           label="Total Tugas"
           value="24"
           trend="↑ 12% dari minggu lalu"
           :trendUp="true"
           iconColor="bg-blue-50"
           iconStroke="text-blue-500"
           icon='<rect x="3" y="4" width="18" height="18" rx="2"/>' />
════════════════════════════════════════════════════════ --}}

@props([
    'label'      => '',
    'value'      => '—',
    'trend'      => null,
    'trendUp'    => true,
    'trendNote'  => null,
    'iconColor'  => 'bg-slate-100',
    'iconStroke' => 'text-slate-500',
    'icon'       => '',
])

<div class="bg-white border border-slate-100 rounded-xl p-5 flex items-center gap-4">

    {{-- Icon bubble --}}
    <div class="w-11 h-11 rounded-xl {{ $iconColor }} flex items-center justify-center shrink-0">
        <svg class="w-5 h-5 {{ $iconStroke }}" viewBox="0 0 24 24" fill="none"
             stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
            {!! $icon !!}
        </svg>
    </div>

    {{-- Text --}}
    <div class="min-w-0">
        <p class="text-xs font-medium text-slate-500">{{ $label }}</p>
        <p class="text-2xl font-bold text-slate-800 leading-tight">{{ $value }}</p>

        @if ($trend)
            <p class="text-xs font-medium mt-0.5 {{ $trendUp ? 'text-green-500' : 'text-red-400' }}">
                {{ $trend }}
            </p>
        @elseif ($trendNote)
            <p class="text-xs font-medium mt-0.5 text-slate-400">
                {{ $trendNote }}
            </p>
        @endif
    </div>

</div>
