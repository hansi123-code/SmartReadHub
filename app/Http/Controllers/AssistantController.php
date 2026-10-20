<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Session;

class AssistantController extends Controller
{

    public function chat(Request $request)
    {

        $message = strtolower(trim($request->message));
        $reply = '';



        // MORE BOOKS REQUEST
        if(str_contains($message,'more') || str_contains($message,'show more') || str_contains($message,'next'))
        {

            $books = Session::get('assistant_books');

            $offset = Session::get('assistant_offset',0);


            if($books)
            {

                $nextBooks = array_slice($books,$offset,5);


                if(count($nextBooks)>0)
                {

                    $reply = '<i class="fa-solid fa-robot"></i>
                    Here are more books for you:<br><br>';


                    foreach($nextBooks as $book)
                    {

                        $reply .= '
                        <i class="fa-solid fa-book"></i>
                        <b>'.$book['title'].'</b><br>
                        Author: '.$book['author'].'<br>
                        Category: '.$book['category'].'<br><br>';

                    }


                    Session::put('assistant_offset',$offset+5);


                    if(($offset+5) >= count($books))
                    {
                        $reply .= '<b>No more books available.</b>';
                    }


                }
                else
                {
                    $reply = "No more books available.";
                }

            }
            else
            {
                $reply = "Please search books first.";
            }


            return response()->json(['reply'=>$reply]);

        }





        // AUTHOR OF BOOK

        if(str_contains($message,'author of') ||
           str_contains($message,'written by') ||
           str_contains($message,'who wrote'))
        {


            $bookName = str_replace(
                ['who is the author of',
                 'author of',
                 'written by',
                 'who wrote',
                 '?'],
                 '',
                 $message
            );


            $bookName = trim($bookName);



            $book = Book::whereRaw(
                'LOWER(title) LIKE ?',
                ['%'.$bookName.'%']
            )->first();



            if($book)
            {

                $reply = '
                <i class="fa-solid fa-robot"></i>
                <b>'.$book->title.'</b> is written by
                <b>'.$book->author.'</b>
                <br>
                Category: '.$book->category;

            }
            else
            {

                $reply = '
                <i class="fa-solid fa-robot"></i>
                Sorry, I could not find this book.';

            }

        }





        // SEARCH BOOKS

        elseif(
            str_contains($message,'give me') ||
            str_contains($message,'show me') ||
            str_contains($message,'find')
        )
        {

$foundCategory = Book::select('category')->get()->first(function ($item) use ($message) {
    return str_contains($message, strtolower($item->category));
});

if ($foundCategory) {
    $foundCategory = $foundCategory->category;
}



            // AUTHOR SEARCH

            if(str_contains($message,'by'))
            {

                $parts = explode('by',$message);

                $authorName = trim(end($parts));


                $books = Book::whereRaw(
                    'LOWER(author) LIKE ?',
                    ['%'.$authorName.'%']
                )->get();


            }





            // CATEGORY SEARCH

            elseif($foundCategory)
            {


               $books = Book::where('category', $foundCategory)->get();


            }





            // GENERAL SEARCH

            else
            {


                $searchTerm = str_replace(
                    ['give me',
                    'show me',
                    'find',
                    'books',
                    'a'],
                    '',
                    $message
                );


                $searchTerm = trim($searchTerm);



                $books = Book::whereRaw(
                    'LOWER(title) LIKE ?',
                    ['%'.$searchTerm.'%']
                )
                ->orWhereRaw(
                    'LOWER(author) LIKE ?',
                    ['%'.$searchTerm.'%']
                )
                ->orWhereRaw(
                    'LOWER(category) LIKE ?',
                    ['%'.$searchTerm.'%']
                )
                ->get();



            }




            if($books->count()>0)
            {


                // Save books for more option

                Session::put(
                    'assistant_books',
                    $books->toArray()
                );


                Session::put(
                    'assistant_offset',
                    5
                );



                $reply='
                <i class="fa-solid fa-robot"></i>
                Here are some books for you:<br><br>';



                foreach($books->take(5) as $book)
                {


                    $reply .= '
                    <i class="fa-solid fa-book"></i>
                    <b>'.$book->title.'</b><br>
                    Author: '.$book->author.'<br>
                    Category: '.$book->category.'<br><br>';

                }



                if($books->count()>5)
                {

                    $reply .= '
                    <b>Type "more" to see more books 📚</b>';

                }



            }
            else
            {

                $reply='
                <i class="fa-solid fa-robot"></i>
                Sorry, I could not find matching books.';

            }


        }






        // POPULAR BOOKS

        elseif(
            str_contains($message,'popular') ||
            str_contains($message,'best') ||
            str_contains($message,'top') ||
            str_contains($message,'recommend')
        )
        {


            $books = Book::orderBy(
                'views',
                'desc'
            )->get();



            Session::put(
                'assistant_books',
                $books->toArray()
            );


            Session::put(
                'assistant_offset',
                5
            );



            $reply='
            <i class="fa-solid fa-fire"></i>
            Popular books:<br><br>';



            foreach($books->take(5) as $book)
            {

                $reply .= '
                <i class="fa-solid fa-book-open"></i>
                <b>'.$book->title.'</b><br>
                Author: '.$book->author.'<br>
                Views: '.$book->views.'<br><br>';

            }


            if($books->count()>5)
            {

                $reply .= '<b>Type "more" for more books 🔥</b>';

            }


        }


                // THANK YOU

elseif(
    str_contains($message,'thank you') ||
    str_contains($message,'thanks') ||
    str_contains($message,'thank u') ||
    str_contains($message,'thx')
)
{
    $reply = '
    <i class="fa-solid fa-robot"></i>
    You\'re welcome! 😊
    <br><br>
    It\'s my pleasure to assist you.
    If you need help finding books, authors, categories, or recommendations, just ask anytime.
    <br><br>
    📚 Have a wonderful reading experience!
    ';
} 


        // DEFAULT MESSAGE

        else
        {

            $reply='
            <i class="fa-solid fa-robot"></i>
            Hello! I am your Smart E-Book Assistant.
            <br><br>

            I can help you:
            <br><br>

            📚 Give me horror books
            <br>
            ✍️ Give me books by J.K Rowling
            <br>
            ❓ Who is the author of The Alchemist
            <br>
            ⭐ Show me popular books
            <br>
            🔍 Find adventure
            <br>
            ➡️ Type "more" to see more books
            ';

        }




        return response()->json([
            'reply'=>$reply
        ]);

    }

}