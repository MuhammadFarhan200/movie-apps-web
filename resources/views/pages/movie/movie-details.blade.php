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

    {{-- Background Movie --}}
    <section>
        <img src="{{ asset('images/movies/' . $movie->background) }}" alt="" class="background-movie">
    </section>
    {{-- End Background Movie --}}

    <div class="movie-bg-shadow"></div>

    <!-- transformers area start -->
    <section class="transformers-area">
        <div class="container" style="z-index: 2 !important;">
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
                            <p>{{ $movie->genreFilm->kategori }} movie</p>
                            <ul>
                                <li>
                                    <div class="transformers-left">
                                        Genre:
                                    </div>
                                    <div class="transformers-right">
                                        {{ $movie->genreFilm->kategori }}
                                    </div>
                                </li>
                                <li>
                                    <div class="transformers-left">
                                        Tahun Rilis:
                                    </div>
                                    <div class="transformers-right">
                                        {{ $movie->tahunRilis->tahun }}
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
                                        Main Cast:
                                    </div>
                                    <div class="transformers-right">
                                        @foreach ($movie->casting as $casting)
                                            <a href="/cast#{{ $casting->id }}" class="link">{{ $casting->nama }}</a>
                                            @if (!$loop->last)
                                                ,&nbsp;
                                            @endif
                                        @endforeach
                                    </div>
                                </li>
                                <li>
                                    <div class="transformers-left">
                                        Share:
                                    </div>
                                    <div class="transformers-right">
                                        <a href="#"><i class="icofont icofont-social-facebook"></i></a>
                                        <a href="#"><i class="icofont icofont-social-twitter"></i></a>
                                        <a href="#"><i class="icofont icofont-social-google-plus"></i></a>
                                        <a href="#"><i class="icofont icofont-youtube-play"></i></a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end mt-5 mt-lg-0">
                    <a href="{{ route('guest_home') }}" class="theme-btn mr-3">
                        <i class="icofont icofont-arrow-left"></i>
                        Home
                    </a>
                    <a href="{{ route('movies') }}" class="theme-btn">
                        Movies Page
                        <i class="icofont icofont-arrow-right"></i>
                    </a>
                </div>
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

    <!-- details area start -->
    <section class="details-area">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="details-content">
                        <div class="details-overview mb-5">
                            <h2>Sinopsis</h2>
                            <p>{!! $movie->sinopsis !!}</p>
                        </div>
                        <form action="{{ route('kirimReview') }}" method="POST">
                            <div class="details-reply">
                                <h2>Berikan Tanggapanmu</h2>
                                <p class="mt-3 mb-4">Berikan tanggapanmu terkait film <b>{{ $movie->judul }}</b> baik dalam
                                    bentuk komentar umum ataupun
                                    review dengan mengisi forum dibawah!</p>
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="select-container">
                                            <input type="text" name="nama" placeholder="Nama" required />
                                            <i class="icofont icofont-ui-user"></i>
                                        </div>
                                    </div>
                                    <input type="hidden" name="id_movie" value="{{ $movie->id }}">
                                    <div class="col-lg-6">
                                        <div class="select-container">
                                            <input type="email" name="email" placeholder="Email" required />
                                            <i class="icofont icofont-envelope"></i>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="textarea-container">
                                            <textarea name="komentar" placeholder="Ketikkan Sesuatu Disini..." required></textarea>
                                            <button type="submit"><i class="icofont icofont-send-mail"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mt-4">
                                <button class="comment-btn" type="submit">
                                    Kirim
                                    <i class="bi bi-send-fill ml-2"></i>
                                </button>
                            </div>
                        </form>

                        <div class="table-responsive">
                            {{-- <table class="table mt-3">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Komentar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($review as $rev)
                                        <tr>
                                            <th>{{ $rev->nama }}</th>
                                            <th>{{ $rev->email }}</th>
                                            <th>{{ $rev->komentar }}</th>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table> --}}
                        </div>

                        <h3 class="my-4">Komentar dan Review <small class="text-muted">({{ $review->count() }})</small>
                        </h3>

                        @if ($review->count() > 0)
                            @foreach ($review as $rev)
                                <div class="d-flex justify-content-start my-4 align-items-start">
                                    <img src="{{ asset('assets/images/no_image.png') }}" alt="profile-image"
                                        class="rounded-circle"
                                        style="width:64px; heighr:64px; object-fit:cover; object-position:center;">
                                    <div class="text-start ml-4">
                                        <h4 class="mb-1">{{ $rev->nama }}</h4>
                                        <p>{{ $rev->komentar }}</p>
                                    </div>
                                </div>
                                @if (!$loop->last)
                                    <hr class="opacity-50" />
                                @endif
                            @endforeach
                        @else
                            <h4 class="text-center opacity-70">Belum Ada Komentar :(</h4>
                        @endif

                        {{-- <div class="details-thumb">
                            <div class="details-thumb-prev">
                                <div class="thumb-icon">
                                    <i class="icofont icofont-simple-left"></i>
                                </div>
                                <a href="#" class="thumb-text">
                                    <h4>Previous Post</h4>
                                    <p>Standard Post With Gallery</p>
                                </a>
                            </div>
                            <div class="details-thumb-next">
                                <a href="#" class="thumb-text">
                                    <h4>Next Post</h4>
                                    <p>Standard Post With Preview Image</p>
                                </a>
                                <div class="thumb-icon">
                                    <i class="icofont icofont-simple-right"></i>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
                {{-- <div class="col-lg-3 text-center text-lg-left">
                    <div class="portfolio-sidebar">
                        <img src="{{ asset('front/assets/img/sidebar/sidebar1.png') }}" alt="sidebar" />
                        <img src="{{ asset('front/assets/img/sidebar/sidebar2.png') }}" alt="sidebar" />
                        <img src="{{ asset('front/assets/img/sidebar/sidebar4.png') }}" alt="sidebar" />
                    </div>
                </div> --}}
            </div>
        </div>
    </section><!-- details area end -->
@endsection
