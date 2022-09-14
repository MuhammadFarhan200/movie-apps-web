{{-- @extends('admin.layouts.main')

@section('title-page', 'Show Data')
@section('page-heading')
    <h2>Durasi Film</h2>
    <p>Berikut salah satu data <b>durasi film</b></p>
@endsection

@section('page-content')
    <div class="row mb-5">
        <div class="col-md-6 mx-auto">
            <div class="card shadow">
                <div class="card-header">
                    <h3>Data Durasi Film</h3>
                </div>
                <div class="card-body">
                    <table class="fs-5">
                        <thead>
                            <tr>
                                <th>Durasi Film</th>
                                <td class="px-3">:</td>
                                <td>{{ $durasi_film->durasi }} Menit</td>
                            </tr>
                        </thead>
                    </table>
                    <div class="d-grid">
                        <a href="{{ route('durasi-film.index') }}" class="btn btn-primary mt-4 ms-auto text-end">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection --}}


<div class="modal fade" id="showDurasiFilm-{{ $durasi->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Show Durasi Film</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Durasi</label>
                    <input type="text" class="form-control" name="durasi" value="{{ $durasi->durasi }}"
                        id="" readonly>
                </div>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
