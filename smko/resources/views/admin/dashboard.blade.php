@extends('layouts.main')

@section('content')
    <div class="space-y-6">
        <h1 class="text-2xl font-semibold">Dashboard Admin</h1>

        <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-4">
            <div class="rounded border border-slate-200 bg-white p-6 shadow-sm">
                <h2 class="text-sm font-semibold text-slate-500">Total Guru</h2>
                <p class="mt-4 text-3xl font-bold">{{ $totalGuru }}</p>
            </div>
            <div class="rounded border border-slate-200 bg-white p-6 shadow-sm">
                <h2 class="text-sm font-semibold text-slate-500">Total Siswa</h2>
                <p class="mt-4 text-3xl font-bold">{{ $totalSiswa }}</p>
            </div>
            <div class="rounded border border-slate-200 bg-white p-6 shadow-sm">
                <h2 class="text-sm font-semibold text-slate-500">Total Course</h2>
                <p class="mt-4 text-3xl font-bold">{{ $totalCourse }}</p>
            </div>
            <div class="rounded border border-slate-200 bg-white p-6 shadow-sm">
                <h2 class="text-sm font-semibold text-slate-500">Total Assignment</h2>
                <p class="mt-4 text-3xl font-bold">{{ $totalAssignment }}</p>
            </div>
        </div>
    </div>
@endsection