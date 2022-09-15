{{-- @extends('admin.layouts.main')

@section('title-page', 'Show Data')
@section('page-heading')
    <h2>Tahun Rilis</h2>
    <p>Berikut salah satu data <b>tahun rilis</b></p>
@endsection

@section('page-content')
    <div class="row mb-5">
        <div class="col-md-6 mx-auto">
            <div class="card shadow">
                <div class="card-header">
                    <h3>Data Tahun Rilis</h3>
                </div>
                <div class="card-body">
                    <table class="fs-5">
                        <thead>
                            <tr>
                                <th>Tahun Rilis</th>
                                <td class="px-3">:</td>
                                <td>{{ $tahun_rilis->tahun }}</td>
                            </tr>
                        </thead>
                    </table>
                    <div class="d-grid">
                        <a href="{{ route('tahun-rilis.index') }}" class="btn btn-primary mt-4 ms-auto text-end">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection --}}

<div class="modal fade" id="showTahunRilis-{{ $tahun->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Show Tahun Rilis</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Kategori</label>
                    <input type="text" class="form-control mb-3" name="kategori" value="{{ $tahun->tahun }}"
                        id="" readonly>
                    <label for="">Jumlah Film ditahun {{ $tahun->tahun }}</label>
                    <input type="number" class="form-control" name="kategori" value="{{ $tahun->movie->count() }}"
                        id="" readonly>
                </div>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
