@extends('admin.layouts.main')
@section('title-page', 'Data Movie')

@section('page-heading')
    <h2>Reviewer Movie</h2>
    <p>Lihat salah satu data <b>Reviewer</b> pada table dibawah</p>
@endsection

@section('page-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="font-bold text-center m-0">Data Reviewer Movie</h3>
                    </div>

                    <div class="card-body m-0">
                        <div class="table-responsive p-2">
                            <table class="table">
                                <tr>
                                    <th>Nama</th>
                                    <td>:</td>
                                    <td>{{ $review->nama }}</td>
                                </tr>
                                <tr>
                                    <th>Foto</th>
                                    <td>:</td>
                                    <td>
                                        @if ($review->foto == null)
                                            Reviewer Tidak Memasang Foto
                                        @else
                                            {{ $review->foto }}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>:</td>
                                    <td>{{ $review->email }}</td>
                                </tr>
                                <tr>
                                    <th>Movie yang direview</th>
                                    <td>:</td>
                                    <td>{{ $review->movie->judul }}</td>
                                </tr>
                                <tr>
                                    <th>Komentar</th>
                                    <td>:</td>
                                    <td>{{ $review->komentar }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="d-flex justify-content-end align-items-center mt-4">
                            <a href="{{ route('reviewer.index') }}" class="btn btn-primary px-3">
                                Kembali
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
