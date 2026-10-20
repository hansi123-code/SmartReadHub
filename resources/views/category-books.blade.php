<!DOCTYPE html>
<html>
<head>
    <title>{{ $category }}</title>

    @vite(['resources/css/app.css'])

    <style>

        body{
            font-family:Arial, sans-serif;
            background:#f3f4f6;
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
            grid-template-columns:repeat(auto-fill,minmax(250px,1fr));
            gap:25px;
            padding:30px;
        }

        .book-card{
    background:white;
    border-radius:15px;
    overflow:hidden;
    box-shadow:0 8px 20px rgba(0,0,0,.08);
    transition:.3s;
}

.book-card:hover{
    transform:translateY(-8px);
}
        .book-card img{
    width:100%;
    height:350px;
    object-fit:contain;
    background:white;
    padding:15px;
}

        .content{
            padding:15px;
        }

        .content h3{
            margin:0;
            color:#1e293b;
        }

        .author{
            color:#6b7280;
            margin-top:5px;
            font-size:14px;
        }

        .description{
            color:#555;
            font-size:14px;
            margin-top:10px;
            height:55px;
            overflow:hidden;
        }

        .rating{
            margin-top:10px;
            color:#f59e0b;
            font-weight:bold;
        }

        .stats{
            display:flex;
            justify-content:space-between;
            margin-top:12px;
            color:#666;
            font-size:14px;
        }

        .buttons{
            display:flex;
            gap:10px;
            margin-top:15px;
        }

        .buttons a{
            flex:1;
            text-decoration:none;
        }

        .buttons button{
            width:100%;
            padding:10px;
            border:none;
            border-radius:8px;
            cursor:pointer;
            color:white;
            font-weight:bold;
        }

        .read{
            background:#2563eb;
        }

        .download{
            background:#16a34a;
        }

    </style>

</head>

<body>

@include('layouts.navbar')

<div class="header">
    <h1>{{ $category }}</h1>
</div>

<div class="book-container">

@foreach($books as $book)

<div class="book-card">

    <img src="{{ asset('uploads/covers/'.$book->cover_image) }}">

    <div class="content">

        <h3>{{ $book->title }}</h3>

        <div class="author">
            {{ $book->author }}
        </div>

        <div class="buttons">

            @auth
                <a href="{{ route('book.show', $book->id) }}">
                    <button type="button" class="read">
                        View Details
                    </button>
                </a>
            @else
                <a href="{{ route('login', ['message' => 'login_required']) }}">
                    <button type="button" class="read">
                        View Details
                    </button>
                </a>
            @endauth

        </div>

    </div>

</div>

@endforeach

</div>

</body>
</html>