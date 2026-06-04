@extends('layouts.sidebar')

@section('title', 'Detail Customer')
@section('page-title', 'Detail Customer')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Rincian Customer</h2>
            <p class="small-muted">Informasi lengkap mengenai customer terpilih.</p>
        </div>
        <div class="card-body">
            <table>
                <tr>
                    <th>Nama</th>
                    <td>{{ $customer->name }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $customer->email }}</td>
                </tr>
                <tr>
                    <th>Telepon</th>
                    <td>{{ $customer->phone }}</td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>{{ $customer->address }}</td>
                </tr>
                <tr>
                    <th>Dibuat</th>
                    <td>{{ $customer->created_at->format('d M Y') }}</td>
                </tr>
            </table>
            <div class="form-actions">
                <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-blue">Edit</a>
                <a href="{{ route('customers.index') }}" class="btn btn-green">Kembali</a>
            </div>
        </div>
    </div>
@endsection