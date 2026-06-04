@extends('layouts.sidebar')

@section('title', 'Detail Produk')
@section('page-title', 'Detail Product')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Detail Produk</h2>
            <p class="small-muted">Lihat semua informasi produk secara ringkas.</p>
        </div>
        <div class="card-body">
            <table>
                <tr>
                    <th>Nama Produk</th>
                    <td>{{ $product->name }}</td>
                </tr>
                <tr>
                    <th>Harga</th>
                    <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <th>Deskripsi</th>
                    <td>{{ $product->description }}</td>
                </tr>
                <tr>
                    <th>Ditambahkan</th>
                    <td>{{ $product->created_at->format('d M Y') }}</td>
                </tr>
            </table>

            <br>
            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-green">Edit</a>
            <a href="{{ route('products.index') }}" class="btn btn-blue">Kembali</a>
        </div>
    </div>
@endsection