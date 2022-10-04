<?php

namespace App\Http\Controllers;

use App\Models\GenreFilm;
use App\Models\Movie;

class FrontController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $movies = Movie::latest()->limit(8)->get()->load('tahunRilis', 'genreFilm');
        $filtered = $movies->take(3);
        $genres = GenreFilm::limit(4)->orderBy('kategori', 'asc')->get();
        return view('index', compact('movies', 'filtered', 'genres'));
    }

    public function movie()
    {
        $movies = Movie::latest()->get();
        $genres = GenreFilm::limit(4)->orderBy('kategori', 'asc')->get();
        return view('pages.movie.movies', compact('movies', 'genres'));
    }

    public function about()
    {
        return view('pages.about');
    }

    public function detailMovie(Movie $movie)
    {
        return view('pages.movie.movie-details', compact('movie'));
    }

    public function cast()
    {
        return view('pages.cast');
    }
}
