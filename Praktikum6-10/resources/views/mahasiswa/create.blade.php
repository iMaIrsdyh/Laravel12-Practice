@extends('layouts.app')

@section('title', 'Tambah Mahasiswa')

@section('content')
    <h2>Tambah Mahasiswa</h2>

    <form action="{{ route('mahasiswa.store') }}" method="POST">
        @csrf

        <label>NIM</label>
        <input type="text" name="nim" value="{{ old('nim') }}" placeholder="Contoh: 2210101001">
        @error('nim') <p class="error">{{ $message }}</p> @enderror

        <label>Nama</label>
        <input type="text" name="nama" value="{{ old('nama') }}" placeholder="Nama lengkap">
        @error('nama') <p class="error">{{ $message }}</p> @enderror

        <label>Jurusan</label>
        <input type="text" name="jurusan" value="{{ old('jurusan') }}" placeholder="Teknik Informatika">
        @error('jurusan') <p class="error">{{ $message }}</p> @enderror

        <label>Email</label>
        <input type="email" name="email" value="{{ old('email') }}" placeholder="email@example.com">
        @error('email') <p class="error">{{ $message }}</p> @enderror

        <label>Angkatan</label>
        <input type="number" name="angkatan" value="{{ old('angkatan') }}" placeholder="2022">
        @error('angkatan') <p class="error">{{ $message }}</p> @enderror

        <button type="submit" class="btn btn-green">Simpan</button>
        <a href="{{ route('mahasiswa.index') }}" class="btn btn-blue">Kembali</a>
    </form>
@endsection