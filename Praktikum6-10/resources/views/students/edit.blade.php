@extends('layouts.app')

@section('content')

<h2>Edit Mahasiswa</h2>

<div class="card">
    <div class="card-body">

        <form action="{{ route('students.update',$student->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">NIM</label>

                <input type="text"
                       name="nim"
                       class="form-control"
                       value="{{ $student->nim }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Nama</label>

                <input type="text"
                       name="name"
                       class="form-control"
                       value="{{ $student->name }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Alamat</label>

                <textarea name="address"
                          class="form-control">{{ $student->address }}</textarea>
            </div>

            <div class="mb-3">

                <label class="form-label">
                    Jurusan
                </label>

                <select name="major_id"
                        class="form-control">

                    @foreach($majors as $major)

                        <option value="{{ $major->id }}"
                            {{ $student->major_id == $major->id ? 'selected' : '' }}>

                            {{ $major->name }}

                        </option>

                    @endforeach

                </select>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Mata Kuliah
                </label>

                @foreach($subjects as $subject)

                    <div class="form-check">

                        <input
                            class="form-check-input"
                            type="checkbox"
                            name="subjects[]"
                            value="{{ $subject->id }}"

                            {{ in_array(
                                $subject->id,
                                $student->subjects->pluck('id')->toArray()
                            ) ? 'checked' : '' }}>

                        <label class="form-check-label">

                            {{ $subject->name }}
                            ({{ $subject->sks }} SKS)

                        </label>

                    </div>

                @endforeach

            </div>

            <button type="submit"
                    class="btn btn-primary">
                Update
            </button>

            <a href="{{ route('students.index') }}"
               class="btn btn-secondary">
                Kembali
            </a>

        </form>

    </div>
</div>

@endsection