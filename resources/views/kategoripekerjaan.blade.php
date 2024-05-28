@extends('layouts.kalogakbisa')
@section('content')

<div class="card mb-3 m-lg-6 p-4" style="background-color: #FFFFFF;"> 
    {{-- <form method="post" action="{{ route('tambahkategori.store') }}">
        <h2 class="text-center">Kategori Pekerjaan</h2>
        <div class="row mb-3">
            <label for="inputPassword3" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
                <a href="{{ route('tambahkategori.create') }}" class="card-link">
                <button type="button" class="btn btn-primary mt-3" onclick="addFormField()">
                    <i class="fas fa-plus"></i> Tambah Kategori
                </button>
            </div>
        </div> --}}
        {{-- <form method="post" action="{{ route('tambahkategori.store') }}"> --}}
            <h2 class="text-center">Kategori Pekerjaan</h2>
            <div class="row mb-3">
                <label for="inputPassword3" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <a href="{{ route('tambahkategori.create') }}" class="card-link">
                    <button type="button" class="btn btn-primary mt-3" onclick="addFormField()">
                        <i class="fas fa-plus"></i> Tambah Kategori
                    </button>
                </div>
            </div>
        <div>
            <div class="container">
                <div class="row">
                    @foreach ($kategoriList as $data)
                    <div class="col-sm-6 col-md-4 mb-4">
                        <div class="card shadow" style="width: 100%; border-radius: 15px;">
                            <a href="{{ route('produksi-manufaktur', $data->id) }}" class="card-link" style="text-decoration: none; color: inherit;">
                                <div class="card-body shadow" style="background-color: #E7F6FF; border-radius: 15px;">
                                    <h3 class="card-title">{{ $data->nama_kategori }}</h3>
                                    <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
                                    <p class="card-text">{{ $data->deskripsi }}</p>
                                    <a href="#" class="card-link">Card link</a>
                                    <a href="#" class="card-link">Another link</a>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            
            
            {{-- <div class="col-md-4">
                <div class="card shadow" style="width: 20rem; border-radius: 15px;">
                    <div class="card-body shadow" style="background-color: #E7F6FF; border-radius: 15px;">
                        <h3 class="card-title">Akuntansi dan Keuangan</h3>
                        <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow" style="width: 20rem; border-radius: 15px;">
                    <div class="card-body shadow" style="background-color: #E7F6FF; border-radius: 15px;">
                        <h3 class="card-title">Penjualan dan Pemasaran</h3>
                        <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row m-lg-6 no-gutters">
            <div class="col-md-4">
                <div class="card shadow" style="width: 20rem; border-radius: 15px;">
                    <div class="card-body shadow" style="background-color: #E7F6FF; border-radius: 15px;">
                        <h3 class="card-title">Teknologi dan Informatika</h3>
                        <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow" style="width: 20rem; border-radius: 15px;">
                    <div class="card-body shadow" style="background-color: #E7F6FF; border-radius: 15px;">
                        <h3 class="card-title">Editor dan Marketing</h3>
                        <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow" style="width: 20rem; border-radius: 15px;">
                    <div class="card-body shadow" style="background-color: #E7F6FF; border-radius: 15px;">
                        <h3 class="card-title">Teknik dan Konstruksi</h3>
                        <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
                    </div>
                </div>
            </div> --}}
        </div>
    {{-- </form> --}}
</div>

@endsection