@extends('layouts.main')

@section('content')
    <div class="space-y-6">
        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-semibold">Assignments</h1>
            <a href="{{ route(auth()->user()->isAdmin() ? 'admin.assignments.create' : 'guru.assignments.create') }}"
                class="rounded bg-slate-800 px-4 py-2 text-white">Tambah Assignment</a>
        </div>

        <div class="overflow-hidden rounded border border-slate-200 bg-white shadow-sm">
            <table class="w-full text-left">
                <thead class="bg-slate-50 text-sm uppercase text-slate-600">
                    <tr>
                        <th class="px-4 py-3">Title</th>
                        <th class="px-4 py-3">Course</th>
                        <th class="px-4 py-3">Due Date</th>
                        <th class="px-4 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200">
                    @foreach ($assignments as $assignment)
                        <tr>
                            <td class="px-4 py-3">{{ $assignment->title }}</td>
                            <td class="px-4 py-3">{{ $assignment->course->name }}</td>
                            <td class="px-4 py-3">{{ $assignment->due_date }}</td>
                            <td class="px-4 py-3 space-x-2">
                                <a href="{{ route(auth()->user()->isAdmin() ? 'admin.assignments.edit' : 'guru.assignments.edit', $assignment) }}"
                                    class="rounded bg-amber-500 px-3 py-2 text-white">Edit</a>
                                <form
                                    action="{{ route(auth()->user()->isAdmin() ? 'admin.assignments.destroy' : 'guru.assignments.destroy', $assignment) }}"
                                    method="POST" class="inline" onsubmit="return confirm('Hapus assignment ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="rounded bg-rose-600 px-3 py-2 text-white">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection