@extends('layouts.kalogakbisa')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Test Uji Kemampuan</div>

                <div class="card-body">
                    <form action="{{ route('testujikemampuan.update', $test->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Nama Test</label>
                            <input type="text" class="form-control" name="nama_test" value="{{ $test->nama_test }}" required>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Pelaksanaan</label>
                            <input type="date" class="form-control" name="tanggal_pelaksanaan" value="{{ $test->tanggal_pelaksanaan }}" required>
                        </div>
                        <div class="form-group">
                            <label>Tempat Pelaksanaan</label>
                            <input type="text" class="form-control" name="tempat_pelaksanaan" value="{{ $test->tempat_pelaksanaan }}" required>
                        </div>
                        <div class="form-group">
                            <label>Anggota Test</label>
                            <textarea class="form-control" name="anggota_test" rows="4">{{ $test->anggota_test }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Perbarui</button>
                        <a href="{{ route('testujikemampuan.index') }}" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
