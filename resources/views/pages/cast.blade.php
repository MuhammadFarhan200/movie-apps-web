@extends('layouts.front')

@section('page-title', 'Cast Page')
@section('page-content')
    <!-- breadcrumb area start -->
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-area-content">
                        <h1>Cast Page</h1>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- breadcrumb area end -->
    <!-- transformers area start -->
    <section class="transformers-area">
        <div class="container cast">
            @foreach ($casters as $cast)
                <div class="transformers-box mb-5" id="{{ $cast->id }}">
                    <div class="row flexbox-center">
                        <div class="col-lg-5 text-lg-left text-center">
                            <div class="transformers-content">
                                <img src="{{ $cast->image() }}" alt="about" class="cast-img" />
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="transformers-content">
                                <h2 class=" mt-4 mt-lg-0">{{ $cast->nama }}</h2>
                                <ul class="custom-transformers-list">
                                    <li>
                                        <div class="transformers-left">
                                            Jenis Kelamin:
                                        </div>
                                        <div class="transformers-right">
                                            {{ $cast->jenis_kelamin }}
                                        </div>
                                    </li>
                                    <li>
                                        <div class="transformers-left">
                                            Tanggal Lahir:
                                        </div>
                                        <div class="transformers-right">
                                            {{ \Carbon\Carbon::parse($cast->tanggal_lahir)->format('d M, Y') }}
                                        </div>
                                    </li>
                                    <li>
                                        <div class="transformers-left">
                                            Film dengan Cast "{{ $cast->nama }}":
                                        </div>
                                        <div class="transformers-right">
                                            @if ($cast->movie->count() > 0)
                                                @foreach ($cast->movie as $movie)
                                                    <a href="movies/{{ $movie->id }}"
                                                        class="link">{{ $movie->judul }}</a>
                                                    @if (!$loop->last)
                                                        ,&nbsp;
                                                    @endif
                                                @endforeach
                                            @else
                                                Belum ada film
                                            @endif
                                        </div>
                                    </li>
                                    <li>
                                        <div class="transformers-left">
                                            Follow:
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
                </div>
            @endforeach
        </div>
    </section><!-- transformers area end -->
    <!-- details area start -->
    {{-- <section class="details-area">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="details-content">
                        <div class="details-overview">
                            <h2>Overview</h2>
                            <p>Humans are at war with the Transformers, and Optimus Prime is gone. The key to saving the
                                future lies buried in the secrets of the past and the hidden history of Transformers on
                                Earth. Now it's up to the unlikely alliance of inventor Cade Yeager, Bumblebee, a n English
                                lord and an Oxford professor to save the world. Transformers: The Last Knight has a deeper
                                mythos and bigger spectacle than its predecessors, yet still ends up being mostly hollow and
                                cacophonous. The first "Transformers" movie that could actually be characterized as badass.
                                Which isn't a bad thing. It may, in fact, be better.</p>
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
                                <div class="thumb-text">
                                    <h4>Previous Post</h4>
                                    <p>Standard Post With Gallery</p>
                                </div>
                            </div>
                            <div class="details-thumb-next">
                                <div class="thumb-text">
                                    <h4>Next Post</h4>
                                    <p>Standard Post With Preview Image</p>
                                </div>
                                <div class="thumb-icon">
                                    <i class="icofont icofont-simple-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- details area end -->
@endsection
