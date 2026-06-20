@extends('layouts.main')

@section('content')
    <div class="space-y-6">
        <h1 class="text-2xl font-semibold">Tambah User</h1>

        <form action="{{ route('admin.users.store') }}" method="POST"
            class="space-y-4 rounded border border-slate-200 bg-white p-6 shadow-sm">
            @csrf

            <div>
                <label class="mb-1 block text-sm font-medium text-slate-700">Nama</label>
                <input type="text" name="name" value="{{ old('name') }}"
                    class="w-full rounded border border-slate-300 px-3 py-2" required>
            </div>

            <div>
                <label class="mb-1 block text-sm font-medium text-slate-700">Email</label>
                <input type="email" name="email" value="{{ old('email') }}"
                    class="w-full rounded border border-slate-300 px-3 py-2" required>
            </div>

            <div>
                <label class="mb-1 block text-sm font-medium text-slate-700">Role</label>
                <select name="role" class="w-full rounded border border-slate-300 px-3 py-2" required>
                    <option value="guru">Guru</option>
                    <option value="siswa">Siswa</option>
                </select>
            </div>

            <button type="submit" class="rounded bg-slate-800 px-4 py-2 text-white">Simpan</button>
        </form>
    </div>
@endsection