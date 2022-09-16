@extends('admin.layouts.main')

@section('title-page', 'Show Data')
@section('page-heading')
    <h2>Casting Film</h2>
    <p>Buat data <b>casting film</b> baru dengan mengisi forum di bawah</p>
@endsection

@section('page-content')
    <div class="row mb-5">
        <div class="col-md-10 mx-auto">
            <div class="card shadow">
                <div class="card-header">
                    <h3>Tambah Data Casting Film</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('casting.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                                id="" placeholder="Masukkan Nama Cast">
                            @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Foto</label>
                            <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror"
                                id="">
                            @error('foto')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Jenis Kelamin</label>
                            <br>
                            <input type="radio" name="jenis_kelamin" value="Laki-laki"
                                class="me-2 @error('jenis_kelamin') is-invalid @enderror" id="">Laki-laki
                            <input type="radio" name="jenis_kelamin" value="Perempuan"
                                class="mx-2 @error('jenis_kelamin') is-invalid @enderror" id="">Perempuan
                            @error('jenis_kelamin')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir"
                                class="form-control @error('tanggal_lahir') is-invalid @enderror" id="">
                            @error('tanggal_lahir')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-end align-items-center mt-4">
                            <a href="{{ route('casting.index') }}" class="btn btn-secondary me-3">Batal</a>
                            <button type="submit" class="btn btn-primary">
                                Tambah
                            </button>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
