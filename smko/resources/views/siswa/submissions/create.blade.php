@extends('layouts.main')

@section('content')
    <div class="space-y-6">
        <h1 class="text-2xl font-semibold">Submit Tugas</h1>

        <form action="{{ route('siswa.submissions.store') }}" method="POST"
            class="space-y-4 rounded border border-slate-200 bg-white p-6 shadow-sm">
            @csrf

            <div>
                <label class="mb-1 block text-sm font-medium text-slate-700">Assignment</label>
                <select name="assignment_id" class="w-full rounded border border-slate-300 px-3 py-2" required>
                    <option value="">Pilih Assignment</option>
                    @foreach ($assignments as $assignment)
                        <option value="{{ $assignment->id }}">{{ $assignment->title }} - {{ $assignment->course->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="mb-1 block text-sm font-medium text-slate-700">File Path</label>
                <input type="text" name="file_path" value="{{ old('file_path') }}"
                    class="w-full rounded border border-slate-300 px-3 py-2" required>
                <p class="mt-2 text-sm text-slate-500">Masukkan path file tugas atau URL file.</p>
            </div>

            <button type="submit" class="rounded bg-slate-800 px-4 py-2 text-white">Kirim</button>
        </form>
    </div>
@endsection