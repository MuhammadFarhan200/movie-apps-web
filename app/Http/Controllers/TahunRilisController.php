<?php

namespace App\Http\Controllers;

use App\Models\TahunRilis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
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
        $tahun_rilis = TahunRilis::orderBy('id', 'desc')->get();

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
        //     'tahun' => 'required|max:255|unique:tahun_rilis',
        // ]);

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

        $tahun_rilis = new TahunRilis();
        $tahun_rilis->tahun = $request->tahun;
        $tahun_rilis->save();
        Alert::success('Done', 'Data Tahun Rilis Berhasil Dibuat');
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
        $validated = $request->validate([
            'tahun' => 'required|max:255|unique:tahun_rilis',
        ]);

        $tahun_rilis = TahunRilis::findOrFail($id);
        $tahun_rilis->tahun = $request->tahun;
        $tahun_rilis->save();
        Alert::success('Done', 'Data Tahun Rilis Berhasil Diedit');
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
        $tahun_rilis = TahunRilis::findOrFail($id);

        $tahun_rilis->delete();
        Alert::success('Deleted', 'Data Berhasil Dihapus');
        return redirect()->route('tahun-rilis.index');
        // return redirect()->route('tahun-rilis.index')->with('success', 'Data Berhasil Dihapus!');
    }
}
