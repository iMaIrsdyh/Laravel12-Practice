@extends('layouts.main')

@section('content')
    <div class="space-y-6">
        <h1 class="text-2xl font-semibold">Edit Nilai Submission</h1>

        <div class="rounded border border-slate-200 bg-white p-6 shadow-sm">
            <div class="mb-4">
                <div class="font-semibold">Assignment:</div>
                <div>{{ $submission->assignment->title }}</div>
            </div>
            <div class="mb-4">
                <div class="font-semibold">Siswa:</div>
                <div>{{ $submission->student->name }}</div>
            </div>

            <form action="{{ route('guru.submissions.update', $submission) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-700">Score</label>
                    <input type="number" name="score" value="{{ old('score', $submission->score) }}"
                        class="w-full rounded border border-slate-300 px-3 py-2" min="0" max="100">
                </div>

                <button type="submit" class="rounded bg-slate-800 px-4 py-2 text-white">Simpan</button>
            </form>
        </div>
    </div>
@endsection