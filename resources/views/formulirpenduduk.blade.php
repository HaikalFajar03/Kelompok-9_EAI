@extends('layouts.kalogakbisa')
@section('content')

    <div class="card mb-3 m-lg-6 p-4">
        <form action="{{ route('formulirpenduduk.store') }}" method="post" class="form-horizontal" >
            @csrf
            <div class="card mb-3 m-lg-6 p-8 shadow-none" style="background-color: #F3FAFF;">
                <h2 class="text-center">Formulir Data Penduduk</h2>
                <h5 class="bold">Step 1 : Melengkapi Data Diri</h5>
                <div id="card-body">
                    <div class="row mb-3">
                        <label for="namalengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control @error('namalengkap') is-invalid @enderror" name="namalengkap" id="namalengkap" placeholder="Mail bin ismail" value="{{ old('namalengkap') }}">
                            @error('namalengkap')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="TTL" class="col-sm-2 col-form-label">Tempat/Tanggal Lahir</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control @error('TTL') is-invalid @enderror" name="TTL" id="TTL" placeholder="Durian runtuh, Malaysia" value="{{ old('TTL') }}">
                            @error('TTL')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="gender" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-12">
                            <select class="form-control @error('gender') is-invalid @enderror" name="gender" value="{{ old('gender') }}">
                                <option selected disabled>Select gender type</option>
                                <option value="Pria">Pria</option>
                                <option value="Wanita">Wanita</option>
                            </select>
                            @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="agama" class="col-sm-2 col-form-label">Agama</label>
                        <div class="col-sm-12">
                            <select class="form-control @error('agama') is-invalid @enderror" name="agama" value="{{ old('agama') }}">
                                <option selected disabled>Select religion</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Buddha">Buddha</option>
                                <option value="Khonghucu">Khonghucu</option>
                            </select>
                            @error('agama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat Lengkap</label>
                        <div class="col-sm-12">
                            <textarea class="form-control @error('alamat') is-invalid @enderror"name="alamat" id="alamat" placeholder="Durian runtuh, Malaysia" value="{{ old('alamat') }}"></textarea>
                            @error('alamat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="phonenumber" class="col-sm-2 col-form-label">Nomor Telepon</label>
                        <div class="col-sm-12">
                            <input type="number" class="form-control @error('phonenumber') is-invalid @enderror" name="phonenumber" id="phonenumber" placeholder="012345678910" value="{{ old('phonenumber') }}">
                            @error('phonenumber')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="email" class="col-sm-2 col-form-label">Alamat Email</label>
                        <div class="col-sm-12">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="mailKeceBadai@gmail.com" value="{{ old('email') }}">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="No_ktp" class="col-sm-2 col-form-label">No. KTP</label>
                        <div class="col-sm-12">
                            <input type="number" class="form-control @error('No_ktp') is-invalid @enderror" name="No_ktp" id="No_ktp" placeholder="1234567812345678" value="{{ old('No_ktp') }}">
                            @error('No_ktp')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        {{-- <button type="button" class="btn btn-primary mt-3" onclick="addFormField()">
                            <i class="fas fa-plus"></i> Tambah Kolom
                        </button> --}}
                    </div>
                </div>
                <h5 class="bold">Step 2 : Melengkapi Riwayat Pendidikan</h5>
                <div id="form-fields">
                    <div class="row mb-3">
                        <label for="pendidikan" class="col-sm-4 col-form-label">Riwayat Pendidikan Terakhir</label>
                        <div class="col-sm-12">
                            <select class="form-control @error('pendidikan') is-invalid @enderror" name="pendidikan" value="{{ old('pendidikan') }}">
                                <option selected disabled>Select</option>
                                <option value="Tidak ada">Tidak ada</option>
                                <option value="SD atau setara">SD atau setara</option>
                                <option value="SMP atau setara">SMP atau setara</option>
                                <option value="SMA atau setara">SMA atau setara</option>
                                <option value="D3 atau setara">D3 atau setara</option>
                                <option value="Pendidikan tinggi atau setara">Pendidikan tinggi atau setara</option>
                            </select>
                            @error('pendidikan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                <div id="form-fields">
                    <div class="row mb-3">
                        <label for="institusi" class="col-sm-2 col-form-label">Nama Institusi</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control @error('institusi') is-invalid @enderror" name="institusi" id="institusi" placeholder="Malay unipersiti" value="{{ old('institusi') }}">
                            @error('institusi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                <div id="form-fields">
                    <div class="row mb-3">
                        <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control @error('jurusan') is-invalid @enderror" name="jurusan" id="jurusan" placeholder="Ilmu padi" value="{{ old('jurusan') }}">
                            @error('jurusan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                <div id="form-fields">
                    <div class="row mb-3">
                        <label for="tahunmasuk" class="col-sm-2 col-form-label">Tahun Masuk</label>
                        <div class="col-sm-12">
                            <input type="number" class="form-control @error('Tahun masuk') is-invalid @enderror" name="tahunmasuk" id="tahunmasuk" placeholder="2021" value="{{ old('tahunmasuk') }}">
                            @error('tahunmasuk')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                <div id="form-fields">
                    <div class="row mb-3">
                        <label for="tahunlulus" class="col-sm-4 col-form-label">Tahun Lulus (Sesuai Dengan Ijazah)</label>
                        <div class="col-sm-12">
                            <input type="number" class="form-control @error('Tahun lulus') is-invalid @enderror" name="tahunlulus" id="tahunlulus" placeholder="2026" value="{{ old('tahunlulus') }}">
                            @error('tahunlulus')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-2 col-form-label"></label>
                    {{-- <div class="col-sm-10">
                        <button type="button" class="btn btn-primary mt-3" onclick="addFormField()">
                            <i class="fas fa-plus"></i> Tambah Kolom
                        </button>
                    </div> --}}
                </div>
                <h5 class="bold">Step 3 : Pengalaman Kerja</h5>
                <div id="form-fields">
                    <div class="row mb-3">
                        <label for="pengalaman" class="col-sm-4 col-form-label">Pengalaman Kerja</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control @error('pengalaman kerja') is-invalid @enderror" name="pengalaman" id="pengalaman" placeholder="Jualan 2 singgit" value="{{ old('pengalaman') }}">
                            @error('pengalaman')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                <div id="form-fields">
                    <div class="row mb-3">
                        <label for="bidang" class="col-sm-2 col-form-label">Bidang Pekerjaan</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control @error('bidang pekerjaan') is-invalid @enderror" name="bidang" id="bidang" placeholder="Jualan" value="{{ old('bidang') }}">
                            @error('bidang')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                <div id="form-fields">
                    <div class="row mb-3">
                        <label for="tahun" class="col-sm-4 col-form-label">Dari Tahun - Hingga</label>
                        <div class="col-sm-12">
                            <input type="number" class="form-control @error('Tahun') is-invalid @enderror" name="tahun" id="tahun" placeholder="2026" value="{{ old('tahun') }}">
                            @error('tahun')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                <div id="form-fields">
                    <div class="row mb-3">
                        <label for="posisi" class="col-sm-2 col-form-label">Posisi Sebagai</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control @error('posisi') is-invalid @enderror" name="posisi" id="posisi" placeholder="CEO" value="{{ old('posisi') }}">
                            @error('posisi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-2 col-form-label"></label>
                    {{-- <div class="col-sm-10">
                        <button type="button" class="btn btn-primary mt-3" onclick="addFormField()">
                            <i class="fas fa-plus"></i> Tambah Kolom
                        </button>
                    </div> --}}
                </div>
                {{-- <div class="text-center mt-3" id="button-container">
                    <button type="submit" class="btn btn-primary mr-2">Save</button>
                    <button type="button" class="btn btn-secondary" style="background-color: #DDE2E5; color: #8D8D8D">Cancel</button>
                </div> --}}
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="pengaturanadmin" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>

    {{-- <script>
        // Fungsi untuk menambahkan kolom pada formulir
        function addFormField() {
            var formFields = document.getElementById("form-fields");
            var newField = document.createElement("div");
            newField.innerHTML = `
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Judul Kolom</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="judulKolom" contenteditable="true">
                    </div>
                </div>
            `;
            var nikRow = document.getElementById("inputPassword3").closest('.row');
            formFields.insertBefore(newField, nikRow.nextSibling);
            var label = prompt("Masukkan nama untuk label baru:");
            newField.querySelector('label').innerText = label;
        }

        // Fungsi untuk menyimpan kolom
        function saveColumn() {
            var judulKolom = document.getElementById("judulKolom").value;
            // Lakukan sesuatu dengan judul kolom yang disimpan, misalnya kirim ke server
            console.log("Judul Kolom: ", judulKolom);
        }

        // Fungsi untuk membatalkan formulir
        function cancelForm() {
            // Lakukan sesuatu ketika tombol "Cancel" ditekan
        }
    </script> --}}

@endsection

@section('scripts')
    <!-- Include SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- Script untuk menampilkan SweetAlert setelah berhasil menambahkan admin -->
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
