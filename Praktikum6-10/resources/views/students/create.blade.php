@extends('layouts.app')

@section('content')

<h2>Tambah Mahasiswa</h2>

<div class="card">
    <div class="card-body">

        <form action="{{ route('students.store') }}"
              method="POST">

            @csrf

            <div class="mb-3">
                <label class="form-label">NIM</label>

                <input type="text"
                       name="nim"
                       class="form-control @error('nim') is-invalid @enderror"
                       value="{{ old('nim') }}">

                @error('nim')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Nama</label>

                <input type="text"
                       name="name"
                       class="form-control @error('name') is-invalid @enderror"
                       value="{{ old('name') }}">

                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Alamat</label>

                <textarea name="address"
                          class="form-control @error('address') is-invalid @enderror">{{ old('address') }}</textarea>

                @error('address')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">

                <label class="form-label">
                    Jurusan
                </label>

                <select name="major_id"
                        class="form-control @error('major_id') is-invalid @enderror">

                    <option value="">
                        Pilih Jurusan
                    </option>

                    @foreach($majors as $major)

                        <option value="{{ $major->id }}">
                            {{ $major->name }}
                        </option>

                    @endforeach

                </select>

                @error('major_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Mata Kuliah
                </label>

                @error('subjects')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror

                @foreach($subjects as $subject)

                    <div class="form-check">

                        <input
                            class="form-check-input"
                            type="checkbox"
                            name="subjects[]"
                            value="{{ $subject->id }}">

                        <label class="form-check-label">

                            {{ $subject->name }}
                            ({{ $subject->sks }} SKS)

                        </label>

                    </div>

                @endforeach

            </div>

            <button type="submit"
                    class="btn btn-primary">
                Simpan
            </button>

            <a href="{{ route('students.index') }}"
               class="btn btn-secondary">
                Kembali
            </a>

        </form>

    </div>
</div>

@endsection