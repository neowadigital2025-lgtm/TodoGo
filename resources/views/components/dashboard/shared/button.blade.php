{{-- ==========================================================
Component : Button
Folder    : dashboard/shared
Purpose   : Tombol reusable dengan berbagai varian warna dan ukuran.
            Dapat digunakan di seluruh project sebagai tombol aksi utama.

Props:
  $variant — Varian warna: primary | secondary | danger | ghost (default: primary)
  $size    — Ukuran: sm | md | lg (default: md)
  $type    — Tipe HTML button: button | submit | reset (default: button)
  $href    — Jika diisi, render sebagai tag <a> bukan <button>
  $class   — Class tambahan (opsional)
========================================================== --}}

@props([
    'variant' => 'primary',
    'size'    => 'md',
    'type'    => 'button',
    'href'    => null,
    'class'   => '',
])

@php
    $variants = [
        'primary'   => 'bg-blue-600 hover:bg-blue-700 text-white shadow-sm hover:shadow-md',
        'secondary' => 'bg-white hover:bg-slate-50 text-slate-700 border border-slate-200 hover:border-slate-300 shadow-sm',
        'danger'    => 'bg-red-600 hover:bg-red-700 text-white shadow-sm',
        'ghost'     => 'bg-transparent hover:bg-slate-100 text-slate-600 hover:text-slate-800',
    ];

    $sizes = [
        'sm' => 'px-3 py-1.5 text-xs',
        'md' => 'px-4 py-2 text-sm',
        'lg' => 'px-6 py-3 text-base',
    ];

    $baseClass = 'inline-flex items-center justify-center gap-2 font-semibold rounded-lg transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 disabled:opacity-60 disabled:cursor-not-allowed';

    $combinedClass = implode(' ', [$baseClass, $variants[$variant] ?? $variants['primary'], $sizes[$size] ?? $sizes['md'], $class]);
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $combinedClass]) }}>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $combinedClass]) }}>
        {{ $slot }}
    </button>
@endif
