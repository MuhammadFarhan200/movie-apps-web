<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\GenreFilm;
use App\Models\Movie;
use App\Models\Reviewer;
use Illuminate\Http\Request;

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

    public function detailMovie($id)
    {
        $movie = Movie::findOrFail($id);
        $review = Reviewer::select('reviewers.nama', 'reviewers.email', 'reviewers.komentar')
            ->join('movies', 'movies.id', '=', 'reviewers.id_movie')->where('reviewers.id_movie', $id)->get();
        return view('pages.movie.movie-details', compact('movie', 'review'));
    }

    public function sendReview(Request $request)
    {
        $review = new Reviewer();
        $review->nama = $request->nama;
        $review->email = $request->email;
        $review->komentar = $request->komentar;
        $review->id_movie = $request->id_movie;
        $review->save();
        Alert::html('<div style="color: white;">Terima Kasih</div>', '<div style="color: white;">Tanggapan anda sudah kami terima</div>', 'success')->background('#13151f')->autoClose(3000);
        return redirect()->back();
    }

    public function cast()
    {
        return view('pages.cast');
    }
}
