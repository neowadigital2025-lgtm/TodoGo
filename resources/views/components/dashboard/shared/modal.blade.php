{{-- ==========================================================
Component : Modal
Folder    : dashboard/shared
Purpose   : Modal dialog reusable berbasis Alpine.js.
            Dapat digunakan untuk konfirmasi, form, atau detail view
            di seluruh project.

Props:
  $id    — ID unik untuk Alpine.js (string, required)
  $title — Judul modal (string, default: "")
  $size  — Ukuran modal: sm | md | lg | xl (default: md)

Slots:
  $slot        — Konten body modal
  $footer      — Konten footer (opsional)

Penggunaan:
  <x-dashboard.shared.modal id="confirmDelete" title="Hapus Tugas?">
      <p>Apakah Anda yakin?</p>
      <x-slot:footer>
          <x-dashboard.shared.button variant="danger">Hapus</x-dashboard.shared.button>
      </x-slot:footer>
  </x-dashboard.shared.modal>
========================================================== --}}

@props([
    'id'    => 'modal',
    'title' => '',
    'size'  => 'md',
])

@php
    $sizes = [
        'sm' => 'max-w-sm',
        'md' => 'max-w-md',
        'lg' => 'max-w-lg',
        'xl' => 'max-w-2xl',
    ];
    $sizeClass = $sizes[$size] ?? $sizes['md'];
@endphp

<div
    x-data="{ open: false }"
    x-on:open-modal-{{ $id }}.window="open = true"
    x-on:close-modal-{{ $id }}.window="open = false"
    x-cloak
    x-show="open"
    class="fixed inset-0 z-[100] flex items-center justify-center p-4"
    style="display: none;">

    {{-- Backdrop --}}
    <div x-show="open"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         @click="open = false"
         class="absolute inset-0 bg-slate-900/50 backdrop-blur-sm">
    </div>

    {{-- Panel --}}
    <div x-show="open"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 translate-y-4 scale-95"
         x-transition:enter-end="opacity-100 translate-y-0 scale-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0 scale-100"
         x-transition:leave-end="opacity-0 translate-y-4 scale-95"
         class="relative w-full {{ $sizeClass }} bg-white rounded-2xl shadow-xl">

        {{-- Header --}}
        @if ($title)
            <div class="flex items-center justify-between px-6 py-4 border-b border-slate-100">
                <h3 class="text-base font-bold text-slate-800">{{ $title }}</h3>
                <button @click="open = false"
                        class="p-1.5 text-slate-400 hover:text-slate-700 hover:bg-slate-100 rounded-lg transition-colors">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <line x1="18" y1="6" x2="6" y2="18"/>
                        <line x1="6"  y1="6" x2="18" y2="18"/>
                    </svg>
                </button>
            </div>
        @endif

        {{-- Body --}}
        <div class="px-6 py-4">
            {{ $slot }}
        </div>

        {{-- Footer --}}
        @isset($footer)
            <div class="px-6 py-4 border-t border-slate-100 flex items-center justify-end gap-3">
                {{ $footer }}
            </div>
        @endisset

    </div>
</div>
