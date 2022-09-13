<?php

namespace App\Http\Controllers;

use App\Models\DurasiFilm;
use App\Models\GenreFilm;
use App\Models\TahunRilis;

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
        $jumlahDurasiFilm = DurasiFilm::all()->count();
        $jumlahGenreFilm = GenreFilm::all()->count();
        alert('Hallo!', 'Selamat Datang Kembali!')->autoClose(3000);
        return view('admin.home', compact('jumlahTahunRilis', 'jumlahDurasiFilm', 'jumlahGenreFilm'));
    }
}
