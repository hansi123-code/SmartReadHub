<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bookmark;

class LibraryController extends Controller
{

    public function index()
    {

        $bookmarks = Bookmark::with('book')
                    ->where('user_id', auth()->id())
                    ->latest()
                    ->get();


        return view('library', compact('bookmarks'));

    }

}