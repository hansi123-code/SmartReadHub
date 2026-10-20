<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Bookmark;
use App\Models\DownloadHistory;
use App\Models\ReadingHistory;
use App\Models\ReadingProgress;
use Illuminate\Support\Facades\DB;


class UserDashboardController extends Controller
{


    public function index()
    {

        $userId = auth()->id();


        $totalBooks = Book::count();

        $totalReadBooks = ReadingHistory::count();

        $totalBookmarks = Bookmark::count();

        $totalDownloads = DownloadHistory::count();


        $totalCategories = DB::table('books')
            ->distinct()
            ->count('category');


        $recentBooks = ReadingHistory::with('book')
            ->where('user_id',$userId)
            ->latest()
            ->take(5)
            ->get();



        return view('user-dashboard',compact(

            'totalBooks',
            'totalReadBooks',
            'totalBookmarks',
            'totalDownloads',
            'totalCategories',
            'recentBooks'

        ));

    }



    public function readingProgress()
    {

        $userId = auth()->id();



        $academicProgress = Book::whereIn('category',[

            'Software Engineering',
            'Software Quality Assurance',
            'IT Project Management',
            'Business Analysis Practice',
            'Mobile Application Development',
            'Professional World'

        ])
        ->get()
        ->groupBy('category')
        ->map(function($books) use($userId){


            $totalBooks = $books->count();


            $readBooks = ReadingProgress::where('user_id',$userId)
                ->whereIn('book_id',$books->pluck('id'))
                ->count();



            return $totalBooks > 0
            ? round(($readBooks/$totalBooks)*100)
            : 0;


        });





        $entertainmentProgress = Book::whereIn('category',[

            'Novels',
            'Short Stories',
            'Adventure stories',
            'Horror stories',
            'Sinhala Stories',
            'Children Stories'

        ])
        ->get()
        ->groupBy('category')
        ->map(function($books) use($userId){


            $totalBooks = $books->count();


            $readBooks = ReadingProgress::where('user_id',$userId)
                ->whereIn('book_id',$books->pluck('id'))
                ->count();



            return $totalBooks > 0
            ? round(($readBooks/$totalBooks)*100)
            : 0;


        });




        return view('reading-progress',compact(

            'academicProgress',
            'entertainmentProgress'

        ));

    }


}