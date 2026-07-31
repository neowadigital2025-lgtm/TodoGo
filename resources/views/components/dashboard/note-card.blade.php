@props([
    'title',
    'preview',
    'time',
    'color' => 'bg-slate-50'
])

<div class="relative p-4 rounded-xl {{ $color }} border border-transparent hover:border-blue-200 transition-all duration-300 cursor-pointer group hover:shadow-md hover:shadow-blue-500/5 hover:-translate-y-0.5">
    
    <div class="absolute top-0 right-0 p-2 opacity-0 group-hover:opacity-100 transition-opacity">
        <button class="p-1 text-slate-400 hover:text-slate-600 rounded">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
            </svg>
        </button>
    </div>

    <div class="flex justify-between items-start mb-2 pr-6">
        <h4 class="text-sm font-bold text-slate-800 group-hover:text-blue-600 transition-colors line-clamp-1">{{ $title }}</h4>
    </div>
    
    <p class="text-xs text-slate-600 line-clamp-2 leading-relaxed mb-3">
        {{ $preview }}
    </p>

    <div class="flex items-center text-[10px] font-semibold text-slate-400">
        <svg class="w-3 h-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        {{ $time }}
    </div>
</div>
