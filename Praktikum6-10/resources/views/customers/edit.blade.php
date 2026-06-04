@extends('layouts.sidebar')

@section('title', 'Edit Customer')
@section('page-title', 'Edit Customer')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Edit Data Customer</h2>
            <p class="small-muted">Perbarui data customer yang sudah tersimpan.</p>
        </div>
        <div class="card-body">
            <form action="{{ route('customers.update', $customer->id) }}" method="POST">
                @csrf
                @method('PUT')

                <label>Nama</label>
                <input type="text" name="name" value="{{ old('name', $customer->name) }}" />
                @error('name') <p class="error">{{ $message }}</p> @enderror

                <label>Email</label>
                <input type="email" name="email" value="{{ old('email', $customer->email) }}" />
                @error('email') <p class="error">{{ $message }}</p> @enderror

                <label>Telepon</label>
                <input type="text" name="phone" value="{{ old('phone', $customer->phone) }}" />
                @error('phone') <p class="error">{{ $message }}</p> @enderror

                <label>Alamat</label>
                <textarea name="address" rows="4">{{ old('address', $customer->address) }}</textarea>
                @error('address') <p class="error">{{ $message }}</p> @enderror

                <div class="form-actions">
                    <button type="submit" class="btn btn-green">Update</button>
                    <a href="{{ route('customers.index') }}" class="btn btn-blue">Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endsection