@extends('layouts.sidebar')

@section('title', 'Edit Produk')
@section('page-title', 'Edit Product')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Edit Produk</h2>
            <p class="small-muted">Perbarui data produk sesuai kebutuhan.</p>
        </div>
        <div class="card-body">
            <form action="{{ route('products.update', $product->id) }}" method="POST">
                @csrf
                @method('PUT')

                <label>Nama Produk</label>
                <input type="text" name="name" value="{{ old('name', $product->name) }}" />
                @error('name') <p class="error">{{ $message }}</p> @enderror

                <label>Harga</label>
                <input type="number" name="price" value="{{ old('price', $product->price) }}" />
                @error('price') <p class="error">{{ $message }}</p> @enderror

                <label>Deskripsi</label>
                <textarea name="description" rows="4">{{ old('description', $product->description) }}</textarea>
                @error('description') <p class="error">{{ $message }}</p> @enderror

                <button type="submit" class="btn btn-green">Update</button>
                <a href="{{ route('products.index') }}" class="btn btn-blue">Kembali</a>
            </form>
        </div>
    </div>
@endsection