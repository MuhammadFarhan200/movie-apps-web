@extends('layouts.front')

@section('page-title', 'Home')
@section('page-content')
    <!-- hero area start -->
    <section class="hero-area" id="home">
        <div class="container">
            <div class="hero-area-slider">
                @foreach ($movies as $movie)
                    <div class="row hero-area-slide">
                        <div class="col-lg-6 col-md-5">
                            <div class="hero-area-content">
                                <img src="{{ $movie->image() }}" alt="about" class="slide-img" />
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-7">
                            <div class="hero-area-content pr-50">
                                <h2 class="mt-4 judul">{{ $movie->judul }}</h2>
                                <p class="mt-3">{{ Str::substr($movie->sinopsis, 0, 200) }}......</p>
                                <h4 class="mt-4">{{ $movie->tahunRilis->tahun . ' | ' . $movie->genreFilm->kategori }}
                                </h4>
                                <div class="slide-trailor">
                                    <a class="theme-btn" href="{{ route('detail') }}">
                                        Detail
                                        <i class="bi bi-arrow-right ml-2"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{-- <div class="row hero-area-slide">
                    <div class="col-lg-6 col-md-5">
                        <div class="hero-area-content">
                            <img src="{{ asset('front/assets/img/slide2.png') }}" alt="about" />
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-7">
                        <div class="hero-area-content pr-50">
                            <h2>The Devil Princess</h2>
                            <p>She is a devil princess from the demon world. She grew up sheltered by her parents and
                                doesn't really know how to be evil or any of the common actions, She is unable to cry
                                due to Keita's accidental first wish, despite needed for him to wish...</p>
                            <h3>Cast:</h3>
                            <div class="slide-cast">
                                <div class="single-slide-cast">
                                    <img src="{{ asset('front/assets/img/cast/cast1.png') }}" alt="about" />
                                </div>
                                <div class="single-slide-cast">
                                    <img src="{{ asset('front/assets/img/cast/cast3.png') }}" alt="about" />
                                </div>
                                <div class="single-slide-cast">
                                    <img src="{{ asset('front/assets/img/cast/cast4.png') }}" alt="about" />
                                </div>
                                <div class="single-slide-cast">
                                    <img src="{{ asset('front/assets/img/cast/cast5.png') }}" alt="about" />
                                </div>
                                <div class="single-slide-cast">
                                    <img src="{{ asset('front/assets/img/cast/cast6.png') }}" alt="about" />
                                </div>
                                <div class="single-slide-cast">
                                    <img src="{{ asset('front/assets/img/cast/cast7.png') }}" alt="about" />
                                </div>
                                <div class="single-slide-cast text-center">
                                    5+
                                </div>
                            </div>
                            <div class="slide-trailor">
                                <a class="theme-btn" href="{{ route('detail') }}">
                                    Detail
                                    <i class="bi bi-arrow-right ml-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row hero-area-slide">
                    <div class="col-lg-6 col-md-5">
                        <div class="hero-area-content">
                            <img src="{{ asset('front/assets/img/slide1.png') }}" alt="about" />
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-7">
                        <div class="hero-area-content pr-50">
                            <h2>Last Avatar</h2>
                            <p>She is a devil princess from the demon world. She grew up sheltered by her parents and
                                doesn't really know how to be evil or any of the common actions, She is unable to cry
                                due to Keita's accidental first wish, despite needed for him to wish...</p>
                            <h3>Cast:</h3>
                            <div class="slide-cast">
                                <div class="single-slide-cast">
                                    <img src="{{ asset('front/assets/img/cast/cast1.png') }}" alt="about" />
                                </div>
                                <div class="single-slide-cast">
                                    <img src="{{ asset('front/assets/img/cast/cast3.png') }}" alt="about" />
                                </div>
                                <div class="single-slide-cast">
                                    <img src="{{ asset('front/assets/img/cast/cast4.png') }}" alt="about" />
                                </div>
                                <div class="single-slide-cast">
                                    <img src="{{ asset('front/assets/img/cast/cast5.png') }}" alt="about" />
                                </div>
                                <div class="single-slide-cast">
                                    <img src="{{ asset('front/assets/img/cast/cast6.png') }}" alt="about" />
                                </div>
                                <div class="single-slide-cast">
                                    <img src="{{ asset('front/assets/img/cast/cast7.png') }}" alt="about" />
                                </div>
                                <div class="single-slide-cast text-center">
                                    5+
                                </div>
                            </div>
                            <div class="slide-trailor">
                                <a class="theme-btn" href="#">
                                    Detail
                                    <i class="bi bi-arrow-right ml-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row hero-area-slide">
                    <div class="col-lg-6 col-md-5">
                        <div class="hero-area-content">
                            <img src="{{ asset('front/assets/img/slide3.png') }}" alt="about" />
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-7">
                        <div class="hero-area-content pr-50">
                            <h2>The Deer God</h2>
                            <p>She is a devil princess from the demon world. She grew up sheltered by her parents and
                                doesn't really know how to be evil or any of the common actions, She is unable to cry
                                due to Keita's accidental first wish, despite needed for him to wish...</p>
                            <h3>Cast:</h3>
                            <div class="slide-cast">
                                <div class="single-slide-cast">
                                    <img src="{{ asset('front/assets/img/cast/cast1.png') }}" alt="about" />
                                </div>
                                <div class="single-slide-cast">
                                    <img src="{{ asset('front/assets/img/cast/cast3.png') }}" alt="about" />
                                </div>
                                <div class="single-slide-cast">
                                    <img src="{{ asset('front/assets/img/cast/cast4.png') }}" alt="about" />
                                </div>
                                <div class="single-slide-cast">
                                    <img src="{{ asset('front/assets/img/cast/cast5.png') }}" alt="about" />
                                </div>
                                <div class="single-slide-cast">
                                    <img src="{{ asset('front/assets/img/cast/cast6.png') }}" alt="about" />
                                </div>
                                <div class="single-slide-cast">
                                    <img src="{{ asset('front/assets/img/cast/cast7.png') }}" alt="about" />
                                </div>
                                <div class="single-slide-cast text-center">
                                    5+
                                </div>
                            </div>
                            <div class="slide-trailor">
                                <a class="theme-btn" href="#">
                                    Detail
                                    <i class="bi bi-arrow-right ml-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
            <div class="hero-area-thumb">
                <div class="thumb-prev">
                    <div class="row hero-area-slide">
                        <div class="col-lg-6 col-md-5">
                            <div class="hero-area-content">
                                <img src="{{ $movies[3]->image() }}" alt="about" class="slide-img" />
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-7">
                            <div class="hero-area-content pr-50">
                                <h2 class="mt-4 judul">{{ $movies[3]->judul }}</h2>
                                <p class="mt-3">{{ Str::substr($movies[3]->sinopsis, 0, 200) }}......</p>
                                <h4 class="mt-4">
                                    {{ $movies[3]->tahunRilis->tahun . ' | ' . $movies[3]->genreFilm->kategori }}
                                </h4>
                                <div class="slide-trailor">
                                    <a class="theme-btn" href="{{ route('detail') }}">
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
                                <img src="{{ $movies[1]->image() }}" alt="about" class="slide-img" />
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-7">
                            <div class="hero-area-content pr-50">
                                <h2 class="mt-4 judul">{{ $movies[1]->judul }}</h2>
                                <p class="mt-3">{{ Str::substr($movies[1]->sinopsis, 0, 200) }}......</p>
                                <h4 class="mt-4">
                                    {{ $movies[1]->tahunRilis->tahun . ' | ' . $movies[1]->genreFilm->kategori }}
                                </h4>
                                <div class="slide-trailor">
                                    <a class="theme-btn" href="{{ route('detail') }}">
                                        Detail
                                        <i class="bi bi-arrow-right ml-2"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- hero area end -->

    <!-- portfolio section start -->
    <section class="portfolio-area pt-60 pb-90">
        <div class="container">
            <div class="row flexbox-center">
                <div class="col text-center text-lg-left">
                    <div class="section-title">
                        <h1 class="mb-3"><i class="icofont icofont-movie"></i> Rekomendasi Untukmu</h1>
                    </div>
                </div>
                {{-- <div class="col-lg-6 text-center text-lg-right">
                    <div class="portfolio-menu">
                        <ul>
                            <li data-filter="*" class="active">Latest</li>
                            <li data-filter=".soon">Comming Soon</li>
                            <li data-filter=".top">Top Rated</li>
                            <li data-filter=".released">Recently Released</li>
                        </ul>
                    </div>
                </div> --}}
            </div>
            <hr />

            <div class="row align-items-stretch justify-content-start">
                @foreach ($movies as $movie)
                    <div class="col-lg-3 col-md-4 col-sm-6 d-sm-flex align-items-sm-stretch">
                        <a href="#" class="d-flex align-items-stretch">
                            <div class="single-portfolio">
                                <div class="single-portfolio-img">
                                    <img src="{{ $movie->image() }}" alt="portfolio" class="w-100" />
                                    <h5 class="detail-movie">
                                        Detail
                                    </h5>
                                </div>
                                <h3 class="portfolio-title">{{ $movie->judul }}</h3>
                                <div class="portfolio-content mt-auto">
                                    <hr class="mt-2 opacity-50" />
                                    <div class="d-flex flex-row justify-content-between align-items-center mt-2">
                                        <h4>{{ $movie->tahunRilis->tahun . ' | ' . $movie->genreFilm->kategori }}</h4>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach

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
            </div>
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
