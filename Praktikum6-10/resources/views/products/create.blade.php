@extends('layouts.sidebar')

@section('title', 'Tambah Produk')
@section('page-title', 'Tambah Product')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Tambah Produk Baru</h2>
            <p class="small-muted">Isi informasi produk untuk ditambahkan ke sistem.</p>
        </div>
        <div class="card-body">
            <form action="{{ route('products.store') }}" method="POST">
                @csrf

                <label>Nama Produk</label>
                <input type="text" name="name" value="{{ old('name') }}" placeholder="Contoh: Laptop" />
                @error('name') <p class="error">{{ $message }}</p> @enderror

                <label>Harga</label>
                <input type="number" name="price" value="{{ old('price') }}" placeholder="Contoh: 7000000" />
                @error('price') <p class="error">{{ $message }}</p> @enderror

                <label>Deskripsi</label>
                <textarea name="description" rows="4" placeholder="Deskripsi produk">{{ old('description') }}</textarea>
                @error('description') <p class="error">{{ $message }}</p> @enderror

                <button type="submit" class="btn btn-green">Simpan</button>
                <a href="{{ route('products.index') }}" class="btn btn-blue">Kembali</a>
            </form>
        </div>
    </div>
@endsection