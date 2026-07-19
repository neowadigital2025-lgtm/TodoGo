{{-- ════════════════════════════════════════════════════════
     Page Card  — standard white rounded container
     Props:
       $padding — string  Tailwind padding class (default 'p-5')
       $class   — string  extra classes to merge

     Slots:
       $header  — optional header slot (renders with border-b)
       default  — card body content

     Usage:
       <x-ui.page-card>
           <x-slot:header>
               <h2>Title</h2>
           </x-slot:header>
           Body content here
       </x-ui.page-card>
════════════════════════════════════════════════════════ --}}

@props([
    'padding' => 'p-5',
    'class'   => '',
])

<div class="bg-white border border-slate-100 rounded-xl overflow-hidden {{ $class }}">

    @if (isset($header))
        <div class="flex items-center justify-between px-5 py-4 border-b border-slate-100">
            {{ $header }}
        </div>
    @endif

    @if (!isset($header))
        <div class="{{ $padding }}">
            {{ $slot }}
        </div>
    @else
        <div class="{{ $padding }}">
            {{ $slot }}
        </div>
    @endif

</div>
