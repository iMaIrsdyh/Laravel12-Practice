@extends('layouts.sidebar')

@section('title', 'Daftar Customer')
@section('page-title', 'Customer')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Daftar Customer</h2>
            <p class="small-muted">Kelola semua customer dengan mudah dari satu tampilan.</p>
        </div>
        <div class="card-body">
            <a href="{{ route('customers.create') }}" class="btn btn-green">+ Tambah Customer</a>

            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Telepon</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($customers as $index => $customer)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>{{ $customer->phone }}</td>
                                <td>{{ 
                                            Illuminate\Support\Str::limit($customer->address, 40) }}</td>
                                <td>
                                    <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-blue">Edit</a>
                                    <form action="{{ route('customers.destroy', $customer->id) }}" method="POST"
                                        class="form-inline" onsubmit="return confirm('Yakin hapus customer ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-red">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" style="text-align:center">Belum ada customer. Tambahkan data customer baru.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection