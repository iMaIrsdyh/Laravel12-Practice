@extends('layouts.app')

@section('content')

<h2>Detail Mahasiswa</h2>

<div class="card">
    <div class="card-body">

        <table class="table">

            <tr>
                <th width="200">NIM</th>
                <td>{{ $student->nim }}</td>
            </tr>

            <tr>
                <th>Nama</th>
                <td>{{ $student->name }}</td>
            </tr>

            <tr>
                <th>Alamat</th>
                <td>{{ $student->address }}</td>
            </tr>

            <tr>
                <th>Jurusan</th>
                <td>{{ $student->major->name }}</td>
            </tr>

            <tr>
                <th>Mata Kuliah</th>
                <td>

                    @foreach($student->subjects as $subject)

                        <span class="badge bg-primary">
                            {{ $subject->name }}
                            ({{ $subject->sks }} SKS)
                        </span>

                    @endforeach

                </td>
            </tr>

            <tr>
                <th>Total SKS</th>
                <td>
                    {{ $student->subjects->sum('sks') }}
                </td>
            </tr>

        </table>

        <a href="{{ route('students.index') }}"
           class="btn btn-secondary">
            Kembali
        </a>

    </div>
</div>

@endsection