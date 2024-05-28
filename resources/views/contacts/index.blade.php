@extends('layouts.kalogakbisa')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Daftar Kontak</div>

                <div class="card-body">
                    @if(Auth::user()->user_type == 'Super Admin')
                        <a href="{{ route('contacts.create') }}" class="btn btn-primary">Tambah Kontak Baru</a>
                    @endif
                    <br/><br/>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Wilayah Bertugas</th>
                                <th>Jabatan</th>
                                <th>Nomor Telepon</th>
                                @if(Auth::user()->user_type == 'Super Admin')
                                    <th>Aksi</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($contacts as $contact)
                            <tr>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->region }}</td>
                                <td>{{ $contact->position }}</td>
                                <td>{{ $contact->phone_number }}</td>
                                @if(Auth::user()->user_type == 'Super Admin')
                                    <td>
                                        <a href="{{ route('contacts.edit', $contact) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('contacts.destroy', $contact) }}" method="POST" style="display:inline;" onsubmit="return confirm('Anda Yakin Untuk Menghapus?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" dusk="delete-contact-{{ $contact->id }}">Hapus</button>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container mt-4">
    <div class="row">
        <div class="col text-center">
            <a href="{{ url('/dashboard') }}" class="btn btn-primary">Kembali</a>
        </div>
    </div>
</div>
@endsection