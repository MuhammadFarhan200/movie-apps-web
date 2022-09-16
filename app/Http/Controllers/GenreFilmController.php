<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\GenreFilm;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class GenreFilmController extends Controller
{
    private function isAdmin()
    {
        return (Auth::user() && (Auth::user()->role === 'admin'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_title = 'Genre Film';
        $genre_film = GenreFilm::orderBy('id', 'desc')->get();
        return view('admin.pages.genre_film.index', compact('genre_film', 'data_title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('admin.pages.genre_film.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validated = $request->validate([
        //     'kategori' => 'required|unique:genre_films',
        // ]);

        $rules = [
            'kategori' => 'required|unique:genre_films',
        ];

        $messages = [
            'kategori.required' => 'Kategori harus di isi!',
            'kategori.unique' => 'Kategori tidak boleh sama!',
        ];

        // validasi
        $validation = Validator::make($request->all(), $rules, $messages);

        if ($validation->fails()) {
            Alert::error('OOPS!', 'Data yang anda input ada kesalahan!')->persistent("Ok");
            return back()->withErrors($validation)->withInput();
        }

        $genre_film = new GenreFilm();
        $genre_film->kategori = $request->kategori;
        $genre_film->save();
        Alert::success('Done', 'Data Berhasil Di Buat')->autoClose(3000);
        return redirect()->route('genre-film.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $genre_film = GenreFilm::findOrFail($id);
        // return view('admin.pages.genre_film.show', compact('genre_film'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $durasi_film = DurasiFilm::findOrFail($id);
        // return view('admin.pages.durasi_film.edit', compact('durasi_film'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kategori' => 'required|unique:genre_films',
        ]);
        $genre_film = GenreFilm::findOrFail($id);
        $genre_film->kategori = $request->kategori;
        $genre_film->save();
        Alert::success('Done', 'Data Berhasil Di Edit');
        return redirect()->route('genre-film.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Movie::where('id_genre', $id)->count() > 0) {
            Alert::error('Fail', 'Gagal Menghapus Genre, Masih ada movie dengan genre ini!');
            return redirect()->route('genre-film.index');
        }

        $genre_film = GenreFilm::findOrFail($id);
        $genre_film->delete();
        Alert::success('Done', 'Data Berhasil Dihapus!')->autoClose(3000);
        return redirect()->route('genre-film.index');

    }
}
