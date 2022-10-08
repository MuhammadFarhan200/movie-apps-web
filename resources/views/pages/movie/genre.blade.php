@extends('layouts.front')

@section('page-title', 'Genres Page')
@section('page-content')
    <!-- breadcrumb area start -->
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-area-content">
                        <h1>Genres Page</h1>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- breadcrumb area end -->
    <!-- transformers area start -->
    <section class="transformers-area">
        <div class="container mb-5">
            <div class="transformers-box pt-3">
                <div class="row flex-row justify-content-center justify-content-lg-start align-items-center px-4">
                    @foreach ($genres as $genre)
                        <a href="/movies?genre={{ $genre->kategori }}"
                            class="flex-fill bd-highlight py-3 px-4 rounded shadow mt-4 border mr-3 genre-list text-nowrap">
                            {{ $genre->kategori }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section><!-- transformers area end -->
@endsection
