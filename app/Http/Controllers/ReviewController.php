<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        return view('reviews.index');
    }

    public function list()
    {
        $reviews = Review::paginate(6);
        return view('reviews.list', compact('reviews'));
    }

    public function submit(Request $request)
    {
        $request->validate([
            'review' => 'required|string|max:200'
        ]);

        $reviews = [
            'name' => $request->name,
            'email' => $request->email,
            'review' => $request->review
        ];

        Review::create($reviews);
        return back()->with(['message' => 'Thanks for giving reviews us!']);
    }

    public function delete($id)
    {
        $id = Review::find($id);
        if ($id) {
            $id->delete();
        }
        return back();
    }
}
