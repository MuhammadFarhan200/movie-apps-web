<?php

namespace App\Http\Controllers;

use App\Models\Casting;
use App\Models\GenreFilm;
use App\Models\Movie;
use App\Models\TahunRilis;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jumlahTahunRilis = TahunRilis::all()->count();
        $jumlahGenreFilm = GenreFilm::all()->count();
        $jumlahCasting = Casting::all()->count();
        $jumlahMovie = Movie::all()->count();

        if (Auth::user()->role == 'admin') {
            toast('Selamat Datang Kembali!', 'success')->autoClose()->width('380px');
            return view('admin.index', compact('jumlahTahunRilis', 'jumlahGenreFilm', 'jumlahCasting', 'jumlahMovie'));
        }

        $movies = Movie::limit(8)->get();
        $filtered = $movies->take(3);
        $genres = GenreFilm::limit(4)->orderBy('kategori', 'asc')->get();
        return view('index', compact('movies', 'filtered', 'genres'));
    }
}
