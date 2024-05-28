@extends('layouts.kalogakbisa')
@section('content')

    <div class="container">
        <h1>Edit Rekomendasi Pekerjaan</h1>
        <form action="{{ route('rekomendasipekerjaan.update', $rekomendasiPekerjaan->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama_penduduk">Nama Penduduk:</label>
                <input type="text" class="form-control" id="nama_penduduk" name="nama_penduduk" value="{{ $rekomendasiPekerjaan->nama_penduduk }}" required>
            </div>
            <div class="form-group">
                <label for="hasil_test_uji">Hasil Test Uji:</label>
                <input type="text" class="form-control" id="hasil_test_uji" name="hasil_test_uji" value="{{ $rekomendasiPekerjaan->hasil_test_uji }}" required>
            </div>
            <div class="form-group">
                <label for="nama_pekerjaan">Nama Pekerjaan:</label>
                <input type="text" class="form-control" id="nama_pekerjaan" name="nama_pekerjaan" value="{{ $rekomendasiPekerjaan->nama_pekerjaan }}" required>
            </div>
            <div class="form-group">
                <label for="lokasi_pekerjaan">Lokasi Pekerjaan:</label>
                <input type="text" class="form-control" id="lokasi_pekerjaan" name="lokasi_pekerjaan" value="{{ $rekomendasiPekerjaan->lokasi_pekerjaan }}" required>
            </div>
            <div class="form-group">
                <label for="deskripsi_pekerjaan">Deskripsi Pekerjaan:</label>
                <textarea class="form-control" id="deskripsi_pekerjaan" name="deskripsi_pekerjaan" required>{{ $rekomendasiPekerjaan->deskripsi_pekerjaan }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
