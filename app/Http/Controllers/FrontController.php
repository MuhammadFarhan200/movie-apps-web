<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Casting;
use App\Models\GenreFilm;
use App\Models\Movie;
use App\Models\Reviewer;
use App\Models\TahunRilis;
use Illuminate\Http\Request;
use Validator;

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
        if (request('genre') && request('search')) {
            $genres = GenreFilm::firstWhere('kategori', request('genre'));
            $movies = Movie::whereHas('genreFilm', function ($query) {
                $query->where('kategori', request('genre'));
            })->where('judul', 'like', '%' . request('search') . '%')->get();
        } elseif (request('genre')) {
            $genres = GenreFilm::firstWhere('kategori', request('genre'));
            $movies = $genres->movie;
        } elseif (request('tahun')) {
            $tahun = TahunRilis::firstWhere('tahun', request('tahun'));
            $movies = $tahun->movie;
        } elseif (request('search')) {
            $movies = Movie::where('judul', 'like', '%' . request('search') . '%')->orWhereHas('genreFilm', function ($query) {
                $query->where('kategori', request('search'));
            })->orWhereHas('casting', function ($query) {
                $query->where('nama', 'like', '%' . request('search') . '%');
            })->get();
        } else {
            $movies = Movie::orderBy('judul', 'asc')->get();
        }
        // $genres = GenreFilm::limit(4)->orderBy('kategori', 'asc')->get();
        $allGenre = GenreFilm::orderBy('kategori', 'asc')->get();
        return view('pages.movie.movies', compact('movies', 'allGenre'));
    }

    // public function genre()
    // {
    //     $genres = GenreFilm::orderBy('kategori', 'asc')->get();
    //     return view('pages.movie.genre', compact('genres'));
    // }

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
        $rules = [
            'nama' => 'required',
            'email' => 'required',
            'komentar' => 'required',
        ];

        $messages = [
            'nama.required' => 'Nama harus di isi!',
            'email.required' => 'Email harus di isi!',
            'komentar.required' => 'Komentar harus di isi!',
        ];

        $validation = Validator::make($request->all(), $rules, $messages);

        if ($validation->fails()) {
            Alert::html('<div style="color: white;">OOPS!</div>', '<div style="color: white;">Data yang anda input ada kesalahan. Mohon isi dengan benar!</div>', 'error')->background('#13151f')->autoClose(false);
            return back()->withErrors($validation)->withInput();
        }

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
        $casters = Casting::all()->load('movie');
        return view('pages.cast', compact('casters'));
    }

}
