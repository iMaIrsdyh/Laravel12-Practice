@extends('layouts.main')

@section('content')
    <div class="space-y-6">
        <h1 class="text-2xl font-semibold">Dashboard Guru</h1>

        <div class="grid gap-4 md:grid-cols-3">
            <div class="rounded border border-slate-200 bg-white p-6 shadow-sm">
                <h2 class="text-sm font-semibold text-slate-500">Course yang Diajar</h2>
                <p class="mt-4 text-3xl font-bold">{{ $courses->count() }}</p>
            </div>
            <div class="rounded border border-slate-200 bg-white p-6 shadow-sm">
                <h2 class="text-sm font-semibold text-slate-500">Assignment dibuat</h2>
                <p class="mt-4 text-3xl font-bold">{{ $assignmentsCount }}</p>
            </div>
            <div class="rounded border border-slate-200 bg-white p-6 shadow-sm">
                <h2 class="text-sm font-semibold text-slate-500">Jumlah Submission</h2>
                <p class="mt-4 text-3xl font-bold">{{ $submissionsCount }}</p>
            </div>
        </div>

        <div class="rounded border border-slate-200 bg-white p-6 shadow-sm">
            <h2 class="text-lg font-semibold">Course Saya</h2>
            <ul class="mt-4 space-y-3">
                @foreach ($courses as $course)
                    <li class="rounded border border-slate-200 p-4">
                        <strong>{{ $course->name }}</strong> - {{ $course->code }}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection