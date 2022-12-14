<?php

namespace App\Http\Controllers;

use App\Models\GenreFilm;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Validator;

class GenreFilmController extends Controller
{
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
            Alert::error('OOPS!', 'Data yang anda input ada kesalahan!')->autoClose(false);
            return back()->withErrors($validation)->withInput();
        }

        $genre_film = new GenreFilm();
        $genre_film->kategori = $request->kategori;
        $genre_film->save();
        Alert::success('Done', 'Data Berhasil Di Buat')->autoClose();
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
            Alert::error('OOPS!', 'Data yang anda input ada kesalahan!')->autoClose(false);
            return back()->withErrors($validation)->withInput();
        }

        $genre_film = GenreFilm::findOrFail($id);
        $genre_film->kategori = $request->kategori;
        $genre_film->save();
        Alert::success('Done', 'Data Berhasil Di Edit')->autoClose();
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
        if (!GenreFilm::destroy($id)) {
            return redirect()->back();
        }
        return redirect()->route('genre-film.index');
    }
}
