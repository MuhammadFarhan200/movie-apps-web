<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Movie;
use App\Models\TahunRilis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class TahunRilisController extends Controller
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
        $data_title = 'Tahun Rilis';
        $tahun_rilis = TahunRilis::latest()->get();
        return view('admin.pages.tahun_rilis.index', compact('tahun_rilis', 'data_title'));
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
        //     'kategori' => 'required|unique:genre_films',
        // ]);

        $rules = [
            'tahun' => 'required|unique:tahun_rilis|numeric',
        ];

        $messages = [
            'tahun.required' => 'Tahun harus di isi!',
            'tahun.unique' => 'Tahun tidak boleh sama!',
            'tahun.numeric' => 'Tahun harus berjenis angka!',
        ];

        // validasi
        $validation = Validator::make($request->all(), $rules, $messages);

        if ($validation->fails()) {
            Alert::error('OOPS!', 'Data yang anda input ada kesalahan!')->persistent("Ok");
            return back()->withErrors($validation)->withInput();
        }

        $tahun_rilis = new TahunRilis();
        $tahun_rilis->tahun = $request->tahun;
        $tahun_rilis->save();
        Alert::success('Done', 'Data Berhasil Di Buat')->autoClose(3000);
        return redirect()->route('tahun-rilis.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $tahun_rilis = TahunRilis::findOrFail($id);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $tahun_rilis = TahunRilis::findOrFail($id);

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
            'tahun' => 'required|unique:tahun_rilis',
        ];

        $messages = [
            'tahun.required' => 'Tahun harus di isi!',
            'tahun.unique' => 'Tahun tidak boleh sama!',
        ];

        // validasi
        $validation = Validator::make($request->all(), $rules, $messages);

        if ($validation->fails()) {
            Alert::error('OOPS!', 'Data yang anda input ada kesalahan!')->persistent("Ok");
            return back()->withErrors($validation)->withInput();
        }

        $tahun_rilis = TahunRilis::findOrFail($id);
        $tahun_rilis->tahun = $request->tahun;
        $tahun_rilis->save();
        Alert::success('Done', 'Data Berhasil Di Edit');
        return redirect()->route('tahun-rilis.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Movie::where('id_tahun_rilis', $id)->count() > 0) {
            Alert::error('Fail', 'Gagal Menghapus Tahun Rilis, Masih ada movie dengan Tahun Rilis ini!');
            return redirect()->route('tahun-rilis.index');
        }

        $tahun_rilis = TahunRilis::findOrFail($id);
        $tahun_rilis->delete();
        Alert::success('Done', 'Data Berhasil Dihapus!')->autoClose(3000);
        return redirect()->route('tahun-rilis.index');

    }
}
