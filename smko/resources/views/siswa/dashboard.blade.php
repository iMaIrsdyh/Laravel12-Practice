@extends('layouts.main')

@section('content')
    <div class="space-y-6">
        <h1 class="text-2xl font-semibold">Dashboard Siswa</h1>

        <div class="grid gap-4 md:grid-cols-3">
            <div class="rounded border border-slate-200 bg-white p-6 shadow-sm">
                <h2 class="text-sm font-semibold text-slate-500">Course yang Diikuti</h2>
                <p class="mt-4 text-3xl font-bold">{{ $courses->count() }}</p>
            </div>
            <div class="rounded border border-slate-200 bg-white p-6 shadow-sm">
                <h2 class="text-sm font-semibold text-slate-500">Tugas yang Dikumpulkan</h2>
                <p class="mt-4 text-3xl font-bold">{{ $submissionsCount }}</p>
            </div>
            <div class="rounded border border-slate-200 bg-white p-6 shadow-sm">
                <h2 class="text-sm font-semibold text-slate-500">Nilai Rata-Rata</h2>
                <p class="mt-4 text-3xl font-bold">{{ $nilaiRata ? number_format($nilaiRata, 2) : '-' }}</p>
            </div>
        </div>

        <div class="rounded border border-slate-200 bg-white p-6 shadow-sm">
            <h2 class="text-lg font-semibold">Course Saya</h2>
            <ul class="mt-4 space-y-3">
                @foreach ($courses as $course)
                    <li class="rounded border border-slate-200 p-4">
                        <strong>{{ $course->name }}</strong> - {{ $course->code }}
                        <div class="text-sm text-slate-500">Pengajar: {{ $course->teacher->name }}</div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection