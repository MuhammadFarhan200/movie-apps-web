@extends('admin.layouts.main')
@section('title-page', 'Data Durasi Film')

@section('page-heading')
    <h2>Durasi Film</h2>
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
                    <h3 class="font-bold text-center m-0">Data Durasi Film</h3>
                    <a href="{{ route('durasi-film.create') }}" class="btn btn-primary">
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
                                    <th class="text-center">Durasi Film</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($durasi_film as $index => $durasi)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $durasi->durasi }} Menit</td>
                                        <td>--</td>
                                        {{-- <td class="text-nowrap">
                                            <a href="{{ route('durasi-film.edit', $durasi->id) }}"
                                                class="btn btn-sm btn-success">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <a href="{{ route('durasi-film.show', $durasi->id) }}"
                                                class="btn btn-sm btn-warning mx-1">
                                                <i class="bi bi-eye-fill"></i>
                                            </a>
                                            <form action="{{ route('durasi-film.destroy', $durasi->id) }}" method="post"
                                                class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger btn-sm" type="submit"
                                                    onclick="return confirm('Apakah anda yakin?')">
                                                    <i class="bi bi-trash-fill"></i>
                                                </button>
                                            </form>
                                        </td> --}}
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
