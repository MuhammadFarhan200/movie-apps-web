@extends('admin.layouts.main')
@section('title-page', 'Data Movie')

@section('page-heading')
    <h2>Movie</h2>
    <p>Lihat data <b>{{ $data_title }}</b> pada table dibawah</p>
@endsection

@section('page-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="font-bold text-center m-0">Data Movie</h3>
                        <a href="{{ route('movie.create') }}" class="btn btn-primary" style="float:right">
                            <i class="bi bi-plus-circle me-1"></i>
                            Tambah
                        </a>
                    </div>

                    <div class="card-body m-0">
                        <div class="table-responsive p-2">
                            <table class="table table-bordered table-hover text-center" id="dataTable">
                                <thead>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Judul</th>
                                    <th class="text-center">Genre</th>
                                    <th class="text-center">Tahun Rilis</th>
                                    <th class="text-center">Aksi</th>
                                </thead>
                                <tbody>
                                    @php $no =1; @endphp
                                    @foreach ($movies as $movie)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $movie->judul }}</td>
                                            <td>{{ $movie->genreFilm->kategori }}</td>
                                            <td>{{ $movie->tahunRilis->tahun }}</td>
                                            <td class="text-nowrap">
                                                <a href="{{ route('movie.edit', $movie->id) }}"
                                                    class="btn btn-sm mx-1 btn-success">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                <a href="{{ route('movie.show', $movie->id) }}"
                                                    class="btn btn-sm mx-1 btn-warning">
                                                    <i class="bi bi-eye-fill"></i>
                                                </a>
                                                <form action="{{ route('movie.destroy', $movie->id) }}" method="post"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-sm mx-1 btn-danger"
                                                        onclick="return confirm('apakah anda yakin?')">
                                                        <i class="bi bi-trash-fill"></i>
                                                    </button>
                                                </form>
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
    </div>
@endsection
