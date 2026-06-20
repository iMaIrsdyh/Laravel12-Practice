@extends('layouts.main')

@section('content')
    <div class="space-y-6">
        <h1 class="text-2xl font-semibold">Submissions Siswa</h1>

        <div class="overflow-hidden rounded border border-slate-200 bg-white shadow-sm">
            <table class="w-full text-left">
                <thead class="bg-slate-50 text-sm uppercase text-slate-600">
                    <tr>
                        <th class="px-4 py-3">Siswa</th>
                        <th class="px-4 py-3">Assignment</th>
                        <th class="px-4 py-3">Course</th>
                        <th class="px-4 py-3">Nilai</th>
                        <th class="px-4 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200">
                    @foreach ($submissions as $submission)
                        <tr>
                            <td class="px-4 py-3">{{ $submission->student->name }}</td>
                            <td class="px-4 py-3">{{ $submission->assignment->title }}</td>
                            <td class="px-4 py-3">{{ $submission->assignment->course->name }}</td>
                            <td class="px-4 py-3">{{ $submission->score ?? '-' }}</td>
                            <td class="px-4 py-3 space-x-2">
                                <a href="{{ route('guru.submissions.edit', $submission) }}"
                                    class="rounded bg-amber-500 px-3 py-2 text-white">Nilai</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection