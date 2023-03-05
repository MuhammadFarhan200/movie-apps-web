<?php

namespace App\Http\Controllers;

use App\Models\Reviewer;
use RealRashid\SweetAlert\Facades\Alert;

class ReviewController extends Controller
{
    public function index()
    {
        $data_title = 'Reviewer';
        $review = Reviewer::latest()->get();
        return view('admin.review.index', compact('review', 'data_title'));
    }

    public function show($id)
    {
        $review = Reviewer::findOrFail($id);
        return view('admin.review.show', compact('review'));
    }

    public function destroy($id)
    {
        $review = Reviewer::findOrFail($id);
        $review->delete();
        Alert::success('Done', 'Data Berhasil Dihapus')->autoClose();
        return redirect()->route('reviewer.index');
    }
}
