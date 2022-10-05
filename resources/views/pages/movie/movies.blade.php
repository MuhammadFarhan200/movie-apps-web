@extends('layouts.front')

@section('page-title', 'Movies')
@section('page-content')
    <!-- breadcrumb area start -->
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-area-content">
                        <h1>Movies Page</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb area end -->

    <!-- portfolio section start -->
    <section class="portfolio-area pt-60 pb-5">
        <div class="container">
            <div class="row flexbox-center">
                <div class="col-lg-6 text-lg-left">
                    <div class="section-title">
                        <h1><i class="icofont icofont-movie"></i> Pilih Film Kesukaanmu</h1>
                    </div>
                </div>
                <div class="col-lg-6 text-center text-lg-right">
                    <div class="portfolio-menu" style="white-space: nowrap;">
                        <ul>
                            <li data-filter="*" class="active">Baru Ditambahkan</li>
                            @foreach ($genres as $genre)
                                <li data-filter=".{{ $genre->kategori }}">{{ $genre->kategori }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <hr />
            <div class="row portfolio-item justify-content-start">

                @if ($movies->count() > 0)
                    @foreach ($movies as $movie)
                        <div class="col-lg-3 col-md-4 col-sm-6 {{ $movie->genreFilm->kategori }}">
                            <a href="movies/{{ $movie->id }}">
                                <div class="single-portfolio">
                                    <div class="single-portfolio-img">
                                        <img src="{{ $movie->image() }}" alt="portfolio" class="w-100" />
                                        <h5 class="detail-movie">
                                            Detail
                                        </h5>
                                    </div>
                                    <h3 class="portfolio-title text-nowrap"
                                        style="overflow: hidden; text-overflow: ellipsis;">
                                        {{ $movie->judul }}</h3>
                                    <div class="portfolio-content mt-auto">
                                        <hr class="mt-2 opacity-50" />
                                        <div class="mt-2">
                                            <h4><a href="#" class="link">{{ $movie->tahunRilis->tahun }}</a> |
                                                <a href="#" class="link">{{ $movie->genreFilm->kategori }}</a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @else
                    <div class="col">
                        <h3 class="text-center mt-5">Data Belum Ada :(</h3>
                    </div>
                @endif

                {{-- <div class="col-lg-3 col-md-4 col-sm-6 soon released">
                    <div class="single-portfolio">
                        <div class="single-portfolio-img">
                            <img src="{{ asset('front/assets/img/portfolio/portfolio1.png') }}" alt="portfolio" />
                            <a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
                                <i class="icofont icofont-ui-play"></i>
                            </a>
                        </div>
                        <div class="portfolio-content">
                            <h2>Boyz II Men</h2>
                            <div class="review">
                                <div class="author-review">
                                    <i class="icofont icofont-star"></i>
                                    <i class="icofont icofont-star"></i>
                                    <i class="icofont icofont-star"></i>
                                    <i class="icofont icofont-star"></i>
                                    <i class="icofont icofont-star"></i>
                                </div>
                                <h4>180k voters</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 top">
                    <div class="single-portfolio">
                        <div class="single-portfolio-img">
                            <img src="{{ asset('front/assets/img/portfolio/portfolio2.png') }}" alt="portfolio" />
                            <a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
                                <i class="icofont icofont-ui-play"></i>
                            </a>
                        </div>
                        <div class="portfolio-content">
                            <h2>Tale of Revemge</h2>
                            <div class="review">
                                <div class="author-review">
                                    <i class="icofont icofont-star"></i>
                                    <i class="icofont icofont-star"></i>
                                    <i class="icofont icofont-star"></i>
                                    <i class="icofont icofont-star"></i>
                                    <i class="icofont icofont-star"></i>
                                </div>
                                <h4>180k voters</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 soon">
                    <div class="single-portfolio">
                        <div class="single-portfolio-img">
                            <img src="{{ asset('front/assets/img/portfolio/portfolio3.png') }}" alt="portfolio" />
                            <a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
                                <i class="icofont icofont-ui-play"></i>
                            </a>
                        </div>
                        <div class="portfolio-content">
                            <h2>The Lost City of Z</h2>
                            <div class="review">
                                <div class="author-review">
                                    <i class="icofont icofont-star"></i>
                                    <i class="icofont icofont-star"></i>
                                    <i class="icofont icofont-star"></i>
                                    <i class="icofont icofont-star"></i>
                                    <i class="icofont icofont-star"></i>
                                </div>
                                <h4>180k voters</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 top released">
                    <div class="single-portfolio">
                        <div class="single-portfolio-img">
                            <img src="{{ asset('front/assets/img/portfolio/portfolio4.png') }}" alt="portfolio" />
                            <a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
                                <i class="icofont icofont-ui-play"></i>
                            </a>
                        </div>
                        <div class="portfolio-content">
                            <h2>Beast Beauty</h2>
                            <div class="review">
                                <div class="author-review">
                                    <i class="icofont icofont-star"></i>
                                    <i class="icofont icofont-star"></i>
                                    <i class="icofont icofont-star"></i>
                                    <i class="icofont icofont-star"></i>
                                    <i class="icofont icofont-star"></i>
                                </div>
                                <h4>180k voters</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 released">
                    <div class="single-portfolio">
                        <div class="single-portfolio-img">
                            <img src="{{ asset('front/assets/img/portfolio/portfolio5.png') }}" alt="portfolio" />
                            <a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
                                <i class="icofont icofont-ui-play"></i>
                            </a>
                        </div>
                        <div class="portfolio-content">
                            <h2>In The Fade</h2>
                            <div class="review">
                                <div class="author-review">
                                    <i class="icofont icofont-star"></i>
                                    <i class="icofont icofont-star"></i>
                                    <i class="icofont icofont-star"></i>
                                    <i class="icofont icofont-star"></i>
                                    <i class="icofont icofont-star"></i>
                                </div>
                                <h4>180k voters</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 soon top">
                    <div class="single-portfolio">
                        <div class="single-portfolio-img">
                            <img src="{{ asset('front/assets/img/portfolio/portfolio6.png') }}" alt="portfolio" />
                            <a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
                                <i class="icofont icofont-ui-play"></i>
                            </a>
                        </div>
                        <div class="portfolio-content">
                            <h2>Last Hero</h2>
                            <div class="review">
                                <div class="author-review">
                                    <i class="icofont icofont-star"></i>
                                    <i class="icofont icofont-star"></i>
                                    <i class="icofont icofont-star"></i>
                                    <i class="icofont icofont-star"></i>
                                    <i class="icofont icofont-star"></i>
                                </div>
                                <h4>180k voters</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 soon">
                    <div class="single-portfolio">
                        <div class="single-portfolio-img">
                            <img src="{{ asset('front/assets/img/portfolio/portfolio3.png') }}" alt="portfolio" />
                            <a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
                                <i class="icofont icofont-ui-play"></i>
                            </a>
                        </div>
                        <div class="portfolio-content">
                            <h2>The Lost City of Z</h2>
                            <div class="review">
                                <div class="author-review">
                                    <i class="icofont icofont-star"></i>
                                    <i class="icofont icofont-star"></i>
                                    <i class="icofont icofont-star"></i>
                                    <i class="icofont icofont-star"></i>
                                    <i class="icofont icofont-star"></i>
                                </div>
                                <h4>180k voters</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 top released">
                    <div class="single-portfolio">
                        <div class="single-portfolio-img">
                            <img src="{{ asset('front/assets/img/portfolio/portfolio4.png') }}" alt="portfolio" />
                            <a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
                                <i class="icofont icofont-ui-play"></i>
                            </a>
                        </div>
                        <div class="portfolio-content">
                            <h2>Beast Beauty</h2>
                            <div class="review">
                                <div class="author-review">
                                    <i class="icofont icofont-star"></i>
                                    <i class="icofont icofont-star"></i>
                                    <i class="icofont icofont-star"></i>
                                    <i class="icofont icofont-star"></i>
                                    <i class="icofont icofont-star"></i>
                                </div>
                                <h4>180k voters</h4>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
    <!-- portfolio section end -->

    <!-- video section start -->
    {{-- <section class="video ptb-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title pb-20">
                        <h1><i class="icofont icofont-film"></i> Trailers & Videos</h1>
                    </div>
                </div>
            </div>
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <div class="video-slider mt-20">
                        <div class="video-area">
                            <img src="{{ asset('front/assets/img/video/video2.png') }}" alt="video" />
                            <a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
                                <i class="icofont icofont-ui-play"></i>
                            </a>
                        </div>
                        <div class="video-area">
                            <img src="{{ asset('front/assets/img/video/video3.png') }}" alt="video" />
                            <a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
                                <i class="icofont icofont-ui-play"></i>
                            </a>
                        </div>
                        <div class="video-area">
                            <img src="{{ asset('front/assets/img/video/video4.png') }}" alt="video" />
                            <a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
                                <i class="icofont icofont-ui-play"></i>
                            </a>
                        </div>
                        <div class="video-area">
                            <img src="{{ asset('front/assets/img/video/video5.png') }}" alt="video" />
                            <a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
                                <i class="icofont icofont-ui-play"></i>
                            </a>
                        </div>
                        <div class="video-area">
                            <img src="{{ asset('front/assets/img/video/video2.png') }}" alt="video" />
                            <a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
                                <i class="icofont icofont-ui-play"></i>
                            </a>
                        </div>
                        <div class="video-area">
                            <img src="{{ asset('front/assets/img/video/video3.png') }}" alt="video" />
                            <a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
                                <i class="icofont icofont-ui-play"></i>
                            </a>
                        </div>
                        <div class="video-area">
                            <img src="{{ asset('front/assets/img/video/video4.png') }}" alt="video" />
                            <a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
                                <i class="icofont icofont-ui-play"></i>
                            </a>
                        </div>
                        <div class="video-area">
                            <img src="{{ asset('front/assets/img/video/video5.png') }}" alt="video" />
                            <a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
                                <i class="icofont icofont-ui-play"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- video section end -->
@endsection
