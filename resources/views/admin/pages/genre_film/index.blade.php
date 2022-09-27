@extends('admin.layouts.main')
@section('title-page', 'Data Genre Film')

@section('page-heading')
    <h2>Genre Film</h2>
    <p>Lihat data <b>{{ $data_title }}</b> pada table dibawah</p>
@endsection

@section('page-content')
    <div class="row">
        <div class="col">
            @include('admin.partials.flash')
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="font-bold text-center m-0">Data Genre Film</h3>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addGenreFilm">
                        <i class="bi bi-plus-circle me-1"></i>
                        Tambah
                    </button>
                    @include('admin.pages.genre_film.create')
                </div>
                <div class="card-body m-0">
                    <div class="table-responsive p-2">
                        <table class="table table-bordered table-hover text-center" id="dataTable">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Genre Film</th>
                                    <th class="text-center">Jumlah Film</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($genre_film as $genre)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $genre->kategori }}</td>
                                        <td>{{ $genre->movie->count() }}</td>
                                        <td class="text-nowrap">
                                            <form action="{{ route('genre-film.destroy', $genre->id) }}" method="post"
                                                class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button type="button" class="btn btn-sm btn-success mx-1"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#editGenreFilm-{{ $genre->id }}">
                                                    <i class="bi bi-pencil-square"></i>
                                                </button>
                                                <button type="button" class="btn btn-sm btn-warning mx-1"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#showGenreFilm-{{ $genre->id }}">
                                                    <i class="bi bi-eye-fill"></i>
                                                </button>
                                                <button class="btn btn-danger btn-sm mx-1" type="submit"
                                                    onclick="return confirm('Apakah anda yakin?')">
                                                    <i class="bi bi-trash-fill"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>

                                    @include('admin.pages.genre_film.edit')
                                    @include('admin.pages.genre_film.show')
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
