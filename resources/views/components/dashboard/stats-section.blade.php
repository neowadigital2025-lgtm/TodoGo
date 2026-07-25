<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5">

    {{-- Total Task --}}

    <x-dashboard.stats-card
        title="Total Tugas"
        value="12"
        description="Semua tugas"
        color="blue"
    >

        <x-slot:icon>

            📋

        </x-slot:icon>

    </x-dashboard.stats-card>

    {{-- Completed --}}

    <x-dashboard.stats-card
        title="Selesai"
        value="8"
        description="Sudah selesai"
        color="green"
    >

        <x-slot:icon>

            ✅

        </x-slot:icon>

    </x-dashboard.stats-card>

    {{-- Progress --}}

    <x-dashboard.stats-card
        title="Dalam Proses"
        value="3"
        description="Sedang dikerjakan"
        color="yellow"
    >

        <x-slot:icon>

            ⏳

        </x-slot:icon>

    </x-dashboard.stats-card>

    {{-- Deadline --}}

    <x-dashboard.stats-card
        title="Deadline Hari Ini"
        value="1"
        description="Segera selesai"
        color="red"
    >

        <x-slot:icon>

            🔥

        </x-slot:icon>

    </x-dashboard.stats-card>

</div>