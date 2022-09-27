@extends('admin.layouts.main')

@section('title-page', 'Show Movie')
@section('page-heading')
    <h3>Movie</h3>
    <p>Berikut salah satu data <b>Movie</b></p>
@endsection

@section('page-content')
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="card shadow">
                <div class="card-header">
                    <a href="{{ route('movie.index') }}" class="fs-4">
                        <i class="bi bi-chevron-left"></i>
                    </a>
                    <h3 class="mt-4">
                        Detail Movie
                    </h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        {{-- <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th>Judul</th>
                                    <td>:</td>
                                    <td>{{ $movie->judul }}</td>
                                </tr>
                                <tr>
                                    <th>Sinopsis</th>
                                    <td>:</td>
                                    <td>{{ $movie->sinopsis }}</td>
                                </tr>
                                <tr>
                                    <th>Durasi Film</th>
                                    <td>:</td>
                                    <td>{{ $movie->durasi }} Menit</td>
                                </tr>
                                <tr>
                                    <th>Genre Film</th>
                                    <td>:</td>
                                    <td>{{ $movie->genreFilm->kategori }}</td>
                                </tr>
                                <tr>
                                    <th>Tahun Rilis</th>
                                    <td>:</td>
                                    <td>{{ $movie->TahunRilis->tahun }}</td>
                                </tr>
                                <tr>
                                    <th>Cover</th>
                                    <td></td>
                                    <th>Background</th>
                                </tr>
                                <tr>
                                    <td>
                                        <p>
                                            <img src="{{ asset('images/movies/' . $movie->cover) }}"
                                                class="img-rounded rounded-3 img-responsive" style="width: 175px;"
                                                alt="">
                                        </p>
                                    </td>
                                    <td></td>
                                    <td class="d-flex align-items-stretch">
                                        <p>
                                            <img src="{{ asset('images/movies/' . $movie->background) }}"
                                                class="img-rounded rounded-3 img-responsive" style="width: 350px;"
                                                alt="">
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Cast Film</th>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <ul style="margin: 0;">
                                        <ul class="list-group col-md-8">
                                            @foreach ($movie->casting as $item)
                                                <li class="list-group-item"> {{ $item->nama }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                </tr>
                            </thead>
                        </table> --}}
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="" class="fw-bold">Judul Film</label>
                            <div class="mb-3">
                                <input type="text" class="form-control" value="{{ $movie->judul }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="" class="fw-bold">Durasi</label>
                            <div class="mb-3 input-group">
                                <input type="number" class="form-control" value="{{ $movie->durasi }}" readonly>
                                <div class="input-group-text">
                                    <label for="">Menit</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="" class="fw-bold">Sinopsis</label>
                            <textarea name="" id="" cols="30" rows="6" class="form-control" readonly>{{ $movie->sinopsis }}</textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="" class="fw-bold">Genre Film</label>
                                <input type="text" class="form-control" value="{{ $movie->genreFilm->kategori }}"
                                    readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="" class="fw-bold">Tahun Rilis</label>
                                <input type="number" class="form-control" value="{{ $movie->tahunRilis->tahun }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="" class="fw-bold">Cover</label>
                            <p>
                                <img src="{{ asset('images/movies/' . $movie->cover) }}" alt="Cover {{ $movie->judul }}"
                                    class="img-responsive rounded-3 cover-background">
                            </p>
                        </div>
                        <div class="col-md-8">
                            <label for="" class="fw-bold">Background</label>
                            <p>
                                <img src="{{ asset('images/movies/' . $movie->background) }}"
                                    alt="Background {{ $movie->judul }}" class="img-resposive rounded-3 cover-background">
                            </p>
                        </div>
                    </div>
                    <div class="row g-3">
                        <label for="" class="fw-bold">Cast Film</label>
                        <div class="d-flex justify-content-start align-items-center flex-wrap m-0 pt-2">
                            @foreach ($movie->casting as $item)
                                <a href="../casting/{{ $item->id }}"
                                    class="p-3 rounded-2 shadow-sm border border-dark mx-1 mb-2 cast-hover">
                                    <label for="" class="text-body">{{ $item->nama }}</label>
                                </a>
                            @endforeach
                        </div>
                    </div>
                    <div class="d-flex justify-content-end align-items-center mt-4">
                        <a href="{{ route('movie.index') }}" class="btn btn-primary px-3 m-2">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
