@props([
    'title',
    'value',
    'description',
    'icon',
    'color' => 'blue',
    'href' => '#'
])

@php
    $colors = [
        'blue' => 'bg-blue-50 text-blue-600 ring-blue-100',
        'green' => 'bg-green-50 text-green-600 ring-green-100',
        'yellow' => 'bg-amber-50 text-amber-600 ring-amber-100',
        'red' => 'bg-red-50 text-red-600 ring-red-100',
    ];

    $iconClass = $colors[$color] ?? $colors['blue'];
@endphp

<a href="{{ $href }}"
   class="group block rounded-2xl border border-slate-200 bg-white p-6 shadow-sm hover:shadow-md hover:-translate-y-1 transition duration-300">

    <div class="flex items-start justify-between">

        <div>

            <p class="text-sm text-slate-500">
                {{ $title }}
            </p>

            <h2 class="mt-2 text-3xl font-bold text-slate-900">
                {{ $value }}
            </h2>

            <p class="mt-1 text-sm text-slate-500">
                {{ $description }}
            </p>

        </div>

        <div class="w-12 h-12 rounded-xl flex items-center justify-center ring-1 {{ $iconClass }}">

            {{ $icon }}

        </div>

    </div>

</a>