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
                            <p>{{ $movie->genreFilm->kategori }} movie</p>
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
                <a href="{{ route('guest_home') }}" class="theme-btn py-2" style="border-bottom-right-radius: .3rem">Movies
                    Page
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

    <!-- details area start -->
    <section class="details-area">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="details-content">
                        <div class="details-overview mb-4">
                            <h2>Sinopsis</h2>
                            <p>{{ $movie->sinopsis }}</p>
                        </div>
                        <div class="details-reply">
                            <h2>Leave a Reply</h2>
                            <form action="#">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="select-container">
                                            <input type="text" placeholder="Name" />
                                            <i class="icofont icofont-ui-user"></i>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="select-container">
                                            <input type="text" placeholder="Email" />
                                            <i class="icofont icofont-envelope"></i>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="select-container">
                                            <input type="text" placeholder="Phone" />
                                            <i class="icofont icofont-phone"></i>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="textarea-container">
                                            <textarea placeholder="Type Here Message"></textarea>
                                            <button><i class="icofont icofont-send-mail"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="details-comment">
                            <a class="theme-btn theme-btn2" href="#">Post Comment</a>
                            <p>You may use these HTML tags and attributes: You may use these HTML tags and attributes: You
                                may use these HTML tags and attributes: </p>
                        </div>
                        <div class="details-thumb">
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
                        </div>
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
