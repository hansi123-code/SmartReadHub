<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $book->title }}</title>

    @vite(['resources/css/app.css'])

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>

*{
    box-sizing:border-box;
}


body{
    margin:0;
    font-family:'Segoe UI', Arial, sans-serif;
    background:#f1f5f9;
    color:#1e293b;
}


.container{

    width:90%;
    max-width:1250px;
    margin:40px auto;

}


/* Main Book Card */

.book-card{

    background:linear-gradient(135deg,#ffffff,#f8fbff);

    border-radius:25px;

    padding:40px;

    display:flex;

    gap:50px;

    box-shadow:
    0 15px 40px rgba(15,23,42,0.08);

    border:1px solid #e0e7ff;

}


/* Book Cover */

.left{

    width:330px;

    text-align:center;

}


.left img{

    width:100%;

    height:480px;

    object-fit:contain;

    background:white;

    border-radius:20px;

    padding:15px;

    box-shadow:
    0 15px 30px rgba(0,0,0,0.12);

    transition:.3s;

}


.left img:hover{

    transform:translateY(-8px);

}



/* Details Side */

.right{

    flex:1;

}



/* Title */

.title{

    font-size:38px;

    font-weight:800;

    color:#0f172a;

    margin-bottom:10px;

}



/* Author */

.author{

    font-size:19px;

    color:#64748b;

    margin-bottom:20px;

}



/* Category */

.category{

    display:inline-block;

    padding:10px 22px;

    border-radius:50px;

    background:#ede9fe;

    color:#6d28d9;

    font-weight:700;

    margin-bottom:25px;

}



/* Rating */

.rating{

    display:flex;

    align-items:center;

    gap:8px;

    font-size:20px;

    background:#fff7ed;

    width:max-content;

    padding:10px 18px;

    border-radius:15px;

    margin-bottom:25px;

}


.rating i{

    color:#fbbf24;

}



/* Stats */


.stats{

    display:flex;

    gap:20px;

    margin:25px 0;

}


.stats div{

    background:white;

    padding:15px 25px;

    border-radius:15px;

    display:flex;

    align-items:center;

    gap:10px;

    color:#475569;

    font-weight:600;

    box-shadow:
    0 5px 15px rgba(0,0,0,.06);

}


.stats i{

    color:#2563eb;

    font-size:22px;

}



/* Description */


.description-title{

    font-size:24px;

    font-weight:700;

    margin-top:25px;

}


.description{

    margin-top:15px;

    color:#475569;

    line-height:32px;

    font-size:16px;

    text-align:justify;

}



/* Buttons */


.buttons{

    margin-top:35px;

    display:flex;

    gap:20px;

}



.btn{

    padding:14px 30px;

    border:none;

    border-radius:12px;

    cursor:pointer;

    font-size:16px;

    font-weight:600;

    color:white;

    transition:.3s;

}



.read{

    background:linear-gradient(
    135deg,#2563eb,#1d4ed8);

}



.read:hover{

    transform:translateY(-3px);

    box-shadow:
    0 10px 20px rgba(37,99,235,.3);

}



.download{

    background:linear-gradient(
    135deg,#16a34a,#15803d);

}



.download:hover{

    transform:translateY(-3px);

    box-shadow:
    0 10px 20px rgba(22,163,74,.3);

}



/* Rating Stars */


.rating-stars{

    display:flex;

    gap:10px;

    margin-top:15px;

}



.rating-stars .star{

    font-size:35px;

    color:#cbd5e1;

    cursor:pointer;

    transition:.2s;

}



.rating-stars .star:hover{

    color:#fbbf24;

    transform:scale(1.25);

}



/* Responsive */


@media(max-width:900px){


.book-card{

    flex-direction:column;

}


.left{

    width:100%;

}


.left img{

    height:400px;

}


.stats{

    flex-direction:column;

}


.buttons{

    flex-direction:column;

}


}

</style>
</head>

<body>

@include('layouts.navbar')

<div class="container">

<div class="book-card">

<div class="left">

<img src="{{ asset('uploads/covers/'.$book->cover_image) }}">

</div>

<div class="right">

<div class="title">

{{ $book->title }}

</div>

<div class="author">

{{ $book->author }}

</div>

<div class="category">

{{ $book->category }}

</div>

<div class="rating">

<i class="fas fa-star"></i>

<i class="fas fa-star"></i>

<i class="fas fa-star"></i>

<i class="fas fa-star"></i>

<i class="fas fa-star-half-alt"></i>

<b>{{ $book->rating }}</b>

</div>

<div class="stats">

<div>

<i class="fas fa-eye"></i>

{{ $book->views }} Views

</div>

<div id="downloadCount">

<i class="fas fa-download"></i>

{{ $book->downloads }} Downloads

</div>

</div>

<div class="description-title">

Description

</div>

<div class="description">

{{ $book->description }}

</div>

<hr style="margin:30px 0;">

<h3>Rate this Book</h3>

<form id="ratingForm" action="{{ route('book.rate', $book->id) }}" method="POST">
    @csrf

    <input type="hidden" name="rating" id="ratingValue">

    <div class="rating-stars">

        @for($i = 1; $i <= 5; $i++)

            <i class="fa-solid fa-star star"
               data-value="{{ $i }}"></i>

        @endfor

    </div>

</form>

@if(session('success'))

<div style="color:green;font-weight:bold;margin-top:15px;">
    {{ session('success') }}
</div>

@endif

<form action="{{ route('bookmark.toggle',$book->id) }}" 
      method="POST">

    @csrf


    <button class="btn"
    style="
    background:#f59e0b;
    color:white;
    padding:14px 25px;
    border-radius:10px;
    border:none;
    cursor:pointer;
    ">

    <i class="fas fa-bookmark"></i>


    @if(auth()->user()->bookmarks()
        ->where('book_id',$book->id)
        ->exists())

        Remove Bookmark

    @else

        Add Bookmark

    @endif


    </button>


</form>

<div class="buttons">

<a href="{{ route('book.read',$book->id) }}"
target="_blank">

<button class="btn read">

<i class="fas fa-book-open"></i>

Read Book

</button>

</a>

<a id="downloadBtn" href="{{ route('book.download',$book->id) }}">

<button class="btn download">

<i class="fas fa-download"></i>

Download

</button>

</a>

</div>

</div>

</div>

<hr style="margin:40px 0;">

<h2 style="margin-bottom:20px;">
    💬 Comments ({{ $comments->count() }})
</h2>

@auth

<form action="{{ route('comment.store', $book->id) }}" method="POST">
    @csrf

    <textarea
        name="comment"
        rows="4"
        placeholder="Write your comment..."
        required
        style="
            width:100%;
            padding:15px;
            border:1px solid #ddd;
            border-radius:10px;
            resize:none;
            margin-bottom:15px;
            
        "></textarea>

    <button class="btn read">
        Post Comment
    </button>

</form>

@else

<p style="color:gray;">
    Please login to write a comment.
</p>

@endauth

<br>

@forelse($comments as $comment)

<div style="
    background:linear-gradient(135deg,#ffffff,#f8fbff);
    border:1px solid #0e2441;
    padding:18px;
    border-radius:12px;
    margin-bottom:15px;
    box-shadow:0 4px 10px rgba(0,0,0,.06);">

    <b>{{ $comment->user->name }}</b>

    <small style="color:gray;">
        • {{ $comment->created_at->diffForHumans() }}
    </small>

    <p style="margin-top:10px;">
        {{ $comment->comment }}
    </p>

    @auth
    @if(auth()->id() == $comment->user_id)

    <div style="display:flex;gap:10px;margin-top:10px;">

        <button
            type="button"
            onclick="document.getElementById('edit{{ $comment->id }}').style.display='block'"
            style="
                background:#2563eb;
                color:white;
                border:none;
                padding:8px 15px;
                border-radius:8px;
                cursor:pointer;">

            Edit

        </button>

        <form action="{{ route('comment.delete',$comment->id) }}" method="POST">

            @csrf
            @method('DELETE')

            <button
                onclick="return confirm('Are you sure you want to delete this comment?')"
                style="
                    background:#dc2626;
                    color:white;
                    border:none;
                    padding:8px 15px;
                    border-radius:8px;
                    cursor:pointer;">

                Delete

            </button>

        </form>

    </div>

    <div id="edit{{ $comment->id }}"
         style="display:none;margin-top:15px;">

        <form action="{{ route('comment.update',$comment->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <textarea
                name="comment"
                rows="3"
                style="
                    width:100%;
                    border:1px solid #ddd;
                    border-radius:8px;
                    padding:10px;">{{ $comment->comment }}</textarea>

            <button class="btn read" style="margin-top:10px;">
                Update Comment
            </button>

        </form>

    </div>

    @endif
    @endauth

</div>

@empty

<p>No comments yet.</p>

@endforelse

<div style="margin-top:50px;">

    <h2 style="margin-bottom:20px;">
        Related Books
    </h2>

    <div style="display:grid;
                grid-template-columns:repeat(4,1fr);
                gap:20px;">

        @foreach($relatedBooks as $related)

        <div style="
            background:white;
            border-radius:15px;
            padding:15px;
            text-align:center;
            box-shadow:0 5px 15px rgba(0,0,0,.08);">

            <img
            src="{{ asset('uploads/covers/'.$related->cover_image) }}"
            style="width:100%;
                   height:230px;
                   object-fit:contain;">

            <h4>{{ $related->title }}</h4>

            <p style="color:gray;">
                {{ $related->author }}
            </p>

            <a href="{{ route('book.show',$related->id) }}">

                <button class="btn read">

                    View Details

                </button>

            </a>

        </div>

        @endforeach

    </div>

</div>

</div>

<script>

const stars = document.querySelectorAll(".star");
const ratingValue = document.getElementById("ratingValue");
const form = document.getElementById("ratingForm");

stars.forEach((star)=>{

    star.addEventListener("click",function(){

        let value = this.dataset.value;

        ratingValue.value = value;

        stars.forEach((s)=>{

            if(s.dataset.value <= value){

                s.style.color="#fbbf24";

            }else{

                s.style.color="#d1d5db";

            }

        });

        setTimeout(function(){

            form.submit();

        },300);

    });

});

const downloadBtn = document.getElementById('downloadBtn');

const downloadCount = document.getElementById('downloadCount');


if(downloadBtn){

    downloadBtn.addEventListener('click', function(){

        let currentText = downloadCount.innerText;

        let number = parseInt(currentText);


        number++;


        downloadCount.innerHTML =
        '<i class="fas fa-download"></i> ' 
        + number + ' Downloads';

    });

}

</script>

</body>

</html>