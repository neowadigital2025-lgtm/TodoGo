{{-- ==========================================================
Component : Badge
Folder    : dashboard/shared
Purpose   : Label/badge reusable untuk status, prioritas, kategori, dll.
            Dapat digunakan di Task Card, Workspace, dan seluruh project.

Props:
  $color — Warna tema: blue | green | yellow | red | purple | slate (default: blue)
  $size  — Ukuran: sm | md (default: sm)
========================================================== --}}

@props([
    'color' => 'blue',
    'size'  => 'sm',
])

@php
    $colors = [
        'blue'   => 'bg-blue-50 text-blue-700 ring-blue-600/20',
        'green'  => 'bg-green-50 text-green-700 ring-green-600/20',
        'yellow' => 'bg-amber-50 text-amber-700 ring-amber-600/20',
        'red'    => 'bg-red-50 text-red-700 ring-red-600/20',
        'purple' => 'bg-purple-50 text-purple-700 ring-purple-600/20',
        'slate'  => 'bg-slate-100 text-slate-600 ring-slate-500/20',
    ];

    $sizes = [
        'sm' => 'px-2 py-0.5 text-xs',
        'md' => 'px-2.5 py-1 text-sm',
    ];

    $colorClass = $colors[$color] ?? $colors['blue'];
    $sizeClass  = $sizes[$size] ?? $sizes['sm'];
@endphp

<span {{ $attributes->merge(['class' => "inline-flex items-center rounded-md font-medium ring-1 ring-inset $colorClass $sizeClass"]) }}>
    {{ $slot }}
</span>
