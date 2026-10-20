<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;

class ReportController extends Controller
{
    public function index()
    {
        $totalBooks = Book::count();

        $totalUsers = User::count();

        $totalViews = Book::sum('views');

        $totalDownloads = Book::sum('downloads');

        $popularBooks = Book::orderByDesc('downloads')
                            ->take(5)
                            ->get();

        $categoryChart = Book::selectRaw('category, COUNT(*) as total')
                             ->groupBy('category')
                             ->get();

        return view('admin.reports', compact(
            'totalBooks',
            'totalUsers',
            'totalViews',
            'totalDownloads',
            'popularBooks',
            'categoryChart'
        ));
    }
}