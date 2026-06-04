@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Daftar Mahasiswa</h2>

    <a href="{{ route('students.create') }}"
       class="btn btn-primary">
        Tambah Mahasiswa
    </a>
</div>

<div class="table-responsive">

    <table class="table table-striped">

        <thead>
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Jurusan</th>
            <th>Mata Kuliah</th>
            <th>Total SKS</th>
            <th>Aksi</th>
        </tr>
        </thead>

        <tbody>

        @foreach($students as $student)

            <tr>

                <td>{{ $student->nim }}</td>

                <td>{{ $student->name }}</td>

                <td>{{ $student->major->name }}</td>

                <td>

                    @foreach($student->subjects as $subject)

                        <span class="badge bg-secondary me-1">
                            {{ $subject->name }}
                        </span>

                    @endforeach

                </td>

                <td>
                    {{ $student->subjects->sum('sks') }}
                </td>

                <td>

                    <a href="{{ route('students.show',$student->id) }}"
                       class="btn btn-info btn-sm">
                        Detail
                    </a>

                    <a href="{{ route('students.edit',$student->id) }}"
                       class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <form action="{{ route('students.destroy',$student->id) }}"
                          method="POST"
                          class="d-inline">

                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="btn btn-danger btn-sm"
                            onclick="return confirm('Yakin ingin menghapus?')">

                            Hapus

                        </button>

                    </form>

                </td>

            </tr>

        @endforeach

        </tbody>

    </table>

</div>

@endsection