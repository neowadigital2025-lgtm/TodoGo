{{-- ==========================================================
Component : Search Box
Folder    : dashboard/shared
Purpose   : Input pencarian reusable dengan ikon search.
            Dapat digunakan di halaman Tasks, Workspaces, Notes, dll.

Props:
  $placeholder — Placeholder teks (string, default: "Cari...")
  $name        — Name attribute input (string, default: "search")
  $value       — Nilai awal (string, default: "")
  $id          — ID attribute input (string, default: "search")
========================================================== --}}

@props([
    'placeholder' => 'Cari...',
    'name'        => 'search',
    'value'       => '',
    'id'          => 'search',
])

<label for="{{ $id }}"
       class="flex items-center gap-2 px-3 py-2 bg-slate-50 border border-slate-200 rounded-lg cursor-text
              hover:border-slate-300 focus-within:border-blue-400 focus-within:bg-white transition-colors group">

    <svg class="w-4 h-4 text-slate-400 shrink-0 group-focus-within:text-blue-500 transition-colors"
         fill="none" stroke="currentColor" viewBox="0 0 24 24"
         stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <circle cx="11" cy="11" r="8" />
        <line x1="21" y1="21" x2="16.65" y2="16.65" />
    </svg>

    <input
        type="search"
        id="{{ $id }}"
        name="{{ $name }}"
        value="{{ $value }}"
        placeholder="{{ $placeholder }}"
        {{ $attributes->merge(['class' => 'flex-1 bg-transparent text-sm text-slate-600 placeholder-slate-400 outline-none min-w-0']) }} />

</label>
