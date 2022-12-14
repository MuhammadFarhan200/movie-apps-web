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

    {{-- Search --}}
    <div class="container">
        <div class="row mb-3">
            <div class="col-md-12 col-lg-10 mx-auto">
                <form action="" method="GET">
                    <div class="row">
                        <div class="col-md-4 px-3 mb-3">
                            <select name="genre" id="" class="form-control filter-genre">
                                <option value="" selected>All Genre</option>
                                @foreach ($allGenre as $genre)
                                    <option value="{{ $genre->kategori }}"
                                        {{ request('genre') === $genre->kategori ? 'selected' : null }}>
                                        {{ $genre->kategori }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 px-3 mb-3">
                            <input type="text" class="form-control"
                                placeholder="Ketikkan judul film yang kamu cari disini" name="search"
                                value="{{ request('search') ? request('search') : null }}">
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-outline-secondary w-100 py-2" type="submit">
                                Search
                                <i class="bi bi-search ml-1"></i>
                            </button>
                        </div>
                    </div>
                </form>
                {{-- <a href="/genre" class="link mx-4">
                    Atau cari berdasarkan genre
                    <i class="icofont icofont-arrow-right"></i>
                </a> --}}
            </div>
        </div>
    </div>
    {{-- End Search --}}

    <!-- portfolio section start -->
    <section class="portfolio-area pt-60 pb-5">
        <div class="container">
            <div class="row flexbox-center">
                <div class="col-lg-6 text-lg-left">
                    <div class="section-title">
                        <h1 class="mb-3"><i class="icofont icofont-movie"></i> Pilih Film Kesukaanmu</h1>
                    </div>
                </div>
                <div class="col-lg-6 text-center text-lg-right">
                    <div class="portfolio-menu">
                        {{-- <ul>
                            <li data-filter="*" class="active">Semua</li>
                            @foreach ($allGenre as $genre)
                                <li data-filter=".{{ $genre->kategori }}">{{ $genre->kategori }}</li>
                            @endforeach
                        </ul> --}}
                        {{-- <form action="" method="GET">
                            <div class="input-group mt-3 mt-md-0 mt-lg-0 mb-3 px-3 px-lg-0">
                                <select name="genre" id="" class="form-control filter-genre">
                                    <option value="" selected>Pilih Genre</option>
                                    @foreach ($allGenre as $genre)
                                        <option value="{{ $genre->kategori }}"
                                            {{ request('genre') === $genre->kategori ? 'selected' : null }}>
                                            {{ $genre->kategori }}
                                        </option>
                                    @endforeach
                                </select>
                                <button class="btn btn-outline-secondary" type="submit">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                        </form> --}}
                    </div>
                </div>
            </div>

            <hr />

            <div class="row portfolio-item justify-content-start">

                @if ($movies->count() < 1 && request('gerne'))
                    <div class="col">
                        <h3 class="opacity-70 text-center mt-5">Movie dengan genre <b>{{ request('genre') }}</b> masih
                            kosong :(</h3>
                    </div>
                @elseif ($movies->count() < 1 && request('search'))
                    <div class="col">
                        <h3 class="opacity-70 text-center mt-5">
                            Movie dengan kata kunci <b>{{ request('search') }}</b> tidak ditemukan :(
                        </h3>
                    </div>
                @elseif ($movies->count() < 1)
                    <div class="col">
                        <h3 class="opacity-70 text-center mt-5">Movie Masih Kosong :(</h3>
                    </div>
                @else
                    @foreach ($movies as $movie)
                        <div class="col-lg-3 col-md-4 col-sm-6 {{ $movie->genreFilm->kategori }}">
                            <a href="/movies/{{ $movie->id }}">
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
                                            <h4>
                                                <a href="/movies?tahun={{ $movie->tahunRilis->tahun }}" class="link">
                                                    {{ $movie->tahunRilis->tahun }}
                                                </a>
                                                |
                                                <a href="/movies?genre={{ $movie->genreFilm->kategori }}"
                                                    class="link">{{ $movie->genreFilm->kategori }}</a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
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
