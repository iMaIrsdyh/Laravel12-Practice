@extends('layouts.main')

@section('content')
    <div class="space-y-6">
        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-semibold">Courses</h1>
            <a href="{{ route(auth()->user()->isAdmin() ? 'admin.courses.create' : 'guru.courses.create') }}"
                class="rounded bg-slate-800 px-4 py-2 text-white">Tambah Course</a>
        </div>

        <div class="overflow-hidden rounded border border-slate-200 bg-white shadow-sm">
            <table class="w-full text-left">
                <thead class="bg-slate-50 text-sm uppercase text-slate-600">
                    <tr>
                        <th class="px-4 py-3">Nama</th>
                        <th class="px-4 py-3">Code</th>
                        <th class="px-4 py-3">Guru</th>
                        <th class="px-4 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200">
                    @foreach ($courses as $course)
                        <tr>
                            <td class="px-4 py-3">{{ $course->name }}</td>
                            <td class="px-4 py-3">{{ $course->code }}</td>
                            <td class="px-4 py-3">{{ $course->teacher->name }}</td>
                            <td class="px-4 py-3 space-x-2">
                                <a href="{{ route(auth()->user()->isAdmin() ? 'admin.courses.edit' : 'guru.courses.edit', $course) }}"
                                    class="rounded bg-amber-500 px-3 py-2 text-white">Edit</a>
                                <form
                                    action="{{ route(auth()->user()->isAdmin() ? 'admin.courses.destroy' : 'guru.courses.destroy', $course) }}"
                                    method="POST" class="inline" onsubmit="return confirm('Hapus course ini?');">
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