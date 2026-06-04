@extends('layouts.app')

@section('title', 'Detail Mahasiswa')

@section('content')
    <h2>Detail Mahasiswa</h2>

    <table>
        <tr><th>NIM</th><td>{{ $mahasiswa->nim }}</td></tr>
        <tr><th>Nama</th><td>{{ $mahasiswa->nama }}</td></tr>
        <tr><th>Jurusan</th><td>{{ $mahasiswa->jurusan }}</td></tr>
        <tr><th>Email</th><td>{{ $mahasiswa->email }}</td></tr>
        <tr><th>Angkatan</th><td>{{ $mahasiswa->angkatan }}</td></tr>
    </table>

    <br>
    <a href="{{ route('mahasiswa.edit', $mahasiswa->id) }}" class="btn btn-blue">Edit</a>
    <form action="{{ route('mahasiswa.destroy', $mahasiswa->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Yakin hapus data ini?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-red">Hapus</button>
    </form>
    <a href="{{ route('mahasiswa.index') }}" class="btn btn-green">Kembali</a>
@endsection
