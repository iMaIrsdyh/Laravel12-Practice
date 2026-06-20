@extends('layouts.main')

@section('content')
    <div class="space-y-6">
        <h1 class="text-2xl font-semibold">Enrollments</h1>

        <div class="rounded border border-slate-200 bg-white p-6 shadow-sm">
            <h2 class="text-lg font-semibold">Course Tersedia</h2>
            <div class="mt-4 space-y-3">
                @foreach ($courses as $course)
                    <div class="rounded border border-slate-200 p-4">
                        <div class="flex items-center justify-between gap-4">
                            <div>
                                <div class="font-semibold">{{ $course->name }}</div>
                                <div class="text-sm text-slate-500">{{ $course->code }}</div>
                            </div>
                            <form action="{{ route('siswa.enrollments.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="course_id" value="{{ $course->id }}">
                                <button type="submit" class="rounded bg-slate-800 px-4 py-2 text-white">Enroll</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="rounded border border-slate-200 bg-white p-6 shadow-sm">
            <h2 class="text-lg font-semibold">My Enrollments</h2>
            <div class="mt-4 space-y-3">
                @foreach ($enrollments as $enrollment)
                    <div class="rounded border border-slate-200 p-4">
                        <div class="flex items-center justify-between gap-4">
                            <div>
                                <div class="font-semibold">{{ $enrollment->course->name }}</div>
                                <div class="text-sm text-slate-500">{{ $enrollment->course->code }}</div>
                            </div>
                            <form action="{{ route('siswa.enrollments.destroy', $enrollment) }}" method="POST"
                                onsubmit="return confirm('Batalkan enrollment?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="rounded bg-rose-600 px-4 py-2 text-white">Batal</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection