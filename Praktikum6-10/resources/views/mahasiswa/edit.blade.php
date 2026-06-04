@extends('layouts.app')

@section('title', 'Edit Mahasiswa')

@section('content')
    <h2>Edit Mahasiswa</h2>

    <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>NIM</label>
        <input type="text" name="nim" value="{{ old('nim', $mahasiswa->nim) }}">
        @error('nim') <p class="error">{{ $message }}</p> @enderror

        <label>Nama</label>
        <input type="text" name="nama" value="{{ old('nama', $mahasiswa->nama) }}">
        @error('nama') <p class="error">{{ $message }}</p> @enderror

        <label>Jurusan</label>
        <input type="text" name="jurusan" value="{{ old('jurusan', $mahasiswa->jurusan) }}">
        @error('jurusan') <p class="error">{{ $message }}</p> @enderror

        <label>Email</label>
        <input type="email" name="email" value="{{ old('email', $mahasiswa->email) }}">
        @error('email') <p class="error">{{ $message }}</p> @enderror

        <label>Angkatan</label>
        <input type="number" name="angkatan" value="{{ old('angkatan', $mahasiswa->angkatan) }}">
        @error('angkatan') <p class="error">{{ $message }}</p> @enderror

        <button type="submit" class="btn btn-green">Update</button>
        <a href="{{ route('mahasiswa.index') }}" class="btn btn-blue">Kembali</a>
    </form>
@endsection