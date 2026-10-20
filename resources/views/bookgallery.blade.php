<!DOCTYPE html>
<html>
<head>
    <title>SmartRead Hub</title>

    <style>

        body{
    margin:0;
    font-family:Arial, Helvetica, sans-serif;
    background:linear-gradient(135deg,#eef2ff,#f8fafc,#e0f2fe);
}

.container{
    width:92%;
    max-width:1400px;
    margin:auto;
    padding:45px 0;
}

.title{
    text-align:center;
    font-size:42px;
    font-weight:bold;
    color:#1e3a8a;
    margin-bottom:35px;
}

.search-box{
    display:flex;
    justify-content:center;
    margin-bottom:45px;
}

.search-box input{
    width:450px;
    padding:15px 20px;
    border:none;
    border-radius:40px;
    background:white;
    box-shadow:0 5px 15px rgba(0,0,0,.08);
    font-size:15px;
    outline:none;
}

.search-box button{
    margin-left:12px;
    padding:15px 28px;
    border:none;
    border-radius:40px;
    background:#2563eb;
    color:white;
    font-weight:bold;
    cursor:pointer;
}

.search-box button:hover{
    background:#1d4ed8;
}

.books{
    display:grid;
    grid-template-columns:repeat(auto-fill,minmax(210px,1fr));
    gap:30px;
}

.card{
    background:white;
    border-radius:22px;
    padding:20px;
    text-align:center;
    box-shadow:0 12px 25px rgba(0,0,0,.08);
    transition:.35s;
}

.card:hover{
    transform:translateY(-8px);
    box-shadow:0 18px 35px rgba(37,99,235,.20);
}

.card img{
    width:130px;
    height:190px;
    object-fit:cover;
    border-radius:14px;
    display:block;
    margin:auto;
    box-shadow:0 8px 18px rgba(0,0,0,.18);
}

.book-title{
    margin-top:18px;
    font-size:16px;
    font-weight:700;
    color:#1f2937;
    height:45px;
    overflow:hidden;
}

.view-btn{
    display:block;
    margin-top:18px;
    background:linear-gradient(135deg,#2563eb,#1e40af);
    color:white;
    text-decoration:none;
    padding:12px;
    border-radius:12px;
    font-size:14px;
    font-weight:bold;
}

.view-btn:hover{
    background:linear-gradient(135deg,#1d4ed8,#1e3a8a);
}

.login-note{
    margin-top:10px;
    font-size:12px;
    color:#6b7280;
}

.empty{
    width:100%;
    text-align:center;
    padding:80px;
    color:#6b7280;
}
    </style>

</head>

<body>

@include('layouts.navbar')

<div class="container">

    <h1 class="title">
        <i class="fas fa-book-open"></i>
        Explore Books
    </h1>

    <form action="{{ route('book.gallery') }}" method="GET" class="search-box">

        <input
            type="text"
            name="search"
            placeholder="Search books..."
            value="{{ request('search') }}">

        <button type="submit">
            <i class="fas fa-search"></i>
            Search
        </button>

    </form>

    <div class="books">

        @forelse($books as $book)

        <div class="card">

            <img src="{{ asset('uploads/covers/'.$book->cover_image) }}"
                 alt="{{ $book->title }}">

            <div class="book-title">

                {{ $book->title }}

            </div>

            <a href="{{ route('login') }}" class="view-btn">

                <i class="fas fa-eye"></i>

                View Book

            </a>

            <div class="login-note">

                Login required to read this book.

            </div>

        </div>

        @empty

        <div class="empty">

            <i class="fas fa-book-open fa-3x"></i>

            <p>No books found.</p>

        </div>

        @endforelse

    </div>

</div>

</body>

</html>