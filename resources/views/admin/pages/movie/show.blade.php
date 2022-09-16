@extends('admin.layouts.main')

@section('title-page', 'Data Movie')
@section('page-heading')
    <h3>Movie</h3>
    <p>Berikut salah satu data <b>Movie</b></p>
@endsection

@section('page-content')
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="card shadow">
                <div class="card-header">
                    <h3>Data Movie</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-borderless">
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
                                                class="img-rounded rounded-3 img-responsive" style="width: 300px;"
                                                alt="">
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Cast Film</th>
                                    <td>:</td>
                                    <td>
                                        <ol style="margin: 0;">
                                            @foreach ($movie->casting as $item)
                                                <li> {{ $item->nama }}</li>
                                            @endforeach
                                        </ol>
                                    </td>
                                </tr>
                            </thead>
                        </table>
                        <div class="d-flex justify-content-end align-items-center mt-4">
                            <a href="{{ route('movie.index') }}" class="btn btn-primary px-3 m-2">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
