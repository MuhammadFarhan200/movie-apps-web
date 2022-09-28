@extends('admin.layouts.main')

@section('title-page', 'Edit Casting')
@section('page-heading')
    <h2>Casting Film</h2>
    <p>Edit data <b>casting film</b> dengan mengubah data pada forum dibawah</p>
@endsection

@section('page-content')
    <div class="row mb-5">
        <div class="col-md-10 mx-auto">
            <div class="card shadow">
                <div class="card-header">
                    <h3>Edit Data Casting Film</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('casting.update', $casting->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                                id="" placeholder="Masukkan Nama Casting" value="{{ $casting->nama }}">
                            @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Foto</label>
                            @if (isset($casting) && $casting->foto)
                                <p>
                                    <img src="{{ asset('images/casting/' . $casting->foto) }}"
                                        class="img-rounded rounded-3 img-responsive" style="width: 200px;"
                                        alt="{{ $casting->nama }}">
                                </p>
                            @endif
                            <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror"
                                value="{{ $casting->foto }}">
                            @error('foto')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id=""
                                class="form-control @error('jenis_kelamin') is-invalid @enderror">
                                <option value="">Pilih</option>
                                <option value="Laki-laki" {{ $casting->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>
                                    Laki-laki</option>
                                <option value="Perempuan" {{ $casting->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>
                                    Perempuan</option>
                            </select>
                            @error('jenis_kelamin')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir"
                                class="form-control @error('tanggal_lahir') is-invalid @enderror" id=""
                                value="{{ $casting->tanggal_lahir }}">
                            @error('tanggal_lahir')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-end align-items-center mt-4">
                            <a href="{{ route('casting.index') }}" class="btn btn-secondary px-3 me-3">Batal</a>
                            <button type="submit" class="btn btn-primary px-3">
                                Edit
                            </button>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
