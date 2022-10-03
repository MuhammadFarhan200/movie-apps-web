<?php

namespace App\Http\Controllers;

use App\Models\Movie;

class FrontController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $movies = Movie::limit(8)->get()->load('tahunRilis', 'genreFilm');
        $filtered = $movies->take(3);
        return view('index', compact('movies', 'filtered'));
    }

    public function movie()
    {
        return view('pages.movie.movies');
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
