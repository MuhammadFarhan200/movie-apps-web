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
                    <a href="{{ route('movie.index') }}" class="fs-4 text-body">
                        <i class="bi bi-chevron-left"></i>
                    </a>
                    <h3 class="mt-4">
                        Detail Movie
                    </h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="" class="fw-bold">Judul Film</label>
                            <div class="mb-3">
                                <input type="text" class="form-control" value="{{ $movie->judul }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="" class="fw-bold">Durasi</label>
                            <div class="mb-3 input-group">
                                <input type="number" class="form-control" value="{{ $movie->durasi }}" readonly>
                                <div class="input-group-text">
                                    <label for="">Menit</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="" class="fw-bold">Tahun Rilis</label>
                                <input type="number" class="form-control" value="{{ $movie->tahunRilis->tahun }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="" class="fw-bold">Genre Film</label>
                                <div class="d-flex justify-content-start align-items-center flex-wrap m-0 pt-2">
                                    @foreach ($movie->genreFilm->sortBy('kategori') as $genre)
                                        <div
                                            class="px-3 py-2 rounded-2 shadow-sm border border-dark mx-1 mb-2 cast-hover"
                                            target="_blank">
                                            <label for="" class="text-body ms-1">{{ $genre->kategori }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="" class="fw-bold">Sinopsis</label>
                            <div class="border rounded py-2 px-3">{!! $movie->sinopsis !!}</div>
                        </div>
                    </div>
                    <div class="row g-3 gallery mb-3" data-bs-toggle="modal" data-bs-target="#imageModal">
                        <div class="col-sm-8 col-md-4">
                            <label for="" class="fw-bold">Cover</label>
                            <a href="#" class="image-modal d-block">
                                <img src="{{ asset('images/movies/' . $movie->cover) }}" alt="Cover {{ $movie->judul }}"
                                    class="img-responsive rounded-3 cover-background" data-bs-target="#MovieCarousel"
                                    data-bs-slide-to="0">
                            </a>
                        </div>
                        <div class="col-md-8">
                            <label for="" class="fw-bold">Background</label>
                            <a href="#" class="image-modal d-block">
                                <img src="{{ asset('images/movies/' . $movie->background) }}"
                                    alt="Background {{ $movie->judul }}" class="img-resposive rounded-3 cover-background"
                                    data-bs-target="#MovieCarousel" data-bs-slide-to="1">
                            </a>
                        </div>
                    </div>
                    <div class="row g-3">
                        <label for="" class="fw-bold">Cast Film</label>
                        <div class="d-flex justify-content-start align-items-center flex-wrap m-0 pt-2">
                            @foreach ($movie->casting->sortBy('nama') as $casting)
                                <a href="{{ route('casting.show', $casting->id) }}"
                                    class="px-3 py-2 rounded-2 shadow-sm border border-dark mx-1 mb-2 cast-hover"
                                    target="_blank">
                                    <img src="{{ asset('images/casting/' . $casting->foto) }}" alt="{{ $casting->nama }}"
                                        class="img-rounded rounded-3"
                                        style="width: 50px; height: 50px; object-fit: cover; object-position: center top">
                                    <label for="" class="text-body ms-1">{{ $casting->nama }}</label>
                                </a>
                            @endforeach
                        </div>
                    </div>
                    <div class="d-flex justify-content-end align-items-center mt-4">
                        <a href="{{ route('movie.index') }}" class="btn btn-primary px-3">
                            Kembali
                            <i class="bi bi-chevron-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-fullscreen-lg-down modal-dialog-scrollable"
            role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        {{ $movie->judul }}
                    </h5>
                    <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>

                <div class="modal-body">
                    <div id="MovieCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#MovieCarousel" data-bs-slide-to="0" class="active"
                                aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#MovieCarousel" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100 mx-auto" src="{{ asset('images/movies/' . $movie->cover) }}"
                                    alt="Cover {{ $movie->judul }}">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{ asset('images/movies/' . $movie->background) }}">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#MovieCarousel" role="button" type="button"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        </a>
                        <a class="carousel-control-next" href="#MovieCarousel" role="button" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        </a>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    @endsection
