<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

<title>SmartRead Hub</title>

<style>

body{
    margin:0;
    font-family:Arial;
    background:#f4f6f9;
}


/* HERO */

.hero{
    text-align:center;
    margin-top:100px;
}

.hero h1{
    font-size:40px;
    color:#1e3a8a;
}

.hero p{
    font-size:18px;
    color:#555;
}


.btn a{
    display:inline-block;
    padding:10px 30px;
    margin:10px;
    border-radius:50px;
    text-decoration:none;
    font-weight:bold;
    font-size:14px;
    box-shadow:0 4px 10px rgba(0,0,0,0.2);
}


.start{
    background:#1e3a8a;
    color:white;
}


.explore{
    background:#2563eb;
    color:white;
}


/* FEATURES */

.features{

    margin:80px auto;
    width:85%;
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:25px;

}


.card{

    background:white;
    padding:25px;
    text-align:center;
    border-radius:15px;
    box-shadow:0 5px 15px rgba(0,0,0,0.1);

}


.card h3{

    color:#1e3a8a;

}


.card:nth-child(1) i{
    color:#2563eb;
}

.card:nth-child(2) i{
    color:#8b5cf6;
}

.card:nth-child(3) i{
    color:#f59e0b;
}

.card:nth-child(4) i{
    color:#ef4444;
}

.card:nth-child(5) i{
    color:#10b981;
}

.card:nth-child(6) i{
    color:#ec4899;
}

/* VIDEO SECTION */
.video-section{
    width:90%;
    margin:100px auto;
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap:60px;
}

.video-text{
    width:40%;
}

.video-box{
    width:60%;
}

.video-box video{
    width:100%;
    height:380px;
    object-fit:cover;
    border-radius:20px;
    box-shadow:0 15px 35px rgba(0,0,0,0.2);
}


/* CATEGORIES */


.categories{

    text-align:center;
    margin:70px;

}


.category{

    display:inline-block;
    background:#1e3a8a;
    color:white;
    padding:15px 25px;
    margin:10px;
    border-radius:30px;

}


/* STATS */


.stats{

    background:#1e3a8a;
    color:white;
    display:flex;
    justify-content:center;
    gap:80px;
    padding:40px;

}


.stat h2{

    font-size:35px;

}

.card{
    transition:.35s;
    cursor:pointer;
}

.card:hover{
    transform:translateY(-10px);
    box-shadow:0 15px 35px rgba(37,99,235,.25);
}

.category{
    transition:.3s;
}

.category:hover{
    background:#2563eb;
    transform:scale(1.08);
}

.start:hover{
    background:#172554;
}

.explore:hover{
    background:#1d4ed8;
}

.stat i{
    font-size:38px;
    margin-bottom:10px;
    color:#93c5fd;
}

.card i{
    font-size:40px;
    color:#2563eb;
    margin-bottom:15px;
    display:block;
}

</style>


</head>


<body>


@include('layouts.navbar')



<!-- HERO -->


<div class="hero">


<h1>
Welcome to Smart E-Book System
</h1>


<p>
Read anytime, anywhere. Learn and explore thousands of books easily.
</p>


<div class="btn">

<a href="/register" class="start">
Start Reading
</a>


<a href="/bookgallery" class="explore">
Explore Books
</a>


</div>


</div>





<!-- FEATURES -->


<div class="features">


<div class="card">
    <i class="fa-solid fa-book-open"></i>
    <h3>Online Reading</h3>
    <p>Read your favourite books anytime with our smart online reader.</p>
</div>

<div class="card">
    <i class="fa-solid fa-robot"></i>
    <h3>AI Recommendations</h3>
    <p>Get personalized book suggestions based on your interests.</p>
</div>

<div class="card">
    <i class="fa-solid fa-bookmark"></i>
    <h3>Smart Bookmark</h3>
    <p>Save your reading position and continue anytime.</p>
</div>

<div class="card">
    <i class="fa-solid fa-star"></i>
    <h3>Ratings & Reviews</h3>
    <p>Share your opinions and discover popular books.</p>
</div>

<div class="card">
    <i class="fa-solid fa-magnifying-glass"></i>
    <h3>Smart Search</h3>
    <p>Find books easily using advanced search options.</p>
</div>

<div class="card">
    <i class="fa-solid fa-book"></i>
    <h3>My Library</h3>
    <p>Save your favourite books and access them anytime.</p>
</div>


</div>

<!-- VIDEO SECTION -->


<div class="video-section">


<div class="video-text">

<h2>
Discover Smart Reading Experience
</h2>


<p>
SmartRead Hub provides a simple and modern way to discover, read and
manage e-books online. Explore books from different categories, save
 your favourite books to My Library, receive AI-powered book 
recommendations, and enjoy a smooth digital reading experience 
through an easy-to-use interface.
</p>


</div>


<div class="video-box">


<video autoplay muted loop playsinline controls>
    <source src="{{ asset('video/240_F_1333803551_XzdwagPanbg0prXw2uxoQLcBdVNgZFwD_ST.mp4') }}" type="video/mp4">
    Your browser does not support the video tag.
</video>


</div>



</div>






<!-- CATEGORIES -->


<div class="categories">


<h2>
Explore Categories
</h2>


<span class="category">
Academic
</span>


<span class="category">
Novels
</span>


<span class="category">
Adventure
</span>


<span class="category">
Horror
</span>


<span class="category">
Children Stories
</span>


</div>






<!-- STATISTICS -->
<div class="stats">

    <div class="stat">
        <i class="fa-solid fa-book"></i>
        <h2>{{ $books }}+</h2>
        <p>Books</p>
    </div>

    <div class="stat">
        <i class="fa-solid fa-users"></i>
        <h2>{{ $users }}+</h2>
        <p>Users</p>
    </div>

    <div class="stat">
        <i class="fa-solid fa-eye"></i>
        <h2>{{ $views }}+</h2>
        <p>Views</p>
    </div>

</div>


</body>

</html>