<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TodoGo — @yield('title', 'Dashboard')</title>

    {{-- Plus Jakarta Sans --}}
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body
    x-data="{ sidebarOpen: false }"
    class="h-full bg-slate-50 antialiased"
    style="font-family: 'Plus Jakarta Sans', sans-serif;"
>

    {{-- ── Mobile overlay ─────────────────────────────────────────── --}}
    <div
        x-show="sidebarOpen"
        x-transition:enter="transition-opacity ease-out duration-200"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition-opacity ease-in duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        @click="sidebarOpen = false"
        class="fixed inset-0 z-30 bg-black/40 backdrop-blur-sm lg:hidden"
    ></div>

    {{-- ── Desktop sidebar (w-72 = 288 px) ───────────────────────── --}}
    @include('components.dashboard.sidebar')

    {{-- ── Mobile sidebar drawer ──────────────────────────────────── --}}
    @include('components.dashboard.mobile-sidebar')

    {{-- ── Main content area ──────────────────────────────────────── --}}
    <div class="lg:pl-72 flex flex-col min-h-full">

        {{-- Navbar --}}
        @include('components.dashboard.navbar')

        {{-- Page content --}}
        <main class="flex-1 p-4 sm:p-6">
            @yield('content')
        </main>

    </div>

</body>
</html>
