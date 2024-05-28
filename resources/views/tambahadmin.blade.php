@extends('layouts.kalogakbisa')
@section('content')
<div class="container-fluid py-4 px-5">
    <div class="row">
        <div class="col-12">
            <div class="card border shadow-xs mb-4">
                <div class="card-header border-bottom pbb-0">
                    <div class="d-sm-flex align-items-center">
                        <div>
                            <h6 class="font-weight-semibold text-lg mb-0">Tambah Akun</h6>
                            <p class="text-sm">Isi informasi di bawah ini</p>
                        </div>
                        <div class="ms-auto d-flex">
                        </div>
                    </div>
                </div>
                <form method="POST" action="{{ route('admin.store') }}">

                    <div class="card-body px-0 py-0">
                        <div class="table-responsive p-0">
                            {{-- <form method="POST" action="{{ route('tambahadmin.store') }}"> --}}
                            {{-- <form method="POST" action="{{ route('tambahadmin.store') }}"> --}}
                                @csrf
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="exampleNamaPool" class="col-sm-2 col-form-label">Fullname</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control @error('fullname') is-invalid @enderror" id="fullname" name="fullname" placeholder="mail bin ismail" value="{{ old('fullname') }}">
                                            @error('fullname')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="exampleRentangIp" class="col-sm-2 col-form-label">Username</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="mail" value="{{ old('username') }}">
                                            @error('username')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- <div class="form-group row">
                                        <label for="exampleRentangIp" class="col-sm-2 col-form-label">Password</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="123456" value="{{ old('password') }}">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div> --}}

                                    <div class="form-group row">
                                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                                        <div class="col-sm-12">
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Enter your password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password_confirmation" class="col-sm-2 col-form-label">Confirm Password</label>
                                        <div class="col-sm-12">
                                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm your password">
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="exampleRentangIp" class="col-sm-2 col-form-label">User type</label>
                                        <div class="col-sm-12">
                                            <select class="form-control" name="user_type">
                                                <option selected disabled>Select user type</option>
                                                <option value="Super Admin">Super Admin</option>
                                                <option value="Admin">Admin</option>
                                            </select>
                                            @error('user_type')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="pengaturanadmin" class="btn btn-secondary">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
