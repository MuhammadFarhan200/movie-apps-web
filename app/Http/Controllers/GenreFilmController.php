<?php

namespace App\Http\Controllers;

use App\Models\GenreFilm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        if (!$this->isAdmin()) {
            return redirect('/login');
        }

        return view('admin.pages.genre_film.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validated([
            'kategori' => 'required|unique:genre_films',
        ]);
        $genre_film = new GenreFilm();
        $genre_film->kategori = $request->kategori;
        $genre_film->save();
        Alert::succes('Done', 'Data Berhasil Di Buat');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $this->validated([
            'kategori' => 'required',
        ]);
        $genre_film = GenreFilm::findOrFail($id);
        $genre_film->kategori = $request->kategori;
        $genre_film->save();
        Alert::succes('Done', 'Data Berhasil Di Edit');
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
        $genre_film = GenreFilm::findOrFail($id);
        $genre_film->delete();
        Alert::succes('Done', 'Data Berhasil Dihapus!');
        return redirect()->route('genre-film.index');

    }
}
