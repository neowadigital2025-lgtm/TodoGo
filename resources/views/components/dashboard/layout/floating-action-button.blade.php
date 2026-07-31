{{-- ==========================================================
Component : Floating Action Button (FAB)
Folder    : dashboard/layout
Purpose   : Tombol aksi cepat mengambang di sudut kanan bawah layar.
            Memberi akses cepat ke: Tugas Baru, Catatan, Ruang Kerja.
            Dikontrol Alpine.js `fabOpen` (sudah didefinisikan di body).
========================================================== --}}

<div class="fixed bottom-6 right-6 z-50">

    {{-- FAB Dropdown --}}
    <div x-cloak
         x-show="fabOpen"
         @click.outside="fabOpen = false"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 translate-y-4 scale-95"
         x-transition:enter-end="opacity-100 translate-y-0 scale-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0 scale-100"
         x-transition:leave-end="opacity-0 translate-y-4 scale-95"
         class="absolute bottom-16 right-0 mb-2 w-48 bg-white rounded-xl shadow-lg border border-slate-100 overflow-hidden"
         style="display: none;">
        <div class="p-1.5 flex flex-col gap-1">
            <a href="#" class="flex items-center gap-2.5 px-3 py-2 text-sm font-medium text-slate-700 hover:bg-blue-50 hover:text-blue-600 rounded-lg transition-colors">
                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 11 12 14 22 4"/>
                    <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/>
                </svg>
                Tugas Baru
            </a>
            <a href="#" class="flex items-center gap-2.5 px-3 py-2 text-sm font-medium text-slate-700 hover:bg-blue-50 hover:text-blue-600 rounded-lg transition-colors">
                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M14 2H6a2 2 0 0 0-2 2v16c0 1.1.9 2 2 2h12a2 2 0 0 0 2-2V8l-6-6z"/>
                    <path d="M14 3v5h5M16 13H8M16 17H8M10 9H8"/>
                </svg>
                Catatan Hari Ini
            </a>
            <a href="#" class="flex items-center gap-2.5 px-3 py-2 text-sm font-medium text-slate-700 hover:bg-blue-50 hover:text-blue-600 rounded-lg transition-colors">
                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="2" y="7" width="20" height="14" rx="2" ry="2"/>
                    <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/>
                </svg>
                Ruang Kerja
            </a>
        </div>
    </div>

    {{-- FAB Toggle Button --}}
    <button @click="fabOpen = !fabOpen"
            class="flex items-center justify-center w-14 h-14 bg-blue-600 text-white rounded-full shadow-lg hover:bg-blue-700 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-blue-300">
        <svg class="w-6 h-6 transition-transform duration-300" :class="fabOpen ? 'rotate-45' : 'rotate-0'" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
            <line x1="12" y1="5" x2="12" y2="19"/>
            <line x1="5" y1="12" x2="19" y2="12"/>
        </svg>
    </button>

</div>
