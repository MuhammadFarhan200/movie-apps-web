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
        toast('Selamat Datang Kembali!', 'success')->autoClose()->width('380px');

        if (Auth::user()->role == 'admin') {
            return view('admin.index', compact('jumlahTahunRilis', 'jumlahGenreFilm', 'jumlahCasting', 'jumlahMovie'));
        }
        return view('home', compact('jumlahTahunRilis', 'jumlahGenreFilm', 'jumlahCasting', 'jumlahMovie'));
    }
}
