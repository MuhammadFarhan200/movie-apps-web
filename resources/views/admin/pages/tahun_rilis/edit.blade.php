{{-- @extends('admin.layouts.main')

@section('title-page', 'Edit Data')
@section('page-heading')
    <h2>Tahun Rilis</h2>
    <p>Edit <b>tahun rilis</b> dengan mengubah tahun pada forum dibawah!</p>
@endsection

@section('page-content')
    <div class="row mb-5">
        <div class="col-md-6 mx-auto">
            <div class="card shadow">
                <div class="card-header">
                    <h3>Edit Tahun Rilis</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('tahun-rilis.update', $tahun_rilis->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="d-grid">
                            <label for="tahun" class="fs-5 font-bold">Tahun Rilis</label>
                            <input type="number" class="form-control form-control-lg" name="tahun" id="tahun"
                                value="{{ $tahun_rilis->tahun }}" placeholder="Masukkan Tahun Rilis">
                            <div class="d-flex justify-content-end align-items-center mt-4">
                                <a href="{{ route('tahun-rilis.index') }}" class="btn btn-danger m-3 text-end">Batal</a>
                                <button class="btn btn-primary my-0" type="submit">Edit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection --}}

<div class="modal fade" id="editTahunRilis-{{ $tahun->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('tahun-rilis.update', $tahun->id) }}" method="post">
            @csrf
            @method('put')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Tahun Rilis</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Tahun Rilis</label>
                        <input type="number" class="form-control" name="tahun" id="tahun"
                            value="{{ $tahun->tahun }}" required>
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
