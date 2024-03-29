@extends('admin.layouts.main')
@section('title-page', 'Edit Movie')

@section('page-heading')
    <h2>Movie</h2>
    <p>Edit Data <b>Movie</b> dengan mengubah data forum dibawah!</p>
@endsection

@section('page-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card shadow">
                    <div class="card-header">
                        <h3>Edit Data</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('movie.update', $movie->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <label for="">Judul</label>
                                <input type="text" name="judul"
                                    class="form-control @error('judul') is-invalid @enderror" id=""
                                    placeholder="Masukkan Judul Film" value="{{ $movie->judul }}">
                                @error('judul')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Sinopsis</label>
                                <textarea type="text" name="sinopsis" class="form-control @error('sinopsis') is-invalid @enderror" id="default"
                                    placeholder="Tuliskan Sinopsis Film" rows="10">{{ $movie->sinopsis }}</textarea>
                                @error('sinopsis')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="d-block">Cover</label>
                                <div class="col-sm-6 col-md-6 col-lg-4">
                                    @if (isset($movie) && $movie->cover)
                                        <img src="{{ asset('images/movies/' . $movie->cover) }}"
                                            class="img-rounded rounded-3 img-responsive mb-2 w-100" alt="">
                                    @endif
                                </div>
                                <input type="file" name="cover"
                                    class="form-control @error('cover') is-invalid @enderror" id="">
                                @error('cover')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="d-block">Background</label>
                                <div class="col-md-10 col-lg-8">
                                    @if (isset($movie) && $movie->background)
                                        <img src="{{ asset('images/movies/' . $movie->background) }}"
                                            class="img-rounded rounded-3 img-responsive mb-2 w-100" alt="">
                                    @endif
                                </div>
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
                                <select name="genre[]" class="@error('genre') is-invalid @enderror" id="input-tags" multiple>
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
                                    class="form-control @error('id_tahun_rilis') is-invalid @enderror" id="">
                                    <option>-- Pilih Tahun Rilis --</option>
                                    @foreach ($tahun as $data)
                                        <option value="{{ $data->id }}"
                                            {{ $data->id == $movie->id_tahun_rilis ? 'selected' : '' }}>
                                            {{ $data->tahun }}</option>
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
                                <select name="casting[]" class="form-control @error('casting') is-invalid @enderror"
                                    id="input-tags" multiple="multiple">
                                    @foreach ($casting as $casting)
                                        {{-- <option value="{{ $casting->id }}"
                                            {{ in_array($casting->id, array_values($selectCast)) == $casting->id ? 'selected' : '' }}>
                                            {{ $casting->nama }}</option> --}}
                                        <option value="{{ $casting->id }}"
                                            @foreach ($movie->casting as $cast) @if ($casting->id == $cast->id) selected @endif @endforeach>
                                            {{ $casting->nama }}</option>
                                    @endforeach
                                </select>
                                @error('casting')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Durasi Film</label>
                                <div class="input-group mb-3">
                                    <input type="number" min="0" name="durasi"
                                        class="form-control @error('durasi') is-invalid @enderror" id=""
                                        value="{{ $movie->durasi }}">
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
                                    Edit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
