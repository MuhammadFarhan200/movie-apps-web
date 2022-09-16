<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Casting;
use App\Models\GenreFilm;
use App\Models\Movie;
use App\Models\TahunRilis;
use Illuminate\Http\Request;
use Validator;

class MovieController extends Controller
{
    public function index()
    {
        $data_title = 'Movie';
        $movies = Movie::orderBy('id', 'desc')->get();
        return view('admin.pages.movie.index', compact('movies', 'data_title'));
    }

    public function create()
    {
        $genre = GenreFilm::all();
        $tahun = TahunRilis::all();
        $casting = Casting::all();
        return view('admin.pages.movie.create', compact('casting', 'genre', 'tahun'));
    }

    public function store(Request $request)
    {
        $rules = [
            'judul' => 'required|unique:movies',
            'background' => 'required|image|max:1024',
            'cover' => 'required|image|max:1024',
            'sinopsis' => 'required',
            'durasi' => 'required',
            'id_genre' => 'required',
            'id_tahun_rilis' => 'required',
            'casting' => 'required',
        ];

        $messages = [
            'judul.required' => 'Nama harus di isi!',
            'judul.unique' => 'Judul tidak boleh sama!',
            'cover.required' => 'cover harus di isi!',
            'cover.image' => 'cover harus berjenis jpg & png!',
            'cover.max' => 'cover harus dibawah kapasitas 1024kb!',
            'background.required' => 'background harus di isi!',
            'background.image' => 'background harus berjenis jpg & png!',
            'background.max' => 'background harus dibawah kapasitas 1024kb!',
            'sinopsis.required' => 'sinopsis harus di isi!',
            'durasi.required' => 'Nama harus di isi!',
            'id_genre.required' => 'Genre harus di isi!',
            'id_tahun_rilis.required' => 'Tahun Rilis harus di isi!',
            'casting.required' => 'Casting harus di isi!',
        ];

        $validation = Validator::make($request->all(), $rules, $messages);
        if ($validation->fails()) {
            Alert::error('data yang anda input ada kesalahan', 'Oops!')->persistent("Ok");
            return back()->withErrors($validation)->withInput();
        }

        $movies = new Movie();
        $movies->judul = $request->judul;
        $movies->durasi = $request->durasi;
        $movies->sinopsis = $request->sinopsis;
        $movies->id_genre = $request->id_genre;
        $movies->id_tahun_rilis = $request->id_tahun_rilis;
        if ($request->hasFile('cover')) {
            $image = $request->file('cover');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('images/movies/', $name);
            $movies->cover = $name;
        }
        if ($request->hasFile('background')) {
            $image = $request->file('background');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('images/movies/', $name);
            $movies->background = $name;
        }
        $movies->save();
        $movies->casting()->attach($request->casting);
        Alert::success('Done', 'Data berhasil dibuat')->autoClose(3000);
        return redirect()->route('movie.index');
    }

    public function show($id)
    {
        $movie = Movie::findOrFail($id);
        return view('admin.pages.movie.show', compact('movie'));

    }

    public function edit($id)
    {
        $movie = Movie::findOrFail($id);
        $genre = GenreFilm::all();
        $tahun = TahunRilis::all();
        $casting = Casting::all();
        $selectCast = Casting::with('movie')->pluck('id')->toArray();
        // dd($selectCast);
        return view('admin.pages.movie.edit', compact('selectCast', 'movie', 'casting', 'genre', 'tahun'));

    }

    public function update(Request $request, $id)
    {
        $rules = [
            'judul' => 'required',
            'background' => 'required|image|max:1024',
            'cover' => 'required|image|max:1024',
            'sinopsis' => 'required',
            'id_genre' => 'required',
            'id_tahun_rilis' => 'required',
            'casting' => 'required',
        ];

        $messages = [
            'judul.required' => 'Nama harus di isi!',
            'cover.required' => 'cover harus di isi!',
            'cover.image' => 'cover harus berjenis jpg & png!',
            'cover.max' => 'cover harus dibawah kapasitas 1024kb!',
            'background.required' => 'background harus di isi!',
            'background.image' => 'background harus berjenis jpg & png!',
            'background.max' => 'background harus dibawah kapasitas 1024kb!',
            'sinopsis.required' => 'sinopsis harus di isi!',
            'id_genre.required' => 'Genre harus di isi!',
            'id_tahun_rilis.required' => 'Tahun Rilis harus di isi!',
            'casting.required' => 'Casting harus di isi!',
        ];

        $validation = Validator::make($request->all(), $rules, $messages);
        if ($validation->fails()) {
            Alert::error('Oops!', 'Data yang anda input ada kesalahan!')->persistent("Ok");
            return back()->withErrors($validation)->withInput();
        }

        $movies = Movie::findOrFail($id);
        $movies->judul = $request->judul;
        $movies->sinopsis = $request->sinopsis;
        $movies->id_genre = $request->id_genre;
        $movies->durasi = $request->durasi;
        $movies->id_tahun_rilis = $request->id_tahun_rilis;
        if ($request->hasFile('cover')) {
            $movies->deleteImage();
            $image = $request->file('cover');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('images/movies/', $name);
            $movies->cover = $name;
        }
        if ($request->hasFile('background')) {
            $movies->deleteBackground();
            $image = $request->file('background');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('images/movies/', $name);
            $movies->background = $name;
        }
        $movies->save();
        $movies->casting()->sync($request->casting);
        Alert::success('Done', 'Data berhasil diedit')->autoClose(3000);
        return redirect()->route('movie.index');

    }

    public function destroy($id)
    {
        $movies = Movie::findOrFail($id);
        $movies->deleteImage();
        $movies->deleteBackground();
        $movies->delete();
        $movies->casting()->detach();

        Alert::success('Done', 'Data berhasil dihapus')->autoClose(3000);
        return redirect()->route('movie.index');
    }
}
