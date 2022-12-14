@extends('admin.layouts.main')

@section('title-page', 'Data Cast Film')
@section('page-heading')
    <h2>Cast Film</h2>
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
                    <h3 class="font-bold text-center m-0">Data Cast Film</h3>
                    <a href="{{ route('casting.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-circle me-1"></i>
                        Tambah
                    </a>
                </div>
                <div class="card-body m-0">
                    <div class="table-responsive p-2">
                        <table class="table table-bordered table-hover text-center" id="dataTable">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Jenis Kelamin</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($castings as $casting)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $casting->nama }}</td>
                                        <td>{{ $casting->jenis_kelamin }}</td>
                                        <td class="text-nowrap">
                                            <a href="{{ route('casting.edit', $casting->id) }}"
                                                class="btn btn-success btn-sm mx-1">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <a href="{{ route('casting.show', $casting->id) }}"
                                                class="btn btn-warning btn-sm mx-1">
                                                <i class="bi bi-eye-fill"></i>
                                            </a>
                                            <form id="data-{{ $casting->id }}"
                                                action="{{ route('casting.destroy', $casting->id) }}" method="post"
                                                class="d-inline">
                                                @csrf
                                                @method('delete')
                                            </form>
                                            <button class="btn btn-danger btn-sm mx-1" type="submit"
                                                onclick="event.preventDefault(); confirmDelete({{ $casting->id }})">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>
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
