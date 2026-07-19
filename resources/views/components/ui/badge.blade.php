{{-- ════════════════════════════════════════════════════════
     Badge
     Props:
       $color   — string  one of: blue | green | yellow | red | purple | orange | slate
       $dot     — bool    show leading dot (default false)
       $size    — string  sm | md  (default sm)

     Usage:
       <x-ui.badge color="red">Tinggi</x-ui.badge>
       <x-ui.badge color="green" :dot="true">Selesai</x-ui.badge>
════════════════════════════════════════════════════════ --}}

@props([
    'color' => 'slate',
    'dot'   => false,
    'size'  => 'sm',
])

@php
$colorMap = [
    'blue'   => 'bg-blue-50   text-blue-600',
    'green'  => 'bg-green-50  text-green-600',
    'yellow' => 'bg-yellow-50 text-yellow-600',
    'red'    => 'bg-red-50    text-red-500',
    'purple' => 'bg-purple-50 text-purple-600',
    'orange' => 'bg-orange-50 text-orange-500',
    'slate'  => 'bg-slate-100 text-slate-500',
];
$dotMap = [
    'blue'   => 'bg-blue-500',
    'green'  => 'bg-green-500',
    'yellow' => 'bg-yellow-500',
    'red'    => 'bg-red-500',
    'purple' => 'bg-purple-500',
    'orange' => 'bg-orange-500',
    'slate'  => 'bg-slate-400',
];
$classes = $colorMap[$color] ?? $colorMap['slate'];
$dotClass = $dotMap[$color] ?? $dotMap['slate'];
$padding = $size === 'md' ? 'px-3 py-1 text-xs' : 'px-2.5 py-0.5 text-[11px]';
@endphp

<span class="inline-flex items-center gap-1.5 font-medium rounded-full {{ $classes }} {{ $padding }}">
    @if ($dot)
        <span class="w-1.5 h-1.5 rounded-full shrink-0 {{ $dotClass }}"></span>
    @endif
    {{ $slot }}
</span>
