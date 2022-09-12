@extends('admin.layouts.main')

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
                    <form action="{{ route('tahun.update', $tahun_rilis->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="d-grid">
                            <label for="tahun" class="fs-5 font-bold">Tahun Rilis</label>
                            <input type="number" class="form-control form-control-lg" name="tahun" id="tahun"
                                value="{{ $tahun_rilis->tahun }}" placeholder="Masukkan Tahun Rilis">
                            <div class="d-flex justify-content-end align-items-center mt-4">
                                <a href="{{ route('tahun.index') }}" class="btn btn-danger m-3 text-end shadow">Batal</a>
                                <button class="btn btn-primary shadow my-0" type="submit">Edit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
