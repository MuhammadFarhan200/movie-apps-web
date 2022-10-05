<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Reviewer;

class ReviewController extends Controller
{
    public function index()
    {
        $data_title = 'Review';
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
