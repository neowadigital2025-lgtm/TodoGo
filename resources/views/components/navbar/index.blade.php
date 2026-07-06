<header x-data="{ open: false }">

    {{-- Desktop --}}
    <div class="hidden lg:block">
        @include('components.navbar.desktop')
    </div>

    {{-- Mobile --}}
    <div class="lg:hidden">
        @include('components.navbar.mobile')
    </div>

    {{-- Sidebar --}}
    @include('components.navbar.mobile-sidebar')

</header>