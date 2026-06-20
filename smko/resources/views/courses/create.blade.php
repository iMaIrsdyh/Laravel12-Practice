@extends('layouts.main')

@section('content')
    <div class="space-y-6">
        <h1 class="text-2xl font-semibold">Tambah Course</h1>

        <form action="{{ route(auth()->user()->isAdmin() ? 'admin.courses.store' : 'guru.courses.store') }}" method="POST"
            class="space-y-4 rounded border border-slate-200 bg-white p-6 shadow-sm">
            @csrf

            <div>
                <label class="mb-1 block text-sm font-medium text-slate-700">Nama</label>
                <input type="text" name="name" value="{{ old('name') }}"
                    class="w-full rounded border border-slate-300 px-3 py-2" required>
            </div>

            <div>
                <label class="mb-1 block text-sm font-medium text-slate-700">Code</label>
                <input type="text" name="code" value="{{ old('code') }}"
                    class="w-full rounded border border-slate-300 px-3 py-2" required>
            </div>

            <div>
                <label class="mb-1 block text-sm font-medium text-slate-700">Description</label>
                <textarea name="description" class="w-full rounded border border-slate-300 px-3 py-2" rows="4"
                    required>{{ old('description') }}</textarea>
            </div>

            <button type="submit" class="rounded bg-slate-800 px-4 py-2 text-white">Simpan</button>
        </form>
    </div>
@endsection