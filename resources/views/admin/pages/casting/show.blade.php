@extends('admin.layouts.main')

@section('title-page', 'Show Cast')
@section('page-heading')
    <h2>Cast Film</h2>
    <p>Berikut salah satu data <b>cast film</b></p>
@endsection

@section('page-content')
    <div class="row mb-5">
        <div class="col-md-10 mx-auto">
            <div class="card shadow">
                <div class="card-header">
                    <h3>Data Cast Film</h3>
                </div>
                <div class="card-body">
                    <table cellpadding="5">
                        <tbody>
                            <tr>
                                <th>Nama</th>
                                <td class="px-3">:</td>
                                <td>{{ $casting->nama }}</td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td class="px-3">:</td>
                                <td>{{ $casting->jenis_kelamin }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Lahir</th>
                                <td class="px-3">:</td>
                                <td>
                                    {{-- {{ date('d, M Y', strtotime($casting->tanggal_lahir)) }} --}}
                                    {{ \Carbon\Carbon::parse($casting->tanggal_lahir)->format('d M, Y') }}
                                </td>
                            </tr>
                            <tr>
                                <th>Foto</th>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <img src="{{ asset('images/casting/' . $casting->foto) }}"
                                        class="img-rounded rounded-3 img-responsive" style="width: 250px;"
                                        alt="{{ $casting->nama }}">
                                </td>
                            </tr>
                            <tr>
                                <th class="pt-3">Film dengan Cast "{{ $casting->nama }}"</th>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <div class="d-flex justify-content-start align-items-center flex-wrap m-0">
                                        @if ($casting->movie->count() < 1)
                                            Belum ditambahakan
                                        @else
                                            @foreach ($casting->movie as $movie)
                                                <a href="{{ route('movie.show', $movie->id) }}"
                                                    class="p-3 rounded-2 shadow-sm border border-dark mx-1 mb-2 cast-hover text-body"
                                                    target="_blank">
                                                    {{ $movie->judul }}
                                                </a>
                                            @endforeach
                                        @endif
                                    </div>
                                </td>
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
