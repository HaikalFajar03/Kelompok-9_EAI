@extends('layouts.kalogakbisa')
@section('content')

<div class="container mt-5">
    <h2>Daftar Test Uji Kemampuan</h2>
    <a href="{{ route('testujikemampuan.create') }}" class="btn btn-primary mb-3">Tambah Test</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <style>
        .container {
            margin-top: 50px;
        }

        .custom-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .custom-table th, .custom-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .custom-table th {
            background-color: #f2f2f2;
        }

        .custom-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .custom-table tr:hover {
            background-color: #f1f1f1;
        }

        .btn-show, .btn-edit, .btn-delete {
            color: white;
            padding: 5px 10px;
            text-decoration: none;
            margin: 2px;
            display: inline-block;
            border: none;
            cursor: pointer;
            border-radius: 3px;
        }

        .btn-show {
            background-color: #17a2b8; /* Info */
        }

        .btn-edit {
            background-color: #ff9800; /* Orange */
        }

        .btn-delete {
            background-color: #f44336; /* Red */
        }

        .btn-show:hover, .btn-edit:hover, .btn-delete:hover {
            opacity: 0.8;
        }
    </style>

    <table class="custom-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Test</th>
                <th>Tanggal Pelaksanaan</th>
                <th>Tempat Pelaksanaan</th>
                <th>Anggota Test</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($testujikemampuan as $key => $test)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $test->nama_test }}</td>
                <td>{{ $test->tanggal_pelaksanaan }}</td>
                <td>{{ $test->tempat_pelaksanaan }}</td>
                <td>{{ $test->anggota_test }}</td>
                <td>
                    <a href="{{ route('testujikemampuan.show', $test->id) }}" class="btn-show">Lihat</a>
                    <a href="{{ route('testujikemampuan.edit', $test->id) }}" class="btn-edit">Edit</a>
                    <form action="{{ route('testujikemampuan.destroy', $test->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
