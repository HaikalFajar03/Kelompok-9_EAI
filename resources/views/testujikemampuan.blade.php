@extends('layouts.kalogakbisa')
@section('content')

    <div class="card mb-3 m-lg-6 p-4">
        <form action="{{ route('test-uji-kemampuan.store') }}" method="post" class="form-horizontal" >
            @csrf
            <div class="card mb-3 m-lg-6 p-8 shadow-none" style="background-color: #F3FAFF;">
                <h2 class="text-center">Formulir Test Uji Kemampuan</h2>
                <h5 class="bold">Step 1 : Melengkapi Detail Test</h5>
                <div id="card-body">
                    <div class="row mb-3">
                        <label for="nama_test" class="col-sm-2 col-form-label">Nama Test</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control @error('nama_test') is-invalid @enderror" name="nama_test" id="nama_test" placeholder="Nama Test" value="{{ old('nama_test') }}">
                            @error('nama_test')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="tanggal_pelaksanaan" class="col-sm-2 col-form-label">Tanggal Pelaksanaan</label>
                        <div class="col-sm-12">
                            <input type="date" class="form-control @error('tanggal_pelaksanaan') is-invalid @enderror" name="tanggal_pelaksanaan" id="tanggal_pelaksanaan" value="{{ old('tanggal_pelaksanaan') }}">
                            @error('tanggal_pelaksanaan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="tempat_pelaksanaan" class="col-sm-2 col-form-label">Tempat Pelaksanaan</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control @error('tempat_pelaksanaan') is-invalid @enderror" name="tempat_pelaksanaan" id="tempat_pelaksanaan" placeholder="Tempat Pelaksanaan" value="{{ old('tempat_pelaksanaan') }}">
                            @error('tempat_pelaksanaan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="daftar_anggota_test" class="col-sm-2 col-form-label">Daftar Anggota Test</label>
                        <div class="col-sm-12">
                            <textarea type="text" class="form-control @error('daftar_anggota_test') is-invalid @enderror" name="daftar_anggota_test" id="daftar_anggota_test" placeholder="Daftar Anggota Test">{{ old('daftar_anggota_test') }}</textarea>
                            @error('daftar_anggota_test')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="#" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>

@endsection

@section('scripts')
    <!-- Include SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- Script untuk menampilkan SweetAlert setelah berhasil menambahkan test -->
    @if(session('success'))
        <script>
            Swal.fire({
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        </script>
    @endif
@endsection
