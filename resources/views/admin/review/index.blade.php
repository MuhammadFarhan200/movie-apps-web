@extends('admin.layouts.main')
@section('title-page', 'Data Review')

@section('page-heading')
    <h2>Review Movie</h2>
    <p>Lihat data <b>{{ $data_title }}</b> pada table dibawah</p>
@endsection

@section('page-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="font-bold text-center m-0">Data Review Movie</h3>
                    </div>

                    <div class="card-body m-0">
                        <div class="table-responsive p-2">
                            <table class="table table-bordered table-hover text-center" id="dataTable">
                                <thead>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Foto</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Aksi</th>
                                </thead>
                                <tbody>
                                    @php $no =1; @endphp
                                    @foreach ($review as $rev)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $rev->nama }}</td>
                                            <td>
                                                @if ($rev->foto == null)
                                                    Tidak ada foto
                                                @else
                                                    {{ $rev->foto }}
                                                @endif
                                            </td>
                                            <td>{{ $rev->email }}</td>
                                            <td class="text-nowrap">
                                                <a href="{{ route('reviewer.show', $rev->id) }}"
                                                    class="btn btn-sm mx-1 btn-warning">
                                                    <i class="bi bi-eye-fill"></i>
                                                </a>
                                                <form id="data-{{ $rev->id }}"
                                                    action="{{ route('reviewer.destroy', $rev->id) }}" method="post"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                </form>
                                                <button type="submit" class="btn btn-sm mx-1 btn-danger"
                                                    onclick="confirmDelete({{ $rev->id }})">
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
