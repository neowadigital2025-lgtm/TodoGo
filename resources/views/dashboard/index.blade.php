@extends('layouts.app')

@section('title', 'Beranda')

@section('content')

<div class="max-w-screen-xl mx-auto space-y-6">

    {{-- ── 1. Greeting ─────────────────────────────────────────────── --}}
    <x-dashboard.welcome-card :greeting="$greeting" :currentDate="$currentDate" />
    
    {{-- ── 2. Stats section ───────────────────────────────────────── --}}
    <x-dashboard.stats-section 
        :totalTasks="$totalTasks"
        :completedTasks="$completedTasks"
        :inProgressTasks="$inProgressTasks"
        :todoTasks="$todoTasks"
        :deadlineToday="$deadlineToday"
        :overdueTasks="$overdueTasks"
        :completionPercentage="$completionPercentage"
    />

    {{-- ── 3. Main grid ─────────────────────────────────────────────── --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 lg:gap-8">

        {{-- ── Left column (2/3 width) ──────────────────────────────── --}}
        <div class="lg:col-span-2 space-y-6 lg:space-y-8">
            <x-dashboard.latest-task-section :latestTasks="$todaysTasks" />
            <x-dashboard.workspace-section :workspaces="$workspaces" />
        </div>{{-- /left column --}}

        {{-- ── Right column (1/3 width) ─────────────────────────────── --}}
        <div class="space-y-6 lg:space-y-8">
            <x-dashboard.notes-section :todayNotes="$todayNotes" />
            <x-dashboard.deadline-section :deadlines="$deadlines" />
        </div>{{-- /right column --}}

    </div>{{-- /main grid --}}

</div>{{-- /page wrapper --}}

@endsection