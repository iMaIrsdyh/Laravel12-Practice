@extends('layouts.sidebar')

@section('title', 'Tambah Customer')
@section('page-title', 'Tambah Customer')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Tambah Customer Baru</h2>
            <p class="small-muted">Isi data customer baru lalu simpan.</p>
        </div>
        <div class="card-body">
            <form action="{{ route('customers.store') }}" method="POST">
                @csrf

                <label>Nama</label>
                <input type="text" name="name" value="{{ old('name') }}" placeholder="Masukkan nama" />
                @error('name') <p class="error">{{ $message }}</p> @enderror

                <label>Email</label>
                <input type="email" name="email" value="{{ old('email') }}" placeholder="email@example.com" />
                @error('email') <p class="error">{{ $message }}</p> @enderror

                <label>Telepon</label>
                <input type="text" name="phone" value="{{ old('phone') }}" placeholder="081234567890" />
                @error('phone') <p class="error">{{ $message }}</p> @enderror

                <label>Alamat</label>
                <textarea name="address" rows="4" placeholder="Alamat lengkap">{{ old('address') }}</textarea>
                @error('address') <p class="error">{{ $message }}</p> @enderror

                <div class="form-actions">
                    <button type="submit" class="btn btn-green">Simpan</button>
                    <a href="{{ route('customers.index') }}" class="btn btn-blue">Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endsection