<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Book;

class CommentController extends Controller
{

    public function store(Request $request, $bookId)
    {

        $request->validate([
            'comment' => 'required|string|max:500'
        ]);


        Comment::create([

            'user_id' => auth()->id(),

            'book_id' => $bookId,

            'comment' => $request->comment

        ]);


        return back()->with('success','Comment added successfully!');
    }



    public function destroy($id)
    {

        $comment = Comment::findOrFail($id);


        if($comment->user_id == auth()->id())
        {

            $comment->delete();

        }


        return back()->with('success','Comment deleted successfully!');

    }

    public function update(Request $request, $id)
{
    $request->validate([
        'comment' => 'required|max:500'
    ]);

    $comment = Comment::findOrFail($id);

    if($comment->user_id != auth()->id()){
        abort(403);
    }

    $comment->update([
        'comment' => $request->comment
    ]);

    return back()->with('success','Comment updated successfully!');
}

}