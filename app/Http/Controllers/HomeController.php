<?php

namespace App\Http\Controllers;

use App\Models\GenreFilm;
use App\Models\Casting;
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
        $jumlahGenreFilm = GenreFilm::all()->count();
        $jumlahCasting = Casting::all()->count();
        alert('Hallo!', 'Selamat Datang Kembali!')->autoClose();
        return view('admin.home', compact('jumlahTahunRilis', 'jumlahGenreFilm', 'jumlahCasting'));
    }
}
