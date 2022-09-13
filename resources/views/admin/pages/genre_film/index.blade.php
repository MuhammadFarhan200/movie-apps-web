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
                    <a href="#" class="btn btn-primary">
                        <i class="bi bi-plus-circle me-1"></i>
                        Tambah
                    </a>
                </div>
                <div class="card-body m-0">
                    <div class="table-responsive p-2">
                        <table class="table table-bordered text-center" id="dataTable">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Genre Film</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($genre_film as $index => $genre)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $genre->kategori }}</td>
                                        <td class="text-nowrap"> --
                                            {{-- <a href="{{ route('genre-film.edit', $genre->id) }}"
                                                class="btn btn-sm btn-success">
                                                <i class="bi bi-pencil-square"></i>
                                            </a> --}}
                                            {{-- <a href="{{ route('genre-film.show', $genre->id) }}"
                                                class="btn btn-sm btn-warning mx-1">
                                                <i class="bi bi-eye-fill"></i>
                                            </a> --}}
                                            {{-- <form action="{{ route('genre-film.destroy', $genre->id) }}" method="post"
                                                class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger btn-sm" type="submit"
                                                    onclick="return confirm('Apakah anda yakin?')">
                                                    <i class="bi bi-trash-fill"></i>
                                                </button>
                                            </form> --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
