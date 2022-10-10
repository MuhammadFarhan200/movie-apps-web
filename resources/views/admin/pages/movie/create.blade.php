@extends('admin.layouts.main')
@section('title-page', 'Create Movie')
@section('page-heading')
    <h2>Movie</h2>
    <p>Buat Data <b>Movie</b> dengan mengisi forum dibawah!</p>
@endsection

@section('page-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card shadow">
                    <div class="card-header">
                        <h3>Tambah Data</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('movie.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Judul</label>
                                <input type="text" name="judul"
                                    class="form-control @error('judul') is-invalid @enderror" id=""
                                    placeholder="Masukkan Judul Film" value="{{ old('judul') }}">
                                @error('judul')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Sinopsis</label>
                                <textarea type="text" name="sinopsis" class="form-control @error('sinopsis') is-invalid @enderror" id="default"
                                    placeholder="Tuliskan Sinopsis Film" rows="5">{{ old('sinposis') }}</textarea>
                                @error('sinopsis')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Cover</label>
                                <input type="file" name="cover"
                                    class="form-control @error('cover') is-invalid @enderror" id="">
                                @error('cover')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Background</label>
                                <input type="file" name="background"
                                    class="form-control @error('background') is-invalid @enderror" id="">
                                @error('background')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Genre</label>
                                <select name="id_genre" class="form-select @error('id_genre') is-invalid @enderror">
                                    <option value="">-- Pilih Genre --</option>
                                    @foreach ($genre as $data)
                                        <option value="{{ $data->id }}">{{ $data->kategori }}</option>
                                    @endforeach
                                </select>
                                @error('id_genre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Tahun Rilis</label>
                                <select name="id_tahun_rilis"
                                    class="form-select @error('id_tahun_rilis') is-invalid @enderror">
                                    <option value="">-- Pilih Tahun Rilis --</option>
                                    @foreach ($tahun as $data)
                                        <option value="{{ $data->id }}">{{ $data->tahun }}</option>
                                    @endforeach
                                </select>
                                @error('id_tahun_rilis')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="d-block">Casting</label>
                                {{-- <div class="d-flex flex-wrap justify-content-start align-items-center">
                                    @foreach ($casting as $data)
                                        <div class="border border-dark rounded-2 shadow-sm p-3 mx-1 mb-2">
                                            <input type="checkbox" name="casting[]"
                                                class="form-check-input @error('casting') is-invalid @enderror"
                                                value="{{ $data->id }}" id="casting-{{ $data->id }}">
                                            <label for="casting-{{ $data->id }}"
                                                class="form-check-label me-3">{{ $data->nama }}</label>
                                            @error('casting')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    @endforeach
                                </div> --}}
                                <select name="casting[]" class="form-control @error('casting') is-invalid @enderror"
                                    id="input-tags" multiple>
                                    @foreach ($casting as $data)
                                        <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Durasi Film</label>
                                <div class="input-group mb-3">
                                    <input type="number" min="0" name="durasi"
                                        class="form-control @error('durasi') is-invalid @enderror" id=""
                                        placeholder="Masukkan Durasi Film">
                                    <span class="input-group-text">Menit</span>
                                    @error('durasi')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="d-flex justify-content-end align-items-center mt-4">
                                <a href="{{ route('movie.index') }}" class="btn btn-secondary px-3 me-3">Batal</a>
                                <button type="submit" class="btn btn-primary px-3">
                                    Tambah
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
