@extends('layouts.kalogakbisa')
@section('content')

    <div class="card mb-3 m-lg-6 p-4">
        <form action="{{ route('rekomendasipekerjaan.store') }}" method="post" class="form-horizontal" >
            @csrf
            <div class="card mb-3 m-lg-6 p-8 shadow-none" style="background-color: #F3FAFF;">
                <h2 class="text-center">Formulir Rekomendasi Pekerjaan</h2>
                <h5 class="bold">Step 1 : Melengkapi Detail Pekerjaan</h5>
                <div id="card-body">
                    <div class="row mb-3">
                        <label for="nama_penduduk" class="col-sm-2 col-form-label">Nama Penduduk</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control @error('nama_penduduk') is-invalid @enderror" name="nama_penduduk" id="nama_penduduk" placeholder="Nama Penduduk" value="{{ old('nama_penduduk') }}">
                            @error('nama_penduduk')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="hasil_test_uji" class="col-sm-2 col-form-label">Hasil Test Uji</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control @error('hasil_test_uji') is-invalid @enderror" name="hasil_test_uji" id="hasil_test_uji" placeholder="Hasil Test Uji" value="{{ old('hasil_test_uji') }}">
                            @error('hasil_test_uji')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="nama_pekerjaan" class="col-sm-2 col-form-label">Nama Pekerjaan</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control @error('nama_pekerjaan') is-invalid @enderror" name="nama_pekerjaan" id="nama_pekerjaan" placeholder="Nama Pekerjaan" value="{{ old('nama_pekerjaan') }}">
                            @error('nama_pekerjaan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="lokasi_pekerjaan" class="col-sm-2 col-form-label">Lokasi Pekerjaan</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control @error('lokasi_pekerjaan') is-invalid @enderror" name="lokasi_pekerjaan" id="lokasi_pekerjaan" placeholder="Lokasi Pekerjaan" value="{{ old('lokasi_pekerjaan') }}">
                            @error('lokasi_pekerjaan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="deskripsi_pekerjaan" class="col-sm-2 col-form-label">Deskripsi Pekerjaan</label>
                        <div class="col-sm-12">
                            <textarea type="text" class="form-control @error('deskripsi_pekerjaan') is-invalid @enderror" name="deskripsi_pekerjaan" id="deskripsi_pekerjaan" placeholder="Deskripsi Pekerjaan">{{ old('deskripsi_pekerjaan') }}</textarea>
                            @error('deskripsi_pekerjaan')
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

    <!-- Script untuk menampilkan SweetAlert setelah berhasil menambahkan pekerjaan -->
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
