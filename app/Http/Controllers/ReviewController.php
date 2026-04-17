<?php

namespace App\Http\Controllers;

use App\Models\Attraction;
use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->search;

        $reviews = Review::where('reviewer_name','like',"%$keyword%")->latest()->paginate(5);

        return view('pages.review.indexReview', compact('reviews'));
    }

    public function create()
    {
       $attractions = Attraction::all();
        return view('pages.review.createReview', compact('attractions'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        Review::create($request->all());

        return redirect()->route('reviews.index')->with('success', 'Berhasil tambah data');
    }

    public function show($id)
    {
        $review = Review::findOrFail($id);
        return view('pages.review.showReview', compact('review'));
    }

    public function edit($id)
    {
        $attractions = Attraction::all();
        $review = Review::findOrFail($id);
        return view('pages.review.editReview', compact('review', 'attractions'));
    }

    public function update(Request $request, $id)
    {
        $attraction = Review::findOrFail($id);

        $attraction->update($request->all());

        return redirect()->route('reviews.index')->with('success', 'Berhasil update');
    }

    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        return redirect()->route('reviews.index')->with('success', 'Berhasil hapus');
    }
}

