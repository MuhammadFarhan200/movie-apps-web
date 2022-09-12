@extends('admin.layouts.main')

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
@endsection
