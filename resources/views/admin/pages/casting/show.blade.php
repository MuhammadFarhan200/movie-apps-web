@extends('admin.layouts.main')

@section('title-page', 'Show Data')
@section('page-heading')
    <h2>Casting Film</h2>
    <p>Berikut salah satu data <b>casting film</b></p>
@endsection

@section('page-content')
    <div class="row mb-5">
        <div class="col-md-10 mx-auto">
            <div class="card shadow">
                <div class="card-header">
                    <h3>Data Casting Film</h3>
                </div>
                <div class="card-body">
                    <table class="fs-5">
                        <tbody>
                            <tr>
                                <th>Nama</th>
                                <td class="px-3">:</td>
                                <td>{{ $casting->nama }}</td>
                            </tr>
                            <tr>
                                <th>Foto</th>
                                <td class="px-3">:</td>
                                <td>
                                    <img src="{{ asset('images/casting/' . $casting->foto) }}"
                                    class="img-rounded rounded-3 img-responsive" style="width: 175px;" alt="{{ $casting->nama }}">
                                </td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td class="px-3">:</td>
                                <td>{{ $casting->jenis_kelamin }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Lahir</th>
                                <td class="px-3">:</td>
                                <td>{{ $casting->tanggal_lahir }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="d-grid">
                        <a href="{{ route('casting.index') }}" class="btn btn-primary mt-4 ms-auto text-end">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
