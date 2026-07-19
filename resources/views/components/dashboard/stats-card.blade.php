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

<div class="bg-white border border-slate-100 rounded-2xl p-5 flex items-center gap-4 transition-all duration-300 hover:shadow-xl hover:shadow-slate-200/50 hover:-translate-y-1 hover:border-blue-100 group">

    {{-- Icon bubble --}}
    <div class="w-12 h-12 rounded-xl {{ $iconColor }} flex items-center justify-center shrink-0 transition-transform duration-300 group-hover:scale-110">
        <svg class="w-5 h-5 {{ $iconStroke }}" viewBox="0 0 24 24" fill="none"
             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            {!! $icon !!}
        </svg>
    </div>

    {{-- Text --}}
    <div class="min-w-0 flex-1">
        <p class="text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">{{ $label }}</p>
        <p class="text-3xl font-extrabold text-slate-800 leading-none">{{ $value }}</p>

        @if ($trend)
            <p class="text-xs font-medium mt-1.5 flex items-center gap-1 {{ $trendUp ? 'text-green-500' : 'text-red-500' }}">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    @if($trendUp)
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                    @else
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 17h8m0 0v-8m0 8l-8-8-4 4-6-6"/>
                    @endif
                </svg>
                {{ $trend }}
            </p>
        @elseif ($trendNote)
            <p class="text-xs font-medium mt-1.5 text-slate-400">
                {{ $trendNote }}
            </p>
        @endif
    </div>

</div>
