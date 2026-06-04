@extends('layouts.sidebar')

@section('title', 'Daftar Produk')
@section('page-title', 'Product')
@section('page-actions')
    <a href="{{ route('products.create') }}" class="btn btn-green">+ Tambah Produk</a>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Daftar Produk</h2>
            <p class="small-muted">Kelola produk dengan cepat, tampilkan harga dan deskripsi secara rapi.</p>
        </div>
        <div class="card-body">
            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $index => $product)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $product->name }}</td>
                                <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                                <td>{{ $product->description }}</td>
                                <td>
                                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-blue">Lihat</a>
                                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-green">Edit</a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                        style="display:inline" onsubmit="return confirm('Yakin hapus produk ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-red">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" style="text-align:center">Belum ada produk. Tambahkan produk baru.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
@endsection