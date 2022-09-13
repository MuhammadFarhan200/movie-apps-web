@extends('admin.layouts.main')

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
@endsection
