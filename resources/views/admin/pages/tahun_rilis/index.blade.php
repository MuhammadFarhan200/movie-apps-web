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
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTahunRilis">
                        <i class="bi bi-plus-circle me-1"></i>
                        Tambah
                    </button>
                    @include('admin.pages.tahun_rilis.create')
                </div>
                <div class="card-body m-0">
                    <div class="table-responsive p-2">
                        <table class="table table-bordered table-hover text-center" id="dataTable">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Tahun Rilis</th>
                                    <th class="text-center">Jumlah Film</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($tahun_rilis as $tahun)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $tahun->tahun }}</td>
                                        <td>{{ $tahun->movie->count() }}</td>
                                        <td class="text-nowrap">
                                            <button type="button" class="btn btn-sm btn-success mx-1"
                                                data-bs-toggle="modal" data-bs-target="#editTahunRilis-{{ $tahun->id }}">
                                                <i class="bi bi-pencil-square"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-warning mx-1"
                                                data-bs-toggle="modal" data-bs-target="#showTahunRilis-{{ $tahun->id }}">
                                                <i class="bi bi-eye-fill"></i>
                                            </button>
                                            <form id="data-{{ $tahun->id }}"
                                                action="{{ route('tahun-rilis.destroy', $tahun->id) }}" method="post"
                                                class="d-inline">
                                                @csrf
                                                @method('delete')
                                            </form>
                                            <button class="btn btn-danger btn-sm mx-1" type="submit"
                                                onclick="event.preventDefault(); confirmDelete({{ $tahun->id }})">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @include('admin.pages.tahun_rilis.edit')
                                    @include('admin.pages.tahun_rilis.show')
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('myScript')
    <script>
        function confirmDelete(id) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: true
            })

            swalWithBootstrapButtons.fire({
                title: 'Anda Yakin Akan Menghapus Data Ini?',
                icon: 'warning',
                showCancelButton: true,
                allowOutsideClick: false,
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((wilDelete) => {
                if (wilDelete.isConfirmed) {
                    $('#data-' + id).submit();
                }
            })
        }
    </script>
@endsection
