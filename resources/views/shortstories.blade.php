<!DOCTYPE html>
<html>
<head>

<title>Short Stories</title>

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>

body{
    font-family:Arial;
    background:#f4f6f9;
    margin:0;
}

.header{
    background:#1e3a8a;
    color:white;
    text-align:center;
    padding:20px;
}

.book-container{
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:20px;
    padding:30px;
}

.book-card{
    background:white;
    border-radius:12px;
    box-shadow:0 0 10px rgba(0,0,0,.15);
    overflow:hidden;
}

.book-card img{
    width:100%;
    height:260px;
    object-fit:cover;
}

.book-content{
    padding:15px;
}

.book-content h3{
    margin:0;
}

.author{
    color:#666;
    font-size:14px;
}

.rating{
    color:orange;
    margin-top:8px;
}

.stats{
    display:flex;
    justify-content:space-between;
    margin-top:10px;
    font-size:14px;
    color:#666;
}

.btn{
    width:100%;
    padding:10px;
    border:none;
    background:#2563eb;
    color:white;
    cursor:pointer;
    border-radius:5px;
    margin-top:12px;
}

.btn:hover{
    background:#1e40af;
}

</style>

</head>
<body>

@include('layouts.navbar')

<div class="header">
<h1>Short Stories Collection</h1>
</div>

<div class="book-container">

<!-- BOOK 1 -->

<div class="book-card">

<img src="{{ asset('images/shortstories/robinson-crusoe.jpg') }}">

<div class="book-content">

<h3>Robinson Crusoe</h3>

<p class="author">
Daniel Defoe
</p>

<div class="rating">
⭐⭐⭐⭐⭐ 4.8
</div>

<div class="stats">
<span>👁️ 250</span>
<span>⬇️ 180</span>
</div>

<a href="{{ route('book.details') }}">
<button class="btn">
View Details
</button>
</a>

</div>
</div>

<!-- BOOK 2 -->

<div class="book-card">

<img src="{{ asset('images/shortstories/past-comes-round.jpg') }}">

<div class="book-content">

<h3>The Past Comes Round</h3>

<p class="author">
Ivy Compton-Burnett
</p>

<div class="rating">
⭐⭐⭐⭐ 4.4
</div>

<div class="stats">
<span>👁️ 180</span>
<span>⬇️ 130</span>
</div>

<a href="{{ route('book.details') }}">
<button class="btn">
View Details
</button>
</a>

</div>
</div>

<!-- COPY SAME STYLE FOR OTHER 8 BOOKS -->

</div>

</body>
</html>