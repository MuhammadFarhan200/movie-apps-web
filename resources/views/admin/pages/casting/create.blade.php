@extends('admin.layouts.main')

@section('title-page', 'Create Cast')
@section('page-heading')
    <h2>Cast Film</h2>
    <p>Buat data <b>cast film</b> baru dengan mengisi forum di bawah</p>
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
                        <div class="form-group mb-3">
                            <label for="">Nama</label>
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                                id="" placeholder="Masukkan Nama Cast" value="{{ old('nama') }}">
                            @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Foto</label>
                            <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror"
                                id="">
                            @error('foto')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="" class="d-block">Jenis Kelamin</label>
                            {{-- <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" value="Laki-laki"
                                    class="me-2 @error('jenis_kelamin') is-invalid @enderror" id="laki-laki">
                                <label class="form-check-label" for="laki-laki">Laki-laki</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" value="Perempuan"
                                    class="mx-2 @error('jenis_kelamin') is-invalid @enderror" id="perempuan">
                                <label class="form-check-label" for="perempuan">Perempuan</label>
                            </div> --}}
                            <select name="jenis_kelamin" id=""
                                class="form-select @error('jenis_kelamin') is-invalid @enderror">
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                            @error('jenis_kelamin')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
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
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
