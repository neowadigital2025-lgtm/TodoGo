@extends('layouts.app')

@section('title', 'Buat Catatan')

@section('content')
<div class="max-w-screen-md mx-auto bg-white border border-slate-100 rounded-xl p-6 shadow-sm">
    <div class="mb-6">
        <h1 class="text-xl font-bold text-slate-800">Buat Catatan Baru</h1>
        <p class="text-sm text-slate-500 mt-1">Tambahkan catatan baru.</p>
    </div>

    @if ($errors->any())
        <div class="mb-4 bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-lg text-sm">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div
    @endif

    <form action="{{ route('notes.store') }}" method="POST" class="space-y-4">
        @csrf
        
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">Judul</label>
            <input type="text" name="title" value="{{ old('title') }}" required 
                   class="w-full px-4 py-2 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">Konten</label>
            <textarea name="content" rows="6" 
                      class="w-full px-4 py-2 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('content') }}</textarea>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Warna Label</label>
                <select name="color" class="w-full px-4 py-2 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="bg-blue-500" {{ old('color') == 'bg-blue-500' ? 'selected' : '' }}>Biru</option>
                    <option value="bg-green-500" {{ old('color') == 'bg-green-500' ? 'selected' : '' }}>Hijau</option>
                    <option value="bg-purple-500" {{ old('color') == 'bg-purple-500' ? 'selected' : '' }}>Ungu</option>
                    <option value="bg-orange-400" {{ old('color') == 'bg-orange-400' ? 'selected' : '' }}>Oranye</option>
                    <option value="bg-red-500" {{ old('color') == 'bg-red-500' ? 'selected' : '' }}>Merah</option>
                    <option value="bg-slate-500" {{ old('color') == 'bg-slate-500' ? 'selected' : '' }}>Abu-abu</option>
                </select>
            </div>
            
            <div class="flex items-center mt-6">
                <input type="checkbox" id="pinned" name="pinned" value="1" {{ old('pinned') ? 'checked' : '' }}
                       class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                <label for="pinned" class="ml-2 text-sm font-medium text-slate-700">Sematkan catatan ini (Pinned)</label>
            </div>
        </div>

        <div class="pt-4 flex justify-end gap-2">
            <a href="{{ route('notes.index') }}" class="px-4 py-2 bg-white border border-slate-200 text-slate-600 rounded-lg hover:bg-slate-50 transition-colors">
                Batal
            </a>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors shadow-sm">
                Simpan Catatan
            </button>
        </div>
    </form>
</div>
@endsection
