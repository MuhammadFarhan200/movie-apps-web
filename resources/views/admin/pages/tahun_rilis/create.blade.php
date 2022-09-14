{{-- @extends('admin.layouts.main')

@section('title-page', 'Create Data')
@section('page-heading')
    <h2>Data Tahun Rilis</h2>
    <p>Tambah data <b>tahun rilis</b> dengan memasukkan tahun pada forum dibawah!</p>
@endsection

@section('page-content')
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card shadow mb-5">
                <div class="card-header">
                    <h3>Tambah Data</h3>
                </div>
                <div class="card-body px-4">
                    <form action="{{ route('tahun-rilis.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="tahun" class="form-label font-bold fs-5">Tahun Rilis</label>
                            <input type="number" name="tahun" id="tahun"
                                class="form-control form-control-lg @error('tahun') is-invalid @enderror" autocomplete="off"
                                placeholder="Masukkan Tahun Rilis" value="{{ old('tahun') }}">
                            @error('tahun')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('tahun-rilis.index') }}" class="btn btn-danger me-3">Batal</a>
                            <button class="btn btn-primary" type="submit">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection --}}

<div class="modal fade" id="addTahunRilis" tabindex="-1" aria-label="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('tahun-rilis.store') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Tambah Tahun Rilis
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Tahun Rilis</label>
                        <input type="number" name="tahun" id="tahun"
                            class="form-control @error('tahun') is-invalid @enderror" value="{{ old('tahun') }}"
                            required>
                        @error('tahun')
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
