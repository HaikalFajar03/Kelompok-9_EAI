@extends('layouts.kalogakbisa')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Rekomendasi Pekerjaan Baru</div>

                <div class="card-body">
                    <form action="{{ route('rekomendasipekerjaan.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Nama Penduduk</label>
                            <input type="text" class="form-control" name="nama_penduduk" required>
                        </div>
                        <div class="form-group">
                            <label>Hasil Test Uji</label>
                            <input type="text" class="form-control" name="hasil_test_uji" required>
                        </div>
                        <div class="form-group">
                            <label>Nama Pekerjaan</label>
                            <input type="text" class="form-control" name="nama_pekerjaan" required>
                        </div>
                        <div class="form-group">
                            <label>Lokasi Pekerjaan</label>
                            <input type="text" class="form-control" name="lokasi_pekerjaan" required>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi Pekerjaan</label>
                            <textarea class="form-control" name="deskripsi_pekerjaan" rows="4" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('rekomendasipekerjaan.index') }}" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
