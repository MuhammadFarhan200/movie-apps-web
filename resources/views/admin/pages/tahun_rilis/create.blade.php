@extends('admin.layouts.main')

@section('title-page', 'Create Data')
@section('page-heading')
    <h2>Data Tahun Rilis</h2>
    <p>Tambah data <b>tahun rilis</b> dengan memasukkan tahun pada forum dibawah!</p>
@endsection

@section('page-content')
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card shadow">
                <div class="card-header">
                    <h3>Tambah Data</h3>
                </div>
                <div class="card-body px-4">
                    <form action="{{ route('tahun.store') }}" method="POST">
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
                            <a href="{{ route('tahun.index') }}" class="btn btn-danger shadow me-3">Batal</a>
                            <button class="btn btn-primary shadow" type="submit">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
