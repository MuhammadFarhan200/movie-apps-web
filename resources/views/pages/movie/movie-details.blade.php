@extends('layouts.front')

@section('page-title', 'Detail Movie')
@section('page-content')
    <!-- breadcrumb area start -->
    {{-- <section class="breadcrumb-area background-movie">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-area-content">
                        <h1>Movie Detalied Page</h1>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- breadcrumb area end -->

    <section>
        <img src="{{ asset('images/movies/' . $movie->background) }}" alt="" class="background-movie">
    </section>

    <div class="movie-bg-shadow"></div>

    <!-- transformers area start -->
    <section class="transformers-area mb-5">
        <div class="container" style="margin-top: -170px; z-index: 2 !important;">
            <div class="transformers-box">
                <div class="row flexbox-center">
                    <div class="col-lg-5 text-lg-left text-center">
                        <div class="transformers-content p-3">
                            <img src="{{ asset('images/movies/' . $movie->cover) }}" alt="Cover {{ $movie->judul }}" />
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="transformers-content">
                            <h2 class="mt-lg-0">{{ $movie->judul }}</h2>
                            <p></p>
                            <ul>
                                <li>
                                    <div class="transformers-left">
                                        Genre:
                                    </div>
                                    <div class="transformers-right">
                                        <a href="#" class="link">{{ $movie->genreFilm->kategori }}</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="transformers-left">
                                        Tahun Rilis:
                                    </div>
                                    <div class="transformers-right">
                                        <a href="#" class="link">{{ $movie->tahunRilis->tahun }}</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="transformers-left">
                                        Durasi:
                                    </div>
                                    <div class="transformers-right">
                                        {{ $movie->durasi }} Menit
                                    </div>
                                </li>
                                <li>
                                    <div class="transformers-left">
                                        Sinopsis:
                                    </div>
                                    <div class="transformers-right">
                                        {{ $movie->sinopsis }}
                                    </div>
                                </li>
                                <li>
                                    <div class="transformers-left">
                                        Main Cast:
                                    </div>
                                    <div class="transformers-right">
                                        <ul>
                                            @foreach ($movie->casting as $casting)
                                                <li class="m-0">
                                                    <a href="#" class="link">- {{ $casting->nama }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </li>
                                {{-- <li>
                                    <div class="transformers-left">
                                        Share:
                                    </div>
                                    <div class="transformers-right">
                                        <a href="#"><i class="icofont icofont-social-facebook"></i></a>
                                        <a href="#"><i class="icofont icofont-social-twitter"></i></a>
                                        <a href="#"><i class="icofont icofont-social-google-plus"></i></a>
                                        <a href="#"><i class="icofont icofont-youtube-play"></i></a>
                                    </div>
                                </li> --}}
                            </ul>
                        </div>
                    </div>
                </div>
                <a href="{{ route('guest_home') }}" class="theme-btn py-2" style="border-bottom-right-radius: .3rem">Kembali
                    <i class="icofont icofont-arrow-right"></i></a>
            </div>
        </div>
    </section>
    <!-- transformers area end -->

    <!-- details area start -->
    {{-- <section class="details-area">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="details-content">
                        <div class="details-overview">
                            <h2>Sinopsis</h2>
                            <p>{{ $movie->sinopsis }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section> --}}
    <!-- details area end -->
@endsection
