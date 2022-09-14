{{-- @extends('admin.layouts.main')

@section('title-page', 'Edit Data')
@section('page-heading')
    <h2>Durasi Film</h2>
    <p>Edit <b>durasi film</b> dengan mengubah tahun pada forum dibawah!</p>
@endsection

@section('page-content')
    <div class="row mb-5">
        <div class="col-md-6 mx-auto">
            <div class="card shadow">
                <div class="card-header">
                    <h3>Edit Durasi Film</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('durasi-film.update', $durasi_film->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="d-grid">
                            <label for="durasi" class="fs-5 font-bold">Durasi Film</label>
                            <input type="number" class="form-control form-control-lg" name="durasi" id="durasi"
                                value="{{ $durasi_film->durasi }}" placeholder="Masukkan Durasi Film">
                            <div class="d-flex justify-content-end align-items-center mt-4">
                                <a href="{{ route('durasi-film.index') }}" class="btn btn-danger m-3 text-end">Batal</a>
                                <button class="btn btn-primary my-0" type="submit">Edit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection --}}

<div class="modal fade" id="editDurasiFilm-{{ $durasi->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('durasi-film.update', $durasi->id) }}" method="post">
            @csrf
            @method('put')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Genre Film</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Durasi</label>
                        <input type="number" class="form-control @error('durasi') is-invalid @enderror" name="durasi"
                            id="durasi" value="{{ $durasi->durasi }}" required autofocus>
                        @error('durasi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
