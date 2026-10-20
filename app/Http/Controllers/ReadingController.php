<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\ReadingProgress;
use Illuminate\Support\Facades\Auth;


class ReadingController extends Controller
{

    public function store(Book $book)
    {


        ReadingProgress::firstOrCreate([

            'user_id'=>Auth::id(),

            'book_id'=>$book->id

        ]);


        return redirect()
        ->route('book.show',$book->id);


    }

}
