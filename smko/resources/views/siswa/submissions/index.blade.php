@extends('layouts.main')

@section('content')
    <div class="space-y-6">
        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-semibold">Submissions</h1>
            <a href="{{ route('siswa.submissions.create') }}" class="rounded bg-slate-800 px-4 py-2 text-white">Submit
                Tugas</a>
        </div>

        <div class="overflow-hidden rounded border border-slate-200 bg-white shadow-sm">
            <table class="w-full text-left">
                <thead class="bg-slate-50 text-sm uppercase text-slate-600">
                    <tr>
                        <th class="px-4 py-3">Assignment</th>
                        <th class="px-4 py-3">Course</th>
                        <th class="px-4 py-3">Nilai</th>
                        <th class="px-4 py-3">Tanggal</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200">
                    @foreach ($submissions as $submission)
                        <tr>
                            <td class="px-4 py-3">{{ $submission->assignment->title }}</td>
                            <td class="px-4 py-3">{{ $submission->assignment->course->name }}</td>
                            <td class="px-4 py-3">{{ $submission->score ?? '-' }}</td>
                            <td class="px-4 py-3">{{ $submission->submitted_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection