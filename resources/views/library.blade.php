<!DOCTYPE html>
<html lang="en">

<head>
<title>My Library</title>
@vite(['resources/css/app.css'])
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>

<body>

@include('layouts.navbar')

<div class="library-page">

    <!-- HEADER -->
    <div class="library-header">
        <div class="header-icon">
            <i class="fas fa-bookmark"></i>
        </div>
        <h1>My Library</h1>
        <p>Your saved books collection - {{ $bookmarks->count() }} Books</p>
    </div>

    @if($bookmarks->count() > 0)

        <div class="library-grid">
            @foreach($bookmarks as $item)
            
            <div class="book-card"> <!-- A tag eka ain kale -->
                <div class="book-cover">
                    <img src="{{ asset('uploads/covers/'.$item->book->cover_image) }}" alt="{{ $item->book->title }}">
                </div>

                <div class="book-info">
                    <h2 class="book-title">{{ $item->book->title }}</h2>
                    <p class="book-author">
                        <i class="fas fa-user-pen"></i> {{ $item->book->author }}
                    </p>
                    <a href="{{ route('book.show',$item->book->id) }}" class="view-btn"> <!-- link eka dan inne button eke witharai -->
                        View Details
                    </a>
                </div>
            </div>

            @endforeach
        </div>

    @else

        <div class="empty-box">
            <div class="empty-icon">
                <i class="fas fa-bookmark"></i>
            </div>
            <h2>No bookmarked books yet</h2>
            <p>Explore books and add them to your library.</p>
            <a href="{{ route('books') }}" class="explore-btn">
                <i class="fas fa-compass"></i> Explore Books
            </a>
        </div>

    @endif

</div>

<style>
/* ========== BASE ========== */
body{
    font-family: 'Inter', sans-serif;
    background: #f8fafc;
}

.library-page{
    background: linear-gradient(180deg, #f0f9ff 0%, #ffffff 100%);
    min-height: calc(100vh - 70px);
    padding: 40px 20px;
}

/* ========== HEADER - LIGHT BLUE ========== */
.library-header{
    background: linear-gradient(135deg, #0d459e 0%, #2b2ee9 100%);
    color: white;
    padding: 45px 30px;
    border-radius: 24px;
    margin-bottom: 40px;
    text-align: center;
    box-shadow: 0 8px 25px rgba(59, 130, 246, 0.15);
}

.header-icon{
    width: 75px;
    height: 75px;
    background: linear-gradient(135deg, #60a5fa, #818cf8);
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 18px;
}
.header-icon i{
    font-size: 34px;
    color: white;
}
.library-header h1{
    font-size: 32px;
    font-weight: 800;
    margin-bottom: 8px;
}
.library-header p{
    font-size: 15px;
    color: rgba(252, 245, 245, 0.9);
}

/* ========== GRID ========== */
.library-grid{
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
    gap: 24px;
    max-width: 1400px;
    margin: 0 auto;
}

/* ========== BOOK CARD ========== */
.book-card{
    background: white;
    border-radius: 18px;
    padding: 16px;
    text-align: center;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    transition: all 0.3s ease;
    border: 1px solid #e2e8f0;
    /* A tag na nisa cursor eka default */
}
.book-card:hover{
    transform: translateY(-6px);
    box-shadow: 0 12px 25px rgba(59, 130, 246, 0.12);
    border-color: #bfdbfe;
}

.book-cover{
    width: 100%;
    height: 240px;
    border-radius: 14px;
    overflow: hidden;
    background: #f1f5f9;
}
.book-cover img{
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s ease;
}
.book-card:hover .book-cover img{
    transform: scale(1.05);
}

.book-info{
    padding-top: 16px;
}
.book-title{
    font-size: 15px;
    font-weight: 700;
    color: #1e293b;
    height: 40px;
    line-height: 20px;
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
}
.book-author{
    font-size: 12px;
    color: #64748b;
    margin-top: 6px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 5px;
}

/* BUTTON EKA THAMAI LINK EKA */
.view-btn{
    display: block;
    margin-top: 14px;
    background: #1f3dc0;
    color: #f5f7fc;
    padding: 10px;
    border-radius: 10px;
    font-size: 13px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s;
}
.view-btn:hover{
    background: #2563eb;
    color: white;
}

/* ========== EMPTY STATE ========== */
.empty-box{
    background: white;
    padding: 60px 40px;
    text-align: center;
    border-radius: 24px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    border: 1px solid #e2e8f0;
    max-width: 500px;
    margin: 0 auto;
}
.empty-icon{
    width: 90px;
    height: 90px;
    background: #eff6ff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 20px;
}
.empty-icon i{
    font-size: 40px;
    color: #3b82f6;
}
.empty-box h2{
    font-size: 22px;
    font-weight: 700;
    color: #1e293b;
}
.empty-box p{
    color: #64748b;
    margin: 10px 0 25px;
}
.explore-btn{
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 12px 24px;
    background: #2563eb;
    color: white;
    border-radius: 12px;
    text-decoration: none;
    font-weight: 600;
    transition: 0.3s;
}
.explore-btn:hover{
    background: #1d4ed8;
    transform: scale(1.05);
}

/* ========== RESPONSIVE ========== */
@media(max-width: 768px){
    .library-grid{
        grid-template-columns: repeat(2, 1fr);
        gap: 16px;
    }
    .book-cover{
        height: 200px;
    }
    .library-header h1{
        font-size: 26px;
    }
}
</style>

</body>
</html>