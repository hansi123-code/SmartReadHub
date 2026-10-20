<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function create()
    {
        return view('admin.add-book');
    }

    public function store(Request $request)
    {
        $imageName = time().'.'.$request->cover_image->extension();

        $request->cover_image->move(
            public_path('uploads/covers'),
            $imageName
        );

        $pdfName = time().'.'.$request->pdf_file->extension();

        $request->pdf_file->move(
            public_path('uploads/pdfs'),
            $pdfName
        );

        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'description' => $request->description,
            'category' => $request->category,
            'cover_image' => $imageName,
            'pdf_file' => $pdfName,
            'rating' => 0,
            'views' => 0,
            'downloads' => 0,
           'admin_id' => auth()->id(),
        ]);

        return redirect()
            ->back()
            ->with('success','📚 Book Added Successfully!');
    }

    
public function categoryBooks($category)
{
    $books = Book::where('category', $category)->get();

    return view('category-books', compact('books', 'category'));
}

public function show($id)
{
    $book = Book::findOrFail($id);


    $viewKey = 'book_viewed_'.$book->id;


    if(!session()->has($viewKey))
    {
        $book->increment('views');

        session()->put($viewKey, true);
    }


    $relatedBooks = Book::where('category', $book->category)
        ->where('id', '!=', $book->id)
        ->latest()
        ->take(4)
        ->get();


   $comments = $book->comments()
                 ->with('user')
                 ->latest()
                 ->get();


return view('book-details',
compact(
    'book',
    'relatedBooks',
    'comments'
));

}

public function read($id)
{
    $book = Book::findOrFail($id);


    $book->increment('views');


    if(auth()->check()){

        \App\Models\ReadingHistory::firstOrCreate([

            'user_id'=>auth()->id(),

            'book_id'=>$book->id

        ]);

    }


    return response()->file(
        public_path('uploads/pdfs/'.$book->pdf_file)
    );

}
public function download($id)
{
    $book = Book::findOrFail($id);


    // Total download count update
    $book->increment('downloads');


    // Save user download history
    if(auth()->check()){

        \App\Models\DownloadHistory::create([

            'user_id' => auth()->id(),

            'book_id' => $book->id

        ]);

    }


    return response()->download(
        public_path('uploads/pdfs/'.$book->pdf_file)
    );

}

public function index(Request $request)
{
    $search = $request->search;

    $books = Book::when($search, function($query) use ($search){

        $query->where('title','like',"%{$search}%")
              ->orWhere('author','like',"%{$search}%")
              ->orWhere('category','like',"%{$search}%");

    })
    ->latest()
    ->paginate(10);


    return view('admin.manage-books', compact('books'));
}



public function edit($id)
{
    $book = Book::findOrFail($id);

    return view('admin.edit-book', compact('book'));
}



public function update(Request $request,$id)
{
    $book = Book::findOrFail($id);


    $book->update([

        'title'=>$request->title,

        'author'=>$request->author,

        'description'=>$request->description,

        'category'=>$request->category,

    ]);


    return redirect()
        ->route('admin.books.index')
        ->with('success','Book Updated Successfully');
}



public function destroy($id)
{
    $book = Book::findOrFail($id);

    if(file_exists(public_path('uploads/covers/'.$book->cover_image))){
        unlink(public_path('uploads/covers/'.$book->cover_image));
    }

    if(file_exists(public_path('uploads/pdfs/'.$book->pdf_file))){
        unlink(public_path('uploads/pdfs/'.$book->pdf_file));
    }

    $book->delete();

    return redirect()
        ->route('admin.books.index')
        ->with('success','Book Deleted Successfully');
}



public function gallery(Request $request)
{
    $search = $request->search;

    $books = Book::when($search, function ($query) use ($search) {
        $query->where('title', 'like', "%{$search}%");
    })->get();

    return view('bookgallery', compact('books'));
}

}
