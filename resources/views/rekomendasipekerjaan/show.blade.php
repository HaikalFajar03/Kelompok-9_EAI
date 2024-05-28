@extends('layouts.kalogakbisa')
@section('content')

    <div class="container">
        <h1>Detail Rekomendasi Pekerjaan</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Nama Penduduk: {{ $rekomendasiPekerjaan->nama_penduduk }}</h5>
                <p class="card-text">Hasil Test Uji: {{ $rekomendasiPekerjaan->hasil_test_uji }}</p>
                <p class="card-text">Nama Pekerjaan: {{ $rekomendasiPekerjaan->nama_pekerjaan }}</p>
                <p class="card-text">Lokasi Pekerjaan: {{ $rekomendasiPekerjaan->lokasi_pekerjaan }}</p>
                <p class="card-text">Deskripsi Pekerjaan: {{ $rekomendasiPekerjaan->deskripsi_pekerjaan }}</p>
                <a href="{{ route('rekomendasipekerjaan.index') }}" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    </div>
@endsection
