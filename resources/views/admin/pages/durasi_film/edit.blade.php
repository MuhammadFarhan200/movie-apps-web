@extends('admin.layouts.main')

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
@endsection
