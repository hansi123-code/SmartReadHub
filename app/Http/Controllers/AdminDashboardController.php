<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalBooks = Book::count();

        $totalUsers = User::where('role', 'user')->count();

        $totalCategories = 12;

        $myBooks = Book::where('admin_id', auth()->id())->count();

        $recentBooks = Book::where('admin_id', auth()->id())
                    ->latest()
                    ->take(5)
                    ->get();

        return view('admin-dashboard', compact(
            'totalBooks',
            'totalUsers',
            'totalCategories',
            'myBooks',
             'recentBooks'
        ));
    }
}