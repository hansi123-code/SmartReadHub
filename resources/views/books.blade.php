<!DOCTYPE html>
<html lang="en">
<head>
    <title>Books Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"> 
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>

<body>

    @include('layouts.navbar')

    <section class="reading-section">

    <div class="reading-content">

        <div class="reading-text">

            <h2>📚 Discover the Joy of Reading</h2>

            <p>
                Reading is one of the most powerful ways to expand knowledge,
                improve vocabulary, strengthen critical thinking, and inspire
                creativity. Whether you are studying for your education or
                reading for entertainment, every book offers a unique
                opportunity to learn something new.
            </p>

            <p>
                Our Smart E-Book Management System provides easy access to a
                wide collection of academic and entertainment books. Explore
                your favorite categories, discover new authors, and enjoy
                reading anytime, anywhere through a modern digital library.
            </p>

        </div>

        <div class="reading-image">
            <img src="{{ asset('images/StockCake-Digital_Knowledge_Flows-1530618-medium.jpg') }}" alt="Reading">
        </div>

    </div>

</section>

    <div class="page-wrapper">

        <!-- Search -->
        <div class="search-box">
            <div class="search-container">
                <input type="text" id="searchInput" placeholder="Search Categories Here..." onkeyup="searchCategories()">
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>
        </div>

        <!-- Categories -->
        <div class="categories">
            <button onclick="showAcademic()" id="btn-academic">
                <i class="fas fa-graduation-cap"></i> Academic Section
            </button>
            <button onclick="showEntertainment()" id="btn-entertainment">
                <i class="fas fa-gamepad"></i> Entertainment Section
            </button>
        </div>

 

        <!-- Academic Section -->
        <div id="academic" class="section">
            <h2 class="section-title"><i class="fas fa-book"></i> Academic Books</h2>
            <div class="book-container">
                <div class="book-card category-item">
                    <div class="book-img">
                        <img src="{{ asset('images/books/academic/1_cUZJsNiT1fjF5VoqaPxcMw.png') }}">
                    </div>
                    <h3>Software Engineering</h3>
                    <p>Academic Book</p>
                    <a href="{{ route('books.category','Software Engineering') }}">
                        <button>View Books</button>
                    </a>
                </div>

                <div class="book-card category-item">
                    <div class="book-img">
                        <img src="{{ asset('images/books/academic/GridArt_20260529_061902566.jpg') }}">
                    </div>
                    <h3>Software Quality Assurance</h3>
                    <p>Academic Book</p>
                    <a href="{{ route('books.category','Software Quality Assurance') }}">
                        <button>View Books</button>
                    </a>
                </div>

                <div class="book-card category-item">
                    <div class="book-img">
                        <img src="{{ asset('images/books/academic/GridArt_20260529_061436951.jpg') }}">
                    </div>
                    <h3>IT Project Management</h3>
                    <p>Academic Book</p>
                    <a href="{{ route('books.category','IT Project Management') }}">
                        <button>View Books</button>
                    </a>
                </div>

                <div class="book-card category-item">
                    <div class="book-img">
                        <img src="{{ asset('images/books/academic/GridArt_20260529_062506949.jpg') }}">
                    </div>
                    <h3>Professional World</h3>
                    <p>Academic Book</p>
                    <a href="{{ route('books.category','Professional World') }}">
                        <button>View Books</button>
                    </a>
                </div>

                <div class="book-card category-item">
                    <div class="book-img">
                        <img src="{{ asset('images/books/academic/GridArt_20260529_062946650.jpg') }}">
                    </div>
                    <h3>Business Analysis Practice</h3>
                    <p>Academic Book</p>
                    <a href="{{ route('books.category','Business Analysis Practice') }}">
                        <button>View Books</button>
                    </a>
                </div>

                <div class="book-card category-item">
                    <div class="book-img">
                        <img src="{{ asset('images/books/academic/GridArt_20260529_060900782.jpg') }}">
                    </div>
                    <h3>Mobile Application Development</h3>
                    <p>Academic Book</p>
                    <a href="{{ route('books.category','Mobile Application Development') }}">
                        <button>View Books</button>
                    </a>
                </div>
            </div>
        </div>

        <!-- Entertainment Section -->
        <div id="entertainment" class="section">
            <h2 class="section-title"><i class="fas fa-film"></i> Entertainment Books</h2>
            <div class="book-container">
                <div class="book-card category-item">
                    <div class="book-img">
                        <img src="{{ asset('images/books/entertainment/2021-comic-cover.jpg') }}">
                    </div>
                    <h3>Novels</h3>
                    <p>Entertainment Book</p>
                    <a href="{{ route('books.category', 'Novels') }}">
                        <button>View Books</button>
                    </a>
                </div>

                <div class="book-card category-item">
                    <div class="book-img">
                        <img src="{{ asset('images/books/entertainment/the-best-short-story-collections-must-read-short-story-collections.png') }}">
                    </div>
                    <h3>Short Stories</h3>
                    <p>Entertainment Book</p>
                    <a href="{{ route('books.category','Short Stories') }}">
                        <button>View Books</button>
                    </a>
                </div>

                <div class="book-card category-item">
                    <div class="book-img">
                        <img src="{{ asset('images/books/entertainment/20200429_224739_0000.png') }}">
                    </div>
                    <h3>Adventure Stories</h3>
                    <p>Entertainment Book</p>
                    <a href="{{ route('books.category','Adventure Stories') }}">
                        <button>View Books</button>
                    </a>
                </div>

                <div class="book-card category-item">
                    <div class="book-img">
                        <img src="{{ asset('images/books/entertainment/GridArt_20260529_082607826.jpg') }}">
                    </div>
                    <h3>Horror Stories</h3>
                    <p>Entertainment Book</p>
                    <a href="{{ route('books.category','Horror Stories') }}">
                        <button>View Books</button>
                    </a>
                </div>

                <div class="book-card category-item">
                    <div class="book-img">
                        <img src="{{ asset('images/books/entertainment/IMG_20260528_171019.jpg') }}">
                    </div>
                    <h3>Sinhala Stories</h3>
                    <p>Entertainment Book</p>
                    <a href="{{ route('books.category','Sinhala Stories') }}">
                        <button>View Books</button>
                    </a>
                </div>

                <div class="book-card category-item">
                    <div class="book-img">
                        <img src="{{ asset('images/books/entertainment/Important-Life-Lessons-from-Children’s-Books.png') }}">
                    </div>
                    <h3>Children Stories</h3>
                    <p>Entertainment Book</p>
                    <a href="{{ route('books.category','Children Stories') }}">
                        <button>View Books</button>
                    </a>
                </div>
            </div>
        </div>

    </div>
       

    <script>
        function showAcademic(){
            let academic = document.getElementById("academic");
            let entertainment = document.getElementById("entertainment");
            let btnA = document.getElementById("btn-academic");
            let btnE = document.getElementById("btn-entertainment");

            if(academic.style.display === "block"){
                academic.style.display = "none";
                btnA.classList.remove("active");
            }else{
                academic.style.display = "block";
                entertainment.style.display = "none";
                btnA.classList.add("active");
                btnE.classList.remove("active");
            }
        }

        function showEntertainment(){
            let entertainment = document.getElementById("entertainment");
            let academic = document.getElementById("academic");
            let btnA = document.getElementById("btn-academic");
            let btnE = document.getElementById("btn-entertainment");

            if(entertainment.style.display === "block"){
                entertainment.style.display = "none";
                btnE.classList.remove("active");
            }else{
                entertainment.style.display = "block";
                academic.style.display = "none";
                btnE.classList.add("active");
                btnA.classList.remove("active");
            }
        }

        function searchCategories(){
            let input = document.getElementById("searchInput").value.toLowerCase();
            let cards = document.querySelectorAll('.category-item');
            cards.forEach(function(card){
                let title = card.querySelector("h3").innerText.toLowerCase();
                if(title.includes(input)){
                    card.style.display = "block";
                }else{
                    card.style.display = "none";
                }
            });
        }
    </script>

    <style>
        body{
            font-family: 'Inter', Arial;
            margin:0;
            background: linear-gradient(180deg, #f0f9ff 0%, #ffffff 100%);
            color: #1e293b;
        }

        .page-wrapper{
            padding: 30px 20px;
            max-width: 1400px;
            margin: 0 auto;
        }

        /* SEARCH */
        .search-box{
            text-align:center;
            margin:20px 0 40px;
        }
        .search-container{
            position:relative;
            width:60%;
            margin:auto;
        }
        .search-container input{
            width:100%;
            padding:18px 50px 18px 24px;
            border-radius:16px;
            border:1px solid #cbd5e1;
            font-size:16px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
            transition: 0.3s;
        }
        .search-container input:focus{
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.15);
        }
        .search-container i{
            position:absolute;
            right:22px;
            top:50%;
            transform:translateY(-50%);
            color:#64748b;
            font-size:20px;
        }

        /* CATEGORIES BUTTONS */
        .categories{
            text-align:center;
            margin-bottom:40px;
            display: flex;
            justify-content: center;
            gap: 18px;
            flex-wrap: wrap;
        }
        .categories button{
            padding:16px 32px;
            border:2px solid #e2e8f0;
            background:white;
            color:#475569;
            border-radius:16px;
            cursor:pointer;
            font-size:16px;
            font-weight:700;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .categories button:hover{
            border-color: #3b82f6;
            color: #3b82f6;
            transform: translateY(-2px);
        }
        .categories button.active{
            background: linear-gradient(90deg, #3b82f6, #6366f1);
            color: white;
            border-color: transparent;
            box-shadow: 0 6px 15px rgba(59, 130, 246, 0.25);
        }

        /* SECTION */
        .section{
            display:none;
            animation: fadeIn 0.4s;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .section-title{
            font-size: 28px;
            font-weight: 800;
            margin-bottom: 28px;
            color: #1e293b;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        /* BOOK GRID - 3x2 */
        .book-container{
            display:grid;
            grid-template-columns: repeat(3, 1fr); /* thuna thuna */
            gap:28px;
        }

        .book-card{
            background:white;
            padding:22px;
            border-radius:20px;
            box-shadow:0 3px 12px rgba(0,0,0,0.06);
            border: 1px solid #e2e8f0;
            text-align:center;
            transition: all 0.3s;
        }
        .book-card:hover{
            transform: translateY(-8px);
            box-shadow: 0 15px 30px rgba(59, 130, 246, 0.15);
            border-color: #bfdbfe;
        }
        .book-img{
            width: 100%;
            height: 260px; /* image height wadi kale */
            border-radius: 14px;
            overflow: hidden;
            margin-bottom: 18px;
            background: #f1f5f9;
            padding: 10px; /* athule id eka */
        }
        .book-card img{
            width:100%;
            height:100%;
            object-fit: contain; /* full image eka penna */
            transition: transform 0.4s;
        }
        .book-card:hover img{
            transform: scale(1.04);
        }
        .book-card h3{
            font-size: 18px; /* akuru loku */
            font-weight: 800;
            margin-bottom: 8px;
            color: #1e293b;
            height: 50px;
            overflow: hidden;
        }
        .book-card p{
            color:#64748b;
            font-size: 14px;
            margin-bottom: 18px;
            font-weight: 500;
        }
        .book-card button{
            padding:12px 20px;
            border:none;
            background: linear-gradient(90deg, #3b82f6, #6366f1);
            color:white;
            border-radius:12px;
            cursor:pointer;
            font-weight: 700;
            font-size: 15px;
            width: 100%;
            transition: 0.3s;
        }
        .book-card button:hover{
            transform: scale(1.03);
            box-shadow: 0 6px 15px rgba(59, 130, 246, 0.3);
        }

        /* RESPONSIVE */
        @media(max-width: 1024px){
            .book-container{ grid-template-columns: repeat(2, 1fr); }
        }
        @media(max-width: 768px){
            .search-container{ width: 90%; }
            .book-container{ grid-template-columns: repeat(2, 1fr); }
            .book-img{ height: 200px; }
        }
        @media(max-width: 500px){
            .book-container{ grid-template-columns: repeat(1, 1fr); }
        }

        .reading-section{
    width:90%;
    max-width:1200px;
    margin:40px auto 60px;
    background:#fff;
    border-radius:20px;
    padding:40px;
    box-shadow:0 10px 30px rgba(0,0,0,.08);
}

.reading-content{
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap:40px;
}

.reading-text{
    flex:1;
}

.reading-text h2{
    color:#1e3a8a;
    font-size:32px;
    margin-bottom:20px;
}

.reading-text p{
    color:#555;
    line-height:1.9;
    text-align:justify;
    font-size:16px;
    margin-bottom:18px;
}

.reading-image{
    flex:1;
    text-align:center;
}

.reading-image img{
    width: 80%;
    max-width:300px;
    border-radius:18px;
    box-shadow:0 10px 25px rgba(0,0,0,.15);
    transition:.4s;
}

.reading-image img:hover{
    transform:scale(1.03);
}

@media(max-width:900px){

    .reading-content{
        flex-direction:column;
    }

    .reading-text{
        text-align:center;
    }

    .reading-text p{
        text-align:center;
    }

}



    </style>

</body>
</html>