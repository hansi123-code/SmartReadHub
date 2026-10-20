<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibraryController;


use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\AssistantController;

Route::get('/dashboard',
[UserDashboardController::class,'index'])
->middleware('auth')
->name('dashboard');

Route::get('/admin-dashboard',
    [AdminDashboardController::class,'index'])
    ->middleware('auth')
    ->name('admin.dashboard');
    
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
Route::get('/books', function () {
    return view('books');
});
Route::get('/bookdetails', function () {
    return view('bookdetails');
});


use App\Models\Book;
use App\Models\User;

Route::get('/', function () {
    $books = Book::count();
    $users = User::count();
    $views = Book::sum('views');

    return view('home', compact('books', 'users', 'views'));
})->name('home');


Route::get('/books', function () {
    return view('books');
})->name('books');

Route::view('/bookgallery', 'bookgallery');

Route::view('/books', 'books')->name('books');

Route::view('/categories', 'categories')->middleware('auth')->name('categories');


Route::view('/assistant', 'assistant');



Route::view('/assistant', 'assistant')->name('assistant');

Route::view('/short-stories', 'shortstories')
    ->name('shortstories');

Route::view('/book-details', 'book-details')
    ->name('book.details');


    


    use App\Http\Controllers\BookController;

Route::get('/admin/books/create', [BookController::class, 'create'])
    ->name('admin.books.create');

Route::post('/admin/books/store', [BookController::class, 'store'])
    ->name('admin.books.store');

    Route::get('/books/category/{category}', [BookController::class, 'categoryBooks'])
    ->name('books.category');

    Route::get('/book/{id}', [BookController::class, 'show'])
    ->name('book.show');

    Route::get('/book/read/{id}', [BookController::class, 'read'])
    ->name('book.read');

Route::get('/book/download/{id}', [BookController::class, 'download'])
    ->name('book.download');


Route::get('/admin/manage-books',
    [BookController::class,'index'])
    ->middleware('auth')
    ->name('admin.books.index');


Route::get('/admin/books/edit/{id}',
    [BookController::class,'edit'])
    ->middleware('auth')
    ->name('admin.books.edit');


Route::put('/admin/books/update/{id}',
    [BookController::class,'update'])
    ->middleware('auth')
    ->name('admin.books.update');


Route::delete('/admin/books/delete/{id}',
    [BookController::class,'destroy'])
    ->middleware('auth')
    ->name('admin.books.delete');



    use App\Http\Controllers\RatingController;

Route::post('/book/{book}/rate', [RatingController::class, 'store'])
    ->middleware('auth')
    ->name('book.rate');

    use App\Http\Controllers\CommentController;

Route::post('/book/{book}/comment',
[CommentController::class,'store'])
->middleware('auth')
->name('comment.store');


Route::delete('/comment/{id}',
[CommentController::class,'destroy'])
->middleware('auth')
->name('comment.delete');

Route::put('/comment/{id}',
    [CommentController::class,'update'])
    ->middleware('auth')
    ->name('comment.update');

  use App\Http\Controllers\BookmarkController;


Route::post('/bookmark/{id}',
[BookmarkController::class,'toggle'])
->middleware('auth')
->name('bookmark.toggle');  




Route::get('/library',
[LibraryController::class,'index'])
->middleware('auth')
->name('library');

Route::get('/bookgallery', [BookController::class, 'gallery'])
    ->name('book.gallery');

Route::get('/my-profile',
[ProfileController::class,'index'])
->middleware('auth')
->name('profile.page');



Route::get('/admin/users',
[UserController::class,'index'])
->middleware('auth')
->name('admin.users');


Route::delete('/admin/users/delete/{id}',
[UserController::class,'destroy'])
->middleware('auth')
->name('admin.users.delete');



Route::get('/admin/reports',
    [ReportController::class,'index'])
    ->middleware('auth')
    ->name('admin.reports');



  
 Route::post('/assistant/chat',
[AssistantController::class,'chat'])
->name('assistant.chat');

Route::post('/book/read/{book}', 
[\App\Http\Controllers\ReadingController::class,'store'])
->middleware('auth')
->name('book.read');

