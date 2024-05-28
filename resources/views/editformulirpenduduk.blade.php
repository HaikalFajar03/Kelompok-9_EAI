@extends('layouts.kalogakbisa')
@section('content')

    <div class="card mb-3 m-lg-6 p-4">
        <form action="{{ route('updatependuduk', ['id' => $kontak->id]) }}" method="post" class="form-horizontal" >
            @csrf
            @method('PUT')
            <div class="card mb-3 m-lg-6 p-8 shadow-none" style="background-color: #F3FAFF;">
                <h2 class="text-center">Edit Formulir Data Penduduk</h2>
                <h5 class="bold">Step 1 : Melengkapi Data Diri</h5>
                <div id="card-body">
                    <div class="row mb-3">
                        <label for="namalengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control @error('namalengkap') is-invalid @enderror" name="namalengkap" id="namalengkap" placeholder="Mail bin ismail" value="{{ old('namalengkap', $kontak->namalengkap) }}">
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
                            <input type="text" class="form-control @error('TTL') is-invalid @enderror" name="TTL" id="TTL" placeholder="Durian runtuh, Malaysia" value="{{ old('TTL',$kontak->TTL) }}">
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
                            <select class="form-control @error('gender') is-invalid @enderror" name="gender">
                                <option selected disabled>Select gender type</option>
                                <option value="Pria" @if(old('gender', $kontak->gender) == 'Pria') selected @endif>Pria</option>
                                <option value="Wanita" @if(old('gender', $kontak->gender) == 'Wanita') selected @endif>Wanita</option>
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
                            <select class="form-control @error('agama') is-invalid @enderror" name="agama" >
                                <option value="Islam" @if(old('agama', $kontak->agama) == 'Islam') selected @endif>Islam</option>
                                <option value="Kristen" @if(old('agama', $kontak->agama) == 'Kristen') selected @endif>Kristen</option>
                                <option value="Katolik" @if(old('agama', $kontak->agama) == 'Katolik') selected @endif>Katolik</option>
                                <option value="Hindu" @if(old('agama', $kontak->agama) == 'Hindu') selected @endif>Hindu</option>
                                <option value="Buddha" @if(old('agama', $kontak->agama) == 'Buddha') selected @endif>Buddha</option>
                                <option value="Khonghucu" @if(old('agama', $kontak->agama) == 'Khonghucu') selected @endif>Khonghucu</option>
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
                            <textarea class="form-control @error('alamat') is-invalid @enderror"name="alamat" id="alamat" placeholder="Durian runtuh, Malaysia">{{ old('alamat', $kontak->alamat) }}</textarea>
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
                            <input type="number" class="form-control @error('phonenumber') is-invalid @enderror" name="phonenumber" id="phonenumber" placeholder="012345678910" value="{{ old('phonenumber', $kontak->phonenumber) }}">
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
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="mailKeceBadai@gmail.com" value="{{ old('email',$kontak->email) }}">
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
                            <input type="number" class="form-control @error('No_ktp') is-invalid @enderror" name="No_ktp" id="No_ktp" placeholder="1234567812345678" value="{{ old('No_ktp',$kontak->No_ktp) }}">
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
                            <select class="form-control @error('pendidikan') is-invalid @enderror" name="pendidikan">
                                <option value="Pria" @if(old('gender', $kontak->gender) == 'Pria') selected @endif>Pria</option>

                                <option selected disabled>Select</option>
                                <option value="Tidak ada" @if(old('pendidikan', $kontak->pendidikan) == 'Tidak ada') selected @endif>Tidak ada</option>
                                <option value="SD atau setara" @if(old('pendidikan', $kontak->pendidikan) == 'SD atau setara') selected @endif>SD atau setara</option>
                                <option value="SMP atau setara" @if(old('pendidikan', $kontak->pendidikan) == 'SMP atau setara') selected @endif>SMP atau setara</option>
                                <option value="SMA atau setara" @if(old('pendidikan', $kontak->pendidikan) == 'SMA atau setara') selected @endif>SMA atau setara</option>
                                <option value="D3 atau setara" @if(old('pendidikan', $kontak->pendidikan) == 'D3 atau setara') selected @endif>D3 atau setara</option>
                                <option value="Pendidikan tinggi atau setara" @if(old('pendidikan', $kontak->pendidikan) == 'Pendidikan tinggi atau setara') selected @endif>Pendidikan tinggi atau setara</option>
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
                            <input type="text" class="form-control @error('institusi') is-invalid @enderror" name="institusi" id="institusi" placeholder="Malay unipersiti" value="{{ old('institusi',$kontak->institusi) }}">
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
                            <input type="text" class="form-control @error('jurusan') is-invalid @enderror" name="jurusan" id="jurusan" placeholder="Ilmu padi" value="{{ old('jurusan', $kontak->jurusan) }}">
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
                            <input type="number" class="form-control @error('Tahun masuk') is-invalid @enderror" name="tahunmasuk" id="tahunmasuk" placeholder="2021" value="{{ old('tahunmasuk', $kontak->tahunmasuk) }}">
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
                            <input type="number" class="form-control @error('Tahun lulus') is-invalid @enderror" name="tahunlulus" id="tahunlulus" placeholder="2026" value="{{ old('tahunlulus', $kontak->tahunlulus) }}">
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
                            <input type="text" class="form-control @error('pengalaman kerja') is-invalid @enderror" name="pengalaman" id="pengalaman" placeholder="Jualan 2 singgit" value="{{ old('pengalaman', $kontak->pengalaman) }}">
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
                            <input type="text" class="form-control @error('bidang pekerjaan') is-invalid @enderror" name="bidang" id="bidang" placeholder="Jualan" value="{{ old('bidang', $kontak->bidang) }}">
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
                            <input type="number" class="form-control @error('Tahun') is-invalid @enderror" name="tahun" id="tahun" placeholder="2026" value="{{ old('tahun', $kontak->tahun) }}">
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
                            <input type="text" class="form-control @error('posisi') is-invalid @enderror" name="posisi" id="posisi" placeholder="CEO" value="{{ old('posisi',$kontak->posisi) }}">
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
                <a href="/databasependuduk" class="btn btn-secondary">Cancel</a>
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
