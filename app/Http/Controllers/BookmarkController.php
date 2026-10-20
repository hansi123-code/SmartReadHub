<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bookmark;
use App\Models\Book;


class BookmarkController extends Controller
{


    public function toggle($id)
    {

        $book = Book::findOrFail($id);


        $bookmark = Bookmark::where('user_id',auth()->id())
                    ->where('book_id',$book->id)
                    ->first();


        if($bookmark)
        {

            $bookmark->delete();

            return back()
            ->with('success','Removed from Library');

        }


        Bookmark::create([

            'user_id'=>auth()->id(),

            'book_id'=>$book->id

        ]);


        return back()
        ->with('success','Added to Library');


    }


}