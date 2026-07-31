{{-- ==========================================================
Component : Progress Bar
Folder    : dashboard/shared
Purpose   : Progress bar reusable untuk menampilkan persentase kemajuan.
            Digunakan di Task Card, Workspace Card, dan halaman lainnya.

Props:
  $value  — Nilai persentase 0-100 (int, default: 0)
  $color  — Warna bar: blue | green | yellow | red (default: blue)
  $height — Ketebalan bar: thin | normal | thick (default: normal)
  $showLabel — Tampilkan label persentase di kanan (bool, default: false)
========================================================== --}}

@props([
    'value'     => 0,
    'color'     => 'blue',
    'height'    => 'normal',
    'showLabel' => false,
])

@php
    $colors = [
        'blue'   => 'bg-blue-600',
        'green'  => 'bg-green-500',
        'yellow' => 'bg-amber-500',
        'red'    => 'bg-red-500',
    ];

    $heights = [
        'thin'   => 'h-1',
        'normal' => 'h-1.5',
        'thick'  => 'h-2.5',
    ];

    $barColor  = $colors[$color] ?? $colors['blue'];
    $barHeight = $heights[$height] ?? $heights['normal'];
    $safeValue = max(0, min(100, (int) $value));
@endphp

<div class="w-full">
    @if ($showLabel)
        <div class="flex items-center justify-between text-xs mb-1.5">
            <span class="font-medium text-slate-600">Progress</span>
            <span class="font-bold text-slate-800">{{ $safeValue }}%</span>
        </div>
    @endif
    <div class="w-full bg-slate-100 rounded-full {{ $barHeight }} overflow-hidden">
        <div class="{{ $barColor }} {{ $barHeight }} rounded-full transition-all duration-500"
             style="width: {{ $safeValue }}%"></div>
    </div>
</div>
