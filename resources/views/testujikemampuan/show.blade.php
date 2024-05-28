@extends('layouts.kalogakbisa')
@section('content')

<div class="container mt-5">
    <h2>Detail Test Uji Kemampuan</h2>
    <div class="card">
        <div class="card-header">
            {{ $test->nama_test }}
        </div>
        <div class="card-body">
            <p><strong>Tanggal Pelaksanaan:</strong> {{ $test->tanggal_pelaksanaan }}</p>
            <p><strong>Tempat Pelaksanaan:</strong> {{ $test->tempat_pelaksanaan }}</p>
            <p><strong>Anggota Test:</strong> {{ $test->anggota_test }}</p>
            <a href="{{ route('testujikemampuan.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
