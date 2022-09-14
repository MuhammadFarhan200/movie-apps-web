<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\DurasiFilm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class DurasiFilmController extends Controller
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
        $data_title = 'Durasi Film';
        $durasi_film = DurasiFilm::orderBy('id', 'desc')->get();
        return view('admin.pages.durasi_film.index', compact('durasi_film', 'data_title'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //     'durasi' => 'required|max:255|unique:durasi_films',
        // ]);

        $rules = [
            'durasi' => 'required|unique:durasi_films',
        ];

        $messages = [
            'durasi.required' => 'Durasi harus di isi!',
            'durasi.unique' => 'Durasi tidak boleh sama!',
        ];

        // validasi
        $validation = Validator::make($request->all(), $rules, $messages);

        if ($validation->fails()) {
            Alert::error('OOPS!', 'Data yang anda input ada kesalahan!')->persistent("Ok");
            return back()->withErrors($validation)->withInput();
        }

        $durasi_film = new DurasiFilm();
        $durasi_film->durasi = $request->durasi;
        $durasi_film->save();

        Alert::success('Done', 'Data Berhasil Dibuat');
        return redirect()->route('durasi-film.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $durasi_film = DurasiFilm::findOrFail($id);
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
            'durasi' => 'required|max:255|unique:durasi_films',
        ]);

        $durasi_film = DurasiFilm::findOrFail($id);
        $durasi_film->durasi = $request->durasi;
        $durasi_film->save();
        Alert::success('Done', 'Data Durasi Film Berhasil Diperbarui');
        return redirect()->route('durasi-film.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $durasi_film = DurasiFilm::findOrFail($id);

        $durasi_film->delete();
        Alert::success('Deleted', 'Data Berhasil Dihapus');
        return redirect()->route('durasi-film.index');

    }
}
