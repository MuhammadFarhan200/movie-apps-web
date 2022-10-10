@extends('layouts.front')

@section('page-title', 'Home')
@section('page-content')

    {{-- ==== Sementara ==== --}}
    <!-- breadcrumb area start -->
    {{-- <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-area-content">
                        <h1>Home Page</h1>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- breadcrumb area end -->
    {{-- ==== End Sementara ==== --}}

    <!-- hero area start -->
    @if ($movies->count() > 0)
        <section class="hero-area" id="home">
            <div class="container">

                <div class="hero-area-slider">

                    @foreach ($filtered as $fltr_movie)
                        <div class="row hero-area-slide">
                            <div class="col-lg-6 col-md-5">
                                <div class="hero-area-content">
                                    <img src="{{ $fltr_movie->image() }}" alt="{{ $fltr_movie->judul }}" class="slide-img" />
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-7 pb-4">
                                <div class="hero-area-content pr-50 pr-4">
                                    <h2 class="mt-4 judul">
                                        <a href="movies/{{ $fltr_movie->id }}" class="link">{{ $fltr_movie->judul }}</a>
                                    </h2>
                                    <p class="mt-3">{!! Str::substr($fltr_movie->sinopsis, 0, 180) !!}......</p>
                                    <h3 class="">Cast:</h3>
                                    <div class="slide-cast">
                                        @foreach ($fltr_movie->casting as $cast)
                                            <div class="single-slide-cast">
                                                <a href="/cast#{{ $cast->id }}">
                                                    <img src="{{ $cast->image() }}" alt="{{ $cast->nama }}" />
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="slide-trailor text-end d-flex justify-content-between align-items-center">
                                        <h4 class="">
                                            {{ $fltr_movie->tahunRilis->tahun . ' | ' . $fltr_movie->genreFilm->kategori }}
                                        </h4>
                                        <a class="theme-btn" href="movies/{{ $fltr_movie->id }}">
                                            Detail
                                            <i class="icofont icofont-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                @if ($movies->count() >= 3)
                    <div class="hero-area-thumb">
                        <div class="thumb-prev">
                            <div class="row hero-area-slide">
                                <div class="col-lg-6 col-md-5">
                                    <div class="hero-area-content">
                                        <img src="{{ $filtered[2]->image() }}" alt="" class="slide-img" />
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-7">
                                    <div class="hero-area-content pr-50">
                                        <h2 class="mt-4 judul">{{ $filtered[2]->judul }}</h2>
                                        <p class="mt-3">{{ Str::substr($filtered[2]->sinopsis, 0, 200) }}......</p>
                                        <h4 class="mt-4">
                                            {{ $filtered[2]->tahunRilis->tahun . ' | ' . $filtered[2]->genreFilm->kategori }}
                                        </h4>
                                        <div class="slide-trailor">
                                            <a class="theme-btn" href="movies/{{ $filtered[2]->id }}">
                                                Detail
                                                <i class="bi bi-arrow-right ml-2"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="thumb-next">
                            <div class="row hero-area-slide">
                                <div class="col-lg-6 col-md-5">
                                    <div class="hero-area-content">
                                        <img src="{{ $filtered[1]->image() }}" alt="about" class="slide-img" />
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-7">
                                    <div class="hero-area-content pr-50">
                                        <h2 class="mt-4 judul">{{ $filtered[1]->judul }}</h2>
                                        <p class="mt-3">{{ Str::substr($filtered[1]->sinopsis, 0, 200) }}......</p>
                                        <h4 class="mt-4">
                                            {{ $filtered[1]->tahunRilis->tahun . ' | ' . $filtered[1]->genreFilm->kategori }}
                                        </h4>
                                        <div class="slide-trailor">
                                            <a class="theme-btn" href="movies/{{ $filtered[1]->id }}">
                                                Detail
                                                <i class="bi bi-arrow-right ml-2"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </section>
    @else
        <section class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-area-content">
                            <h1>Home Page</h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-- hero area end -->

    <!-- portfolio section start -->
    <section class="portfolio-area pt-60 pb-90">
        <div class="container">
            <div class="row flexbox-center">
                <div class="col text-lg-left">
                    <div class="section-title">
                        <h1 class="mb-3"><i class="icofont icofont-movie"></i> Rekomendasi Untukmu</h1>
                    </div>
                </div>
                <div class="col-lg-6 text-center text-lg-right">
                    <div class="portfolio-menu">
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

            @if ($movies->count() > 0)
                <div class="row portfolio-item">

                    {{-- Loop Data --}}
                    @foreach ($movies as $movie)
                        <div class="col-lg-3 col-md-4 col-sm-6 {{ $movie->genreFilm->kategori }}">
                            <a href="movies/{{ $movie->id }}" class="d-flex flex-column align-items-stretch">
                                <div class="single-portfolio">
                                    <div class="single-portfolio-img">
                                        <img src="{{ $movie->image() }}" alt="{{ $movie->judul }}" class="w-100" />
                                        <h5 class="detail-movie">
                                            Detail
                                        </h5>
                                    </div>
                                    <h3 class="portfolio-title text-nowrap"
                                        style="overflow: hidden; text-overflow: ellipsis;">
                                        <a href="movies/{{ $movie->id }}" class="link">{{ $movie->judul }}</a>
                                    </h3>
                                    <div class="portfolio-content mt-auto">
                                        <hr class="mt-2 opacity-50" />
                                        <div class="mt-2">
                                            <h4>
                                                {{ $movie->tahunRilis->tahun . ' | ' . $movie->genreFilm->kategori }}
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                    {{-- End Loop Data --}}

                </div>

                <div class="row mt-5 text-center">
                    <div class="col">
                        <a href="{{ route('movies') }}" class="link-2" style="font-size: 24px;">
                            Lihat Lebih Banyak
                            <i class="bi bi-arrow-right mb-0"></i>
                        </a>
                    </div>
                </div>
            @else
                <h3 class="text-center mt-5">Data Belum Ada :(</h3>

                {{-- Sementara --}}
                {{-- <h3 class="mt-5 mx-auto">Data Belum Ada :(</h3> --}}

                {{-- <div class="row">
                    <div class="col-lg-12">
                        <div class="col-lg-3 col-md-4 col-sm-6 soon released">
                            <a href="#">
                                <div class="single-portfolio">
                                    <div class="single-portfolio-img">
                                        <img src="{{ asset('front/assets/img/portfolio/portfolio1.png') }}"
                                            alt="portfolio" class="w-100" />
                                        <h5 class="detail-movie">
                                            Detail
                                        </h5>
                                    </div>
                                    <div class="portfolio-content">
                                        <h2>Boyz II Men</h2>
                                        <div class="d-flex flex-row justify-content-between align-items-center mt-2">
                                            <h4>Action</h4>
                                            <h4>2020</h4>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 top">
                            <div class="single-portfolio">
                                <div class="single-portfolio-img">
                                    <img src="{{ asset('front/assets/img/portfolio/portfolio2.png') }}" alt="portfolio"
                                        class="w-100" />
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
                                    <img src="{{ asset('front/assets/img/portfolio/portfolio3.png') }}" alt="portfolio"
                                        class="w-100" />
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
                                    <img src="{{ asset('front/assets/img/portfolio/portfolio4.png') }}" alt="portfolio"
                                        class="w-100" />
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
                                    <img src="{{ asset('front/assets/img/portfolio/portfolio5.png') }}" alt="portfolio"
                                        class="w-100" />
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
                                    <img src="{{ asset('front/assets/img/portfolio/portfolio6.png') }}" alt="portfolio"
                                        class="w-100" />
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
                    </div>
                </div> --}}
            @endif
        </div>
    </section><!-- portfolio section end -->
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
                <div class="col-md-9">
                    <div class="video-area">
                        <img src="{{ asset('front/assets/img/video/video1.png') }}" alt="video" />
                        <a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
                            <i class="icofont icofont-ui-play"></i>
                        </a>
                        <div class="video-text">
                            <h2>Angle of Death</h2>
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
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-12 col-sm-6">
                            <div class="video-area">
                                <img src="{{ asset('front/assets/img/video/video2.png') }}" alt="video"
                                    class="w-100" />
                                <a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
                                    <i class="icofont icofont-ui-play"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-6">
                            <div class="video-area">
                                <img src="{{ asset('front/assets/img/video/video3.png') }}" alt="video"
                                    class="w-100" />
                                <a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
                                    <i class="icofont icofont-ui-play"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- video section end -->

    <!-- news section start -->
    {{-- <section class="news">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title pb-20">
                        <h1><i class="icofont icofont-coffee-cup"></i> Latest News</h1>
                    </div>
                </div>
            </div>
            <hr />
        </div>
        <div class="news-slide-area">
            <div class="news-slider">
                <div class="single-news">
                    <div class="news-bg-1"></div>
                    <div class="news-date">
                        <h2><span>NOV</span> 25</h2>
                        <h1>2017</h1>
                    </div>
                    <div class="news-content">
                        <h2>The Witch Queen</h2>
                        <p>Witch Queen is a tall woman with a slim build. She has pink hair, which is pulled up under
                            her hat, and teal eyes.</p>
                    </div>
                    <a href="#">Read More</a>
                </div>
                <div class="single-news">
                    <div class="news-bg-2"></div>
                    <div class="news-date">
                        <h2><span>NOV</span> 25</h2>
                        <h1>2017</h1>
                    </div>
                    <div class="news-content">
                        <h2>The Witch Queen</h2>
                        <p>Witch Queen is a tall woman with a slim build. She has pink hair, which is pulled up under
                            her hat, and teal eyes.</p>
                    </div>
                    <a href="#">Read More</a>
                </div>
                <div class="single-news">
                    <div class="news-bg-3"></div>
                    <div class="news-date">
                        <h2><span>NOV</span> 25</h2>
                        <h1>2017</h1>
                    </div>
                    <div class="news-content">
                        <h2>The Witch Queen</h2>
                        <p>Witch Queen is a tall woman with a slim build. She has pink hair, which is pulled up under
                            her hat, and teal eyes.</p>
                    </div>
                    <a href="#">Read More</a>
                </div>
            </div>
            <div class="news-thumb">
                <div class="news-next">
                    <div class="single-news">
                        <div class="news-bg-3"></div>
                        <div class="news-date">
                            <h2><span>NOV</span> 25</h2>
                            <h1>2017</h1>
                        </div>
                        <div class="news-content">
                            <h2>The Witch Queen</h2>
                            <p>Witch Queen is a tall woman with a slim build. She has pink hair, which is pulled up
                                under her hat, and teal eyes.</p>
                        </div>
                        <a href="#">Read More</a>
                    </div>
                </div>
                <div class="news-prev">
                    <div class="single-news">
                        <div class="news-bg-2"></div>
                        <div class="news-date">
                            <h2><span>NOV</span> 25</h2>
                            <h1>2017</h1>
                        </div>
                        <div class="news-content">
                            <h2>The Witch Queen</h2>
                            <p>Witch Queen is a tall woman with a slim build. She has pink hair, which is pulled up
                                under her hat, and teal eyes.</p>
                        </div>
                        <a href="#">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- news section end -->
@endsection
