{{-- Sticky Navbar --}}
    <header class="hidden lg:block sticky top-0 z-50 bg-blue-50/80 backdrop-blur-md border-b border-slate-100 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16 lg:h-20">
                {{-- Logo --}}
                <a href="/" class="flex items-center gap-2.5 group">
                    <img src="{{ asset('images/todogo-logo.png') }}" alt="" class="h-12 w-12 object-cover object-top rounded-lg shadow-md shadow-blue-500/20 group-hover:shadow-lg group-hover:shadow-blue-500/30 transition-shadow duration-300" aria-hidden="true">
                    <span class="font-bold text-3xl tracking-tight">Todo<span class="text-[#2563EB]">Go</span></span>
                </a>

                {{-- Center Nav --}}
                <nav class="flex items-center gap-10" aria-label="Main navigation">
                    <a href="#solusi" class="text-lg text-[#64748B] hover:text-[#2563EB] transition-colors duration-200 font-medium">Solusi</a>
                    <a href="#fitur" class="text-lg text-[#64748B] hover:text-[#2563EB] transition-colors duration-200 font-medium">Fitur</a>
                    <a href="#demo" class="text-lg text-[#64748B] hover:text-[#2563EB] transition-colors duration-200 font-medium">Demo</a>
                    <a href="#harga" class="text-lg text-[#64748B] hover:text-[#2563EB] transition-colors duration-200 font-medium">Harga</a>
                    <a href="#tentang" class="text-lg text-[#64748B] hover:text-[#2563EB] transition-colors duration-200 font-medium">Tentang</a>
                </nav>

                {{-- CTA --}}
                <div class="flex items-center gap-3">
                    <a href="{{ route('login') }}"
                        class="text-[#64748B] hover:text-[#2563EB] text-sm font-semibold transition-colors">
                            Masuk
                    </a>

                    <a href="{{ route('register') }}"class="inline-flex items-center justify-center bg-[#2563EB] hover:bg-blue-700 text-white text-sm font-semibold px-5 py-2.5 rounded-xl shadow-md shadow-blue-500/20 hover:shadow-lg hover:shadow-blue-500/30 hover:-translate-y-0.5 transition-all duration-200">
                        Daftar
                    </a>
                </div>
            </div>
        </div>
    </header>