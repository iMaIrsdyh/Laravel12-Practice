@extends('layouts.main')

@section('content')
    <div class="space-y-6">
        <h1 class="text-2xl font-semibold">Tambah Assignment</h1>

        <form action="{{ route(auth()->user()->isAdmin() ? 'admin.assignments.store' : 'guru.assignments.store') }}"
            method="POST" class="space-y-4 rounded border border-slate-200 bg-white p-6 shadow-sm">
            @csrf

            <div>
                <label class="mb-1 block text-sm font-medium text-slate-700">Course</label>
                <select name="course_id" class="w-full rounded border border-slate-300 px-3 py-2" required>
                    <option value="">Pilih Course</option>
                    @foreach ($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->name }} - {{ $course->code }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="mb-1 block text-sm font-medium text-slate-700">Title</label>
                <input type="text" name="title" value="{{ old('title') }}"
                    class="w-full rounded border border-slate-300 px-3 py-2" required>
            </div>

            <div>
                <label class="mb-1 block text-sm font-medium text-slate-700">Description</label>
                <textarea name="description" class="w-full rounded border border-slate-300 px-3 py-2" rows="4"
                    required>{{ old('description') }}</textarea>
            </div>

            <div>
                <label class="mb-1 block text-sm font-medium text-slate-700">Due Date</label>
                <input type="datetime-local" name="due_date" value="{{ old('due_date') }}"
                    class="w-full rounded border border-slate-300 px-3 py-2" required>
            </div>

            <button type="submit" class="rounded bg-slate-800 px-4 py-2 text-white">Simpan</button>
        </form>
    </div>
@endsection