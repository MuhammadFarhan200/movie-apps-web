@extends('admin.layouts.main')
@section('title-page', 'Data Tahun Rilis')

@section('page-heading')
    <h2>Tahun Rilis</h2>
    <p>Lihat data <b>{{ $data_title }}</b> pada table dibawah</p>
@endsection

@section('page-content')
    <div class="row">
        <div class="col">
            {{-- @include('admin.partials.flash') --}}
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="font-bold text-center m-0">Data Tahun Rilis</h3>
                    <a href="{{ route('tahun-rilis.create') }}" class="btn btn-primary">
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
                                    <th class="text-center">Tahun Rilis</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tahun_rilis as $index => $tahun)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $tahun->tahun }}</td>
                                        <td class="text-nowrap">
                                            <a href="{{ route('tahun-rilis.edit', $tahun->id) }}"
                                                class="btn btn-sm btn-success">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <a href="{{ route('tahun-rilis.show', $tahun->id) }}"
                                                class="btn btn-sm btn-warning mx-1">
                                                <i class="bi bi-eye-fill"></i>
                                            </a>
                                            <form action="{{ route('tahun-rilis.destroy', $tahun->id) }}" method="post"
                                                class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger btn-sm" type="submit"
                                                    onclick="return confirm('Apakah anda yakin?')">
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
@endsection
