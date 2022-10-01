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
        return view('pages.front.index', compact('movies'));
    }

    public function movie()
    {
        return view('pages.front.movies');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function show()
    {
        return view('pages.front.movie-details');
    }
}
