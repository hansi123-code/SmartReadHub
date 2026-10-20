<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookRating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function store(Request $request, Book $book)
    {
        $request->validate([
            'rating' => 'required|numeric|min:1|max:5'
        ]);

        BookRating::updateOrCreate(
            [
                'book_id' => $book->id,
                'user_id' => auth()->id(),
            ],
            [
                'rating' => $request->rating,
            ]
        );

        // Average Rating Calculate
        $average = BookRating::where('book_id', $book->id)->avg('rating');

        // Update books table
        $book->update([
            'rating' => round($average, 1)
        ]);

        return back()->with('success', '⭐ Rating submitted successfully!');
    }
}